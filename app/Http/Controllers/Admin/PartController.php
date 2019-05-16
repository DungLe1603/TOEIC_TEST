<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\Skill;
use App\Services\PartService;
use App\Http\Requests\Admin\PostPartRequest;
use App\Http\Requests\Admin\PutPartRequest;

class PartController extends Controller
{
    private $partService;

    /**
    * Contructer
    *
    * @param App\Service\PartService $partService partService
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
        $skills = Skill::all();
        return view('admin.part.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostPartRequest $request)
    {
        $data = $request->all();
        if (!empty($this->partService->store($data))) {
            return redirect()->route('admin.parts.index')->with('success', trans('common.message.create_success'));
        }
        return redirect()->route('admin.parts.create')->with('error', trans('common.message.create_error'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Part $part part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        $skills = Skill::all();
        return view('admin.part.edit', compact('skills', 'part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\PutPartRequest $request request
     * @param App\Models\Part                  $part    part
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PutPartRequest $request, Part $part)
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
     * @param App\Models\Part $part part
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        if ($this->partService->destroy($part)) {
            return redirect()->route('admin.parts.index')->with('success', trans('common.message.delete_success'));
        }
        return redirect()->route('admin.parts.index')->with('error', trans('common.message.delete_error'));
    }
}
