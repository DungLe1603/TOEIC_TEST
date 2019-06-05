<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Part;
use App\Services\TestService;
use App\Services\QuestionService;
use App\Http\Requests\Admin\PostTestRequest;
use App\Http\Requests\Admin\PutTestRequest;

class TestController extends Controller
{
    private $testService;

    /**
    * Contructer
    *
    * @param App\Service\TestService $testService testService
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
     * Show the detail of specified resource.
     *
     * @param Admin\Models\Test $test test
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        // $questions = [];
        $parts =Part::all();
        // foreach ($parts as $key => $part) {
        //     $questions[$key] = $this->testService->getQuestionInPart($test->id, $part->name);
        // }
        $questionPart1 = $this->testService->getQuestionInPart($test->id, 'Part 1');
        $questionPart2 = $this->testService->getQuestionInPart($test->id, 'Part 2');
        $groupPart3 = $this->testService->getGroupInPart($test->id, 'Part 3');
        $groupPart4 = $this->testService->getGroupInPart($test->id, 'Part 4');
        $questionPart5 = $this->testService->getQuestionInPart($test->id, 'Part 5');
        $groupPart6 = $this->testService->getGroupInPart($test->id, 'Part 6');
        $groupPart7 = $this->testService->getGroupInPart($test->id, 'Part 7');
        return view('admin.test.detail', compact('test', 'parts', 'questionPart1', 'questionPart2', 'groupPart3', 'groupPart4', 'questionPart5','groupPart6', 'groupPart7'));
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
     * @param \Illuminate\Http\Request $request request
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
