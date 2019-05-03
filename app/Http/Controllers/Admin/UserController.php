<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Services\UserService;
use App\Http\Requests\Admin\PostUserRequest;
use App\Http\Requests\Admin\PutUserRequest;

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
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getUserWithPaginate();
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostUserRequest $request)
    {
        $data = $request->all();
        if (!empty($this->userService->store($data))) {
            return redirect()->route('admin.users.index')->with('success', trans('common.message.create_success'));
        }
        return redirect()->route('admin.users.create')->with('error', trans('common.message.create_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\User $user user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::select('id', 'name')->get();
        if (\Auth::user()->id == $user->id ||  $user->role_id != \App\Models\Role::ADMIN_ROLE) {
            return view('admin.user.edit', compact('user', 'roles'));
        }
        session()->flash('error', trans('user.edit_error'));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(PutUserRequest $request, User $user)
    {
        $data = $request->all();
        if (!empty($this->userService->update($data, $user))) {
            return redirect()->route('admin.users.index')->with('success', trans('common.message.edit_success'));
        }
        return redirect()->route('admin.users.edit', $user)->with('error', trans('common.message.edit_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\User $user user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($this->userService->destroy($user)) {
            return redirect()->route('admin.users.index')->with('success', trans('common.message.block_success'));
        }
        return redirect()->route('admin.users.index')->with('error', trans('common.message.block_error'));
    }
}
