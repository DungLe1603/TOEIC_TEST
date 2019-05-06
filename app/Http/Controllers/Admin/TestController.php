<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Services\TestService;
use App\Http\Requests\Admin\PostTestRequest;
use App\Http\Requests\Admin\PutTestRequest;

class TestController extends Controller
{
    private $testService;

    /**
    * Contructer
    *
    * @param App\Service\TestService $TestService testService
    *
    * @return void
    */
    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = $this->testService->getTests();
        return view('admin.test.list', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostTestRequest $request)
    {
        $data = $request->all();
        if (!empty($this->testService->store($data))) {
            return redirect()->route('admin.tests.index')->with('success', trans('common.message.create_success'));
        }
        return redirect()->route('admin.tests.create')->with('error', trans('common.message.create_error'));
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
     * @param Admin\Models\Test $test test
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('admin.test.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param App\Models\Test          $test    test
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PutTestRequest $request, Test $test)
    {
        $data = $request->all();
        if (!empty($this->testService->update($data, $test))) {
            return redirect()->route('admin.tests.index')->with('success', trans('common.message.edit_success'));
        }
        return redirect()->route('admin.tests.edit', $test->id)->with('error', trans('common.message.edit_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin\Models\Test $test test
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        if ($this->testService->destroy($test)) {
            return redirect()->route('admin.tests.index')->with('success', trans('common.message.delete_success'));
        }
        return redirect()->route('admin.tests.index')->with('error', trans('common.message.delete_error'));
    }
}
