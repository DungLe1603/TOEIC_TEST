<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentService
{
    /**
     * Get all data table Comments
     *
     * @return object
     */
    public function getAll()
    {
        return Comment::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Comment $Comment Comment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $Comment)
    {
        try {
            return $Comment->delete();
        } catch (Exception $e) {
            Log::error($e);
        }
        return false;
    }
}
