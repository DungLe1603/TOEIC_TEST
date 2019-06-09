<?php

namespace App\Services;

use App\Models\Test;
use App\Models\Part;
use App\Models\GroupQuestion;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Score;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestService
{
    /**
     * Get all data table Tests
     *
     * @return object
     */
    public function getTests()
    {
        return Test::select('id', 'name', 'description')->get();
    }

    /**
     * Get detail data of test
     *
     * @param string $testId testId
     * @param string $part   part
     *
     * @return object
     */
    public function getQuestionInPart($testId, $part)
    {
        return Question::select('id', 'content', 'picture_id', 'voice_id')
            ->where('test_id', $testId)
            ->whereHas('part', function ($query) use ($part) {
                $query->where('name', $part);
            })
            ->with('picture', 'voice')
            ->get();
    }

    /**
     * Get group question in part of test
     *
     * @param string $testId testId
     * @param string $part   part_name
     *
     * @return object
     */
    public function getGroupInPart($testId, $part)
    {
        return GroupQuestion::select('id', 'type', 'picture_id', 'voice_id')
            ->whereHas('questions', function ($query1) use ($testId, $part) {
                $query1->where('test_id', $testId)
                    ->whereHas('part', function ($query2) use ($part) {
                        $query2->where('name', $part);
                    });
            })
            ->with('picture', 'voice')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data data
     *
     * @return object
     */
    public function store(array $data)
    {
        DB::beginTransaction();
        try {
            $test = Test::create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
            DB::commit();
            return $test;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array           $data data
     * @param App\Models\Test $test $test
     *
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, Test $test)
    {
        DB::beginTransaction();
        try {
            $inputTest = [
                'name' => $data['name'],
                'description' => $data['description'],
            ];
            $test->update($inputTest);
            DB::commit();
            return $test;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Test $test test
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        try {
            return $test->delete();
        } catch (Exception $e) {
            Log::error($e);
        }
        return false;
    }

    /**
     * Caculation the score of test.
     *
     * @param array $data data
     * @param int   $id   testId
     *
     * @return \Illuminate\Http\Response
     */
    public function calScore(array $data, $id)
    {
        $listeningNum = 0;
        $readingNum = 0;
        foreach ($data['listeing_answer'] as $key => $value) {
            $answer = Answer::find($value);
            if ($answer->correct_answer == '1') {
                $listeningNum += 1;
            }
        }
        foreach ($data['reading_answer'] as $key => $value) {
            $answer = Answer::find($value);
            if ($answer->correct_flag == '1') {
                $readingNum += 1;
            }
        }
        $listeningScore = Score::where('number_correct', $listeningNum)->where('skill_id', 1)->first();
        $readingScore = Score::where('number_correct', $readingNum)->where('skill_id', 1)->first();
        try {
            $result = Result::create([
                'test_id' => $id,
                'user_id' => \Auth::user()->id,
                'listening_score' => $readingScore->score,
                'reading_score' => $readingScore->score,
            ]);
        } catch (Exception $e) {
            Log::error($e);
        }
        return $result;
    }
}
