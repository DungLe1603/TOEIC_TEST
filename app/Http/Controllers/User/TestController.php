<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TestService;
use App\Services\QuestionService;
use App\Models\Test;
use App\Models\Part;

class TestController extends Controller
{
    private $testService;
    private $questionService;

    /**
    * Contructer
    *
    * @param App\Service\TestService     $testService    s testService
    * @param App\Service\QuestionService $questionService questionService
    *
    * @return void
    */
    public function __construct(TestService $testService, QuestionService $questionService)
    {
        $this->testService = $testService;
        $this->questionService = $questionService;
    }

    /**
    * Redicrect to tests list paga
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $tests = $this->testService->getTests();
        return view('public.test.list', compact('tests'));
    }

    /**
    * Show test detail for doing
    *
    * @param int $id id
    *
    * @return \Illuminate\Http\Response
    */
    public function detail($id)
    {
        $test = Test::find($id);
        $parts =Part::all();
        $questionPart1 = $this->testService->getQuestionInPart($test->id, 'Part 1');
        $questionPart2 = $this->testService->getQuestionInPart($test->id, 'Part 2');
        $groupPart3 = $this->testService->getGroupInPart($test->id, 'Part 3');
        $groupPart4 = $this->testService->getGroupInPart($test->id, 'Part 4');
        $questionPart5 = $this->testService->getQuestionInPart($test->id, 'Part 5');
        $groupPart6 = $this->testService->getGroupInPart($test->id, 'Part 6');
        $groupPart7 = $this->testService->getGroupInPart($test->id, 'Part 7');
        return view('public.test.detail', compact('test', 'parts', 'questionPart1', 'questionPart2', 'groupPart3', 'groupPart4', 'questionPart5', 'groupPart6', 'groupPart7'));
    }
    
    /**
    * Handle test detail for doing
    *
    * @param Request $request request
    * @param int $id id
    *
    * @return \Illuminate\Http\Response
    */
    public function handleTest(Request $request, $id)
    {
        $data = $request->all();
        dd($data);
    }
}
