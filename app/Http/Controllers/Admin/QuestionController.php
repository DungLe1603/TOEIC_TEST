<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Part;
use App\Services\QuestionService;

// use App\Http\Requests\Admin\PostQuestionRequest;
// use App\Http\Requests\Admin\PutQuestionRequest;

class QuestionController extends Controller
{
    private $questionService;

    /**
    * Contructer
    *
    * @param App\Service\QuestionService $questionService questionService
    *
    * @return void
    */
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }
    
    /**
     * Display the question listing of the resource.
     *
     * @param int $id test_id
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $questions = $this->questionService->getQuestionsInTest($id);
        return view('admin.question.list', compact('questions', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $id test_id
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $parts = Part::select('id', 'name')->get();
        return view('admin.question.create', compact('parts', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      test_id
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        dd($data);
        if (!empty($this->questionService->store($data, $id))) {
            return redirect()->route('admin.test.questions', $id)->with('success', trans('common.message.create_success'));
        }
        return redirect()->route('admin.question.create', $id)->with('error', trans('common.message.create_error'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id questionId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::where('id', $id)->first();
        $group = $question->group;
        return view('admin.question.edit', compact('question', 'group'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request  request
    * @param App\Models\Question      $question question
    *
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Question $question)
    {
        $data = $request->all();
        dd($data);
        dd($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id $questionId
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $question = Question::findOrFail($id);
        $testId = $question->test_id;
        if ($this->questionService->destroy($question)) {
            return redirect()->route('admin.test.questions', $testId)->with('success', trans('common.message.delete_success'));
        }
        return redirect()->route('admin.test.questions', $testId)->with('error', trans('common.message.delete_error'));
    }
}
