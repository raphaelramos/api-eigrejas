<?php

namespace App\Http\Controllers\APIs\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\{Count};
use Helper; use Cache; Use Lang; use Auth;

class CountController extends Controller
{
    public function index($page = 1, $limit = 10, $search = '', Request $request) {
		$orderDate = '>=';

		$counts = Count::select('id', 'date')
			->limit($limit)
			->offset(($page - 1) * $limit)
			->orderBy('date');

		// Filters
		if ($request->hasHeader('filters')) {
			$filters = json_decode($request->header('filters'));
			if (!empty($filters->place_id)) {
				$counts->where('place_id', $filters->place_id);
			}
			if (!empty($filters->order) and $filters->order == 'previous') {
				$orderDate = '<=';
			}
		}

		if ($search != '') {
			$search = Helper::dateForDB($search);
			$counts->whereDate('date', $orderDate, $search);
		}

		return $counts->get();
    }

    public function show($id) {
        return Count::where('id', $id)->first();
    }

    public function store(Request $request)
	{
		$id = $request->input("id");

		// Validação
		$request->validate([
			'date' => 'required'
		]);

		$count = Count::firstOrNew(['id' => $id]);

        $count->date 	    =   Helper::dateForDB($request->input("date"), 1);
        $count->place_id 	=   $request->input("place_id");
        $count->total 	    =   $request->input("total");
        $count->decisions 	=   $request->input("decisions");
        $count->kids 	    =   $request->input("kids");
        $count->user_id 	=   Auth::user()->id;

		$count->save();

		return response()->json([
			'message' 	=> Lang::get('backend.saved')
		]);
	}

	public function destroy($id, Request $request)
	{
		$count = Count::find($id);
		$count->delete();

		return response()->json([
			'message' 	=> Lang::get('backend.deleted')
		]);
	}

}