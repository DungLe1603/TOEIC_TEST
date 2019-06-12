<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Result;
use App\Services\UserService;
use App\Http\Requests\User\ProfileRequest;
use App\Http\Requests\User\PasswordRequest;

class UserController extends Controller
{
    private $userService;

    /**
    * Contructer
    *
    * @param App\Service\UserService $userService userService
    *
    * @return void
    */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
    * Show profile
    *
    * @return \Illuminate\Http\Response
    */
    public function profile()
    {
        $user = \Auth::user();
        return view('public.user.profile', compact('user'));
    }

    /**
    * Change profile
    *
    * @param PostUserRequest $request $request
    * @return \Illuminate\Http\Response
    */
    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $user = \Auth::user();
        if (!empty($this->userService->update($data, $user))) {
            return redirect()->route('profile')->with('success', trans('common.message.update_profile_success'));
        }
        return redirect()->route('profile')->with('error', trans('common.message.update_profile_error'));
    }

    /**
    * Show test result list
    *
    * @return \Illuminate\Http\Response
    */
    public function testResult()
    {
        $results = Result::where('user_id', \Auth::user()->id)->get();
        return view('public.user.result_list', compact('results'));
    }

    /**
    * Show change password form
    *
    * @return \Illuminate\Http\Response
    */
    public function formPassword()
    {
        $user = \Auth::user();
        return view('public.user.changePassword', compact('user'));
    }

    /**
    * Handle change password form
    *
    * @param PasswordRequest $request $request
    * @return \Illuminate\Http\Response
    */
    public function changePassword(Request $request)
    {
        $data = $request->all();
        $user = \Auth::user();
        if (!empty($this->userService->changePassword($data))) {
            return redirect()->route('profile')->with('success', trans('common.message.change_password_success'));
        }
        return redirect()->route('password')->with('error', trans('common.message.change_password_error'));
    }
}
