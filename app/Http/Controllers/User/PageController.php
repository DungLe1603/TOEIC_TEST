<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
    * Redicrect to home paga
    *
    * @return \Illuminate\Http\Response
    */
    public function homePage()
    {
        return view('public.pages.home');
    }

    /**
    * Redicrect to sample question paga
    *
    * @return \Illuminate\Http\Response
    */
    public function sampleQuestion()
    {
        return view('public.pages.sample_question');
    }

    /**
    * Redicrect to score lever paga
    *
    * @return \Illuminate\Http\Response
    */
    public function scoreLever()
    {
        return view('public.pages.score_lever');
    }

    /**
    * Redicrect to TOEIC tips paga
    *
    * @return \Illuminate\Http\Response
    */
    public function toeicTip()
    {
        return view('public.pages.toeic_tips');
    }
}
