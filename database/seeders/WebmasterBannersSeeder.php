<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\WebmasterBanner;

class WebmasterBannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Home Banners Settings
        $settings = new WebmasterBanner();
        $settings->row_no = 1;
        $settings->title_pt = "Banners Home";
        $settings->title_en = "Home Banners";
        $settings->title_es = "Banners Home";
        $settings->width = 1600;
        $settings->height = 500;
        $settings->desc_status = 1;
        $settings->link_status = 1;
        $settings->icon_status = 0;
        $settings->type = 1;
        $settings->status = 1;
        $settings->created_by = 1;
        $settings->save();

        //  Text Banners Settings
        $settings = new WebmasterBanner();
        $settings->row_no = 2;
        $settings->title_pt = "Banners Texto";
        $settings->title_en = "Text Banners";
        $settings->title_es = "Banners de texto";
        $settings->width = 330;
        $settings->height = 330;
        $settings->desc_status = 1;
        $settings->link_status = 1;
        $settings->icon_status = 1;
        $settings->type = 0;
        $settings->status = 1;
        $settings->created_by = 1;
        $settings->save();

        //  Side Banners Settings
        $settings = new WebmasterBanner();
        $settings->row_no = 3;
        $settings->title_pt = "Banners Laterais";
        $settings->title_en = "Side Banners";
        $settings->title_es = "Banners laterales";
        $settings->width = 330;
        $settings->height = 330;
        $settings->desc_status = 0;
        $settings->link_status = 1;
        $settings->icon_status = 0;
        $settings->type = 1;
        $settings->status = 1;
        $settings->created_by = 1;
        $settings->save();

        //  Stories Banners Settings
        $settings = new WebmasterBanner();
        $settings->row_no = 4;
        $settings->title_pt = "Stories App";
        $settings->title_en = "Stories App";
        $settings->title_es = "Stories App";
        $settings->width = 1920;
        $settings->height = 1080;
        $settings->desc_status = 0;
        $settings->link_status = 1;
        $settings->icon_status = 0;
        $settings->type = 3;
        $settings->status = 1;
        $settings->created_by = 1;
        $settings->save();

    }
}
