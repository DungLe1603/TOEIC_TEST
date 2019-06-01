<?php

namespace App\Services;

use App\Models\Test;
use App\Models\Part;
use App\Models\GroupQuestion;
use App\Models\Question;
use App\Models\Picture;
use App\Models\Voice;
use App\Models\Answer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use File;

class QuestionService
{
    /**
     * Get all data table Tests
     *
     * @param int $id test_id
     *
     * @return object
     */
    public function getQuestionsInTest($id)
    {
        return Question::where('test_id', $id)->orderBy('part_id') ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data data
     * @param int   $id   test_id
     *
     * @return \Illuminate\Http\Response
     */
    public function store(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            if (isset($data['picture'])) {
                $picture = Picture::create([
                    'path' => $this->uploadFile($data['picture']),
                ]);
            }
            if (isset($data['voice'])) {
                $voice = Voice::create([
                    'path' => $this->uploadFile($data['voice']),
                ]);
            }
            if (isset($data['group_question'])) {
                $group = GroupQuestion::create([
                    'type' => $data['group_question'],
                    'picture_id' => isset($picture) ? $picture->id : null,
                    'voice_id' => isset($voice) ? $voice->id : null,
                ]);
            }
            if (isset($group)) {
                foreach ($data['content'] as $key => $content) {
                    $question = Question::create([
                        'test_id' => $id,
                        'part_id' => $data['part_id'],
                        'content' => $content,
                        'group_id' => $group->id
                    ]);
                    foreach ($data['answer'][$key] as $aKey => $answer) {
                        $this->createAnswer($question->id, $answer, ($data['correct_answer'][$key] == $aKey) ? 1 : 0);
                    }
                }
            } else {
                $question = Question::create([
                    'test_id' => $id,
                    'part_id' => $data['part_id'],
                    'content' => $data['content'],
                    'picture_id' => isset($picture) ? $picture->id : null,
                    'voice_id' => isset($voice) ? $voice->id : null,
                ]);
                foreach ($data['answer'] as $key => $answer) {
                    $this->createAnswer($question->id, $answer, ($data['correct_answer'] == $key) ? 1 : 0);
                }
            }
            DB::commit();
            return $question;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Upload file
     *
     * @param string $file file
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadFile($file)
    {
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('upload', $fileName);
        return $fileName;
    }

    /**
     * Create answer
     *
     * @param int    $questionId questionId
     * @param string $content    content
     * @param int    $isCorrect  isCorrect
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnswer($questionId, $content, $isCorrect = 0)
    {
        return Answer::create([
            'question_id' => $questionId,
            'content' => $content,
            'correct_flag' => $isCorrect,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Question $question question
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        try {
            $question->answers()->delete();
            return $question->delete();
        } catch (Exception $e) {
            Log::error($e);
        }
        return false;
    }
}
