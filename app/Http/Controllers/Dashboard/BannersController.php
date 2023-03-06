<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests;
use App\Models\WebmasterBanner;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;
use Config;
use Auth;
use File;
use Helper;
use Redirect;
use Image;
use Cache;

class BannersController extends Controller
{

    // Define Default Variables

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->banners_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        //List of Banners Sections
        $WebmasterBanners = WebmasterBanner::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            $Banners = Banner::where('created_by', '=', Auth::user()->id)->orderby('section_id',
                'asc')->orderby('row_no',
                'asc')->paginate(\Config::get('front.backend_pagination'));
        } else {
            $Banners = Banner::orderby('section_id', 'asc')->orderby('row_no',
                'asc')->paginate(\Config::get('front.backend_pagination'));
        }
        return view("dashboard.banners.list", compact("Banners", "GeneralWebmasterSections", "WebmasterBanners"));
    }

    private function resize($file, $path)
    {
        $img = Image::make($file);
        $maxWidth = 1920;

        // resize image
        $img->resize($maxWidth, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg');

        // set a background-color for the emerging area
        // $img->resizeCanvas(1920, 1080, 'center', false, '000000');

        // save image
        $img->save($path, 80)->encode('jpg');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sectionId)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        //Banner Sections Details
        $WebmasterBanner = WebmasterBanner::find($sectionId);

        return view("dashboard.banners.create", compact("GeneralWebmasterSections", "WebmasterBanner"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }


        $next_nor_no = Banner::max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        $Banner = new Banner;
        $Banner->row_no = $next_nor_no;
        $Banner->section_id = $request->section_id;
        $Banner->code = $request->code;
        foreach (Helper::languagesList() as $ActiveLanguage) {
            if ($ActiveLanguage->box_status) {
                $Banner->{"title_" . $ActiveLanguage->code} = $request->{"title_" . $ActiveLanguage->code};
                $Banner->{"details_" . $ActiveLanguage->code} = $request->{"details_" . $ActiveLanguage->code};

                // Start of Upload Files
                $path = @Helper::uploadPath('banners');

                $formFileName = "file_" . $ActiveLanguage->code;
                $fileFinalName = "";
                if ($request->hasFile($formFileName)) {
                    $this->validate($request, [
                        $formFileName => 'mimes:png,jpeg,jpg,gif,webp|max:15240'
                    ]);

                    $file = $request->file($formFileName);
                    $fileFinalName = uniqid() . '.jpg';
                    $this->resize($file, $path.$fileFinalName);
                }
                if ($fileFinalName == "") {
                    $formFileName = "file2_" . $ActiveLanguage->code;
                    if ($request->hasFile($formFileName)) {
                        $this->validate($request, [
                            $formFileName => 'mimes:mp4,ogv,webm|max:15240'
                        ]);

                        $file = $request->file($formFileName);
                        $fileFinalName = uniqid() . '.jpg';
                        $this->resize($file, $path.$fileFinalName);
                    }
                }
                //save file name
                $Banner->{"file_" . $ActiveLanguage->code} = $path.$fileFinalName;
            }
        }

        $Banner->icon = $request->icon;
        $Banner->video_type = $request->video_type;
        if ($request->video_type == 2) {
            $Banner->youtube_link = $request->vimeo_link;
        } else {
            $Banner->youtube_link = $request->youtube_link;
        }
        $Banner->link_url = $request->link_url;
        $Banner->visits = 0;
        $Banner->status = 1;
        if (@$request->expire_date != "") {
            $Banner->expire_date = Helper::dateForDB($request->expire_date);
        }
        $Banner->created_by = Auth::user()->id;
        $Banner->save();

        // clear cache
        Cache::tags(tenant('id'))->flush();

        return redirect()->action('Dashboard\BannersController@index')->with('doneMessage', __('backend.addDone'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        if (@Auth::user()->permissionsGroup->view_status) {
            $Banners = Banner::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Banners = Banner::find($id);
        }
        if (!empty($Banners)) {
            //Banner Sections Details
            $WebmasterBanner = WebmasterBanner::find($Banners->section_id);

            return view("dashboard.banners.edit", compact("Banners", "GeneralWebmasterSections", "WebmasterBanner"));
        } else {
            return redirect()->action('Dashboard\BannersController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        $Banner = Banner::find($id);
        if (!empty($Banner)) {

            $Banner->section_id = $request->section_id;
            $Banner->code = $request->code;

            foreach (Helper::languagesList() as $ActiveLanguage) {
                if ($ActiveLanguage->box_status) {
                    $Banner->{"title_" . $ActiveLanguage->code} = $request->{"title_" . $ActiveLanguage->code};
                    $Banner->{"details_" . $ActiveLanguage->code} = $request->{"details_" . $ActiveLanguage->code};

                    // Start of Upload Files
                    $path = @Helper::uploadPath('banners');

                    $formFileName = "file_" . $ActiveLanguage->code;
                    $fileFinalName = "";
                    if ($request->hasFile($formFileName)) {
                        $this->validate($request, [
                            $formFileName => 'mimes:png,jpeg,jpg,gif,webp|max:15240'
                        ]);

                        if ($request->$formFileName != "") {
                            $file = $request->file($formFileName);
                            $fileFinalName = uniqid() . '.jpg';
                            $this->resize($file, $path.$fileFinalName);
                        }
                    }
                    if ($fileFinalName == "") {
                        $formFileName = "file2_" . $ActiveLanguage->code;
                        if ($request->hasFile($formFileName)) {
                            $this->validate($request, [
                                $formFileName => 'mimes:mp4,ogv,webm|max:15240'
                            ]);

                            $file = $request->file($formFileName);
                            $fileFinalName = uniqid() . '.jpg';
                            $this->resize($file, $path.$fileFinalName);
                        }
                    }
                    //save file name
                    if ($fileFinalName != "") {
                        // Delete a banner file
                        if ($Banner->{"file_" . $ActiveLanguage->code} != "") {
                            File::delete($Banner->{"file_" . $ActiveLanguage->code});
                        }

                        $Banner->{"file_" . $ActiveLanguage->code} = $path.$fileFinalName;
                    }
                }
            }

            $Banner->video_type = $request->video_type;
            if ($request->video_type == 2) {
                $Banner->youtube_link = $request->vimeo_link;
            } else {
                $Banner->youtube_link = $request->youtube_link;
            }
            $Banner->link_url = $request->link_url;
            $Banner->icon = $request->icon;
            $Banner->status = $request->status;
            $Banner->expire_date = Helper::dateForDB($request->expire_date);
            $Banner->updated_by = Auth::user()->id;
            $Banner->save();

            // clear cache
            Cache::tags(tenant('id'))->flush();
            
            return redirect()->action('Dashboard\BannersController@edit', $id)->with('doneMessage', __('backend.saveDone'));
        } else {
            return redirect()->action('Dashboard\BannersController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Banner = Banner::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Banner = Banner::find($id);
        }
        if (!empty($Banner)) {
            // Delete a banner file
            foreach (Helper::languagesList() as $ActiveLanguage) {
                if ($ActiveLanguage->box_status) {
                    if ($Banner->{"file_" . $ActiveLanguage->code} != "") {
                        File::delete($Banner->{"file_" . $ActiveLanguage->code});
                    }
                }
            }

            $Banner->delete();
            return redirect()->action('Dashboard\BannersController@index')->with('doneMessage', __('backend.deleteDone'));
        } else {
            return redirect()->action('Dashboard\BannersController@index');
        }
    }


    /**
     * Update all selected resources in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        //
        if ($request->action == "order") {
            foreach ($request->row_ids as $rowId) {
                $Banner = Banner::find($rowId);
                if (!empty($Banner)) {
                    $row_no_val = "row_no_" . $rowId;
                    $Banner->row_no = $request->$row_no_val;
                    $Banner->save();
                }
            }

        } else {
            if ($request->ids != "") {
                if ($request->action == "activate") {
                    Banner::wherein('id', $request->ids)
                        ->update(['status' => 1]);

                } elseif ($request->action == "block") {
                    Banner::wherein('id', $request->ids)
                        ->update(['status' => 0]);

                } elseif ($request->action == "delete") {
                    // Check Permissions
                    if (!@Auth::user()->permissionsGroup->delete_status) {
                        return Redirect::to(route('NoPermission'))->send();
                    }
                    // Delete banners files
                    $Banners = Banner::wherein('id', $request->ids)->get();
                    foreach ($Banners as $banner) {
                        foreach (Helper::languagesList() as $ActiveLanguage) {
                            if ($ActiveLanguage->box_status) {
                                if ($banner->{"file_" . $ActiveLanguage->code} != "") {
                                    File::delete($banner->{"file_" . $ActiveLanguage->code});
                                }
                            }
                        }
                    }

                    Banner::wherein('id', $request->ids)
                        ->delete();

                }
            }
        }
        // clear cache
        Cache::tags(tenant('id'))->flush();

        return redirect()->action('Dashboard\BannersController@index')->with('doneMessage', __('backend.saveDone'));
    }


}
