<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Result;
use App\Http\Requests\User\ProfileRequest;

class UserController extends Controller
{
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
        dd($data);
        if (!empty($this->userService->update($data, $user))) {
            return redirect()->route('profile')->with('success', trans('common.message.edit_success'));
        }
        return redirect()->route('profile')->with('error', trans('common.message.edit_error'));
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
    public function changePassword()
    {
        $user = \Auth::user();
        return view('public.user.changePassword', compact('user'));
    }
}
