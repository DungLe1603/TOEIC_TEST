<?php

namespace App\Services;

use App\Models\Test;
use App\Models\Part;
use App\Models\GroupQuestion;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuestionService
{
    /**
     * Get all data table Tests
     *
     * @param int $id test_id
     * @return object
     */
    public function getQuestionsInTest($id)
    {
        return Question::where('test_id', $id)->orderBy('part_id') ->get();
    }
}
