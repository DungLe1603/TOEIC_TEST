<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CommentService;

class CommentController extends Controller
{
    private $commentService;

    /**
    * Contructer
    *
    * @param App\Service\ommentService $commentService commentService
    *
    * @return void
    */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->commentService->getAll();
        return view('admin.comment.list', compact('comments'));
    }
}
