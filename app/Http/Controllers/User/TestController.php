<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TestService;

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
    * Redicrect to tests list paga
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $tests = $this->testService->getTests();
        return view('public.test.list',compact('tests'));
    }
}
