<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Services\PartService;
// use App\Http\Requests\Admin\PostPartRequest;
// use App\Http\Requests\Admin\PutPartRequest;

class PartController extends Controller
{
    private $partService;

    /**
    * Contructer
    *
    * @param App\Service\UserService $userService userService
    *
    * @return void
    */
    public function __construct(PartService $partService)
    {
        $this->partService = $partService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = $this->partService->getParts();
        return view('admin.part.list', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.part.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (!empty($this->partService->store($data))) {
            return redirect()->route('admin.parts.index')->with('success', trans('common.message.create_success'));
        }
        return redirect()->route('admin.parts.create')->with('error', trans('common.message.create_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Part  $part part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        return view('admin.part.edit', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Part $part)
    {
        $data = $request->all();
        if (!empty($this->partService->update($data, $part))) {
            return redirect()->route('admin.parts.index')->with('success', trans('common.message.edit_success'));
        }
        return redirect()->route('admin.parts.edit', $part->id)->with('error', trans('common.message.edit_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
