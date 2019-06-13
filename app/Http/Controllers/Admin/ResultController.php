<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Result;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();
        return view('admin.result.list', compact('results'));
    }

    /**
     * Display a listing of search.
     *
     * @return \Illuminate\Http\Response
     */
     public function search(Request $request)
     {
        $searchData = $request->search_data;
        $userData = Result::whereHas('user', function($subquery) use ($searchData) {
                        $subquery->where('name', 'LIKE', '%'.$searchData.'%');
                    })->get();
        $userTest = Result::whereHas('test', function($subquery) use ($searchData) {
                        $subquery->where('name', 'LIKE', '%'.$searchData.'%');
                    })->get();
        if (count($userData)) {
            $results = $userData;
        } else {
            $results = $userTest;
        }
        return view('admin.result.list', compact('results'));
     }
}
