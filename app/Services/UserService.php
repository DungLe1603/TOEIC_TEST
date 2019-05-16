<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * Get all data table users
     *
     * @return object
     */
    public function getUserWithPaginate()
    {
        return User::with(['role'])->paginate(config('define.number_element_in_table'));
    }

    /**
     * Get all data trash
     *
     * @return object
     */
    public function getTrashWithPaginate()
    {
        return User::onlyTrashed()->with(['role', 'profile'])->paginate(config('define.paginate.limit_rows'));
    }

    /**
     * Restore user
     *
     * @param int $id id
     *
     * @return boolean
     */
    public function restore(int $id)
    {
        return User::onlyTrashed()->where('id', $id)->restore();
    }


    /**
     * Force delete user
     *
     * @param int $id id
     *
     * @return boolean
     */
    public function forceDelete(int $id)
    {
        try {
            $user = User::onlyTrashed()->where('id', $id)->first();
            if ($user->role_id != Role::ADMIN_ROLE) {
                if ($user->profile->avatar) {
                    File::delete(public_path($user->profile->avatar));
                }
                return $user->forceDelete();
            }
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
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
            $user = User::create([
                'role_id' => $data['role_id'],
                'email' => $data['email'],
                'name' => $data['name'],
                'password' => bcrypt($data['password']),
                'avatar' => isset($data['avatar']) ? $this->uploadAvatar($data['avatar']) : null,
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
            ]);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Upload Avatar
     *
     * @param string $avatar avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadAvatar($avatar)
    {
        $fileName = time().'-'.$avatar->getClientOriginalName();
        $avatar->move('upload', $fileName);
        return $fileName;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array           $data data
     * @param App\Models\User $user user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, User $user)
    {
        // dd($data['role_id']);
        DB::beginTransaction();
        try {
            // if ($user->role_id == Role::ADMIN_ROLE && ($data['role_id'] != Role::ADMIN_ROLE || Auth::user()->id != $user->id)) {
            //     session()->flash('error', trans('user.edit_error'));
            //     return false;
            // }
            $inputUser = [
                'name' => $data['name'],
                'gender' => $data['gender'],
                'role_id' => $data['role_id'],
                'birthday' => $data['birthday'],
            ];
            if (isset($data['avatar'])) {
                $inputUser['avatar'] = $this->uploadAvatar($data['avatar']);
                File::delete(public_path($user->avatar));
            }
            // dd($inputUser['role_id']);
            $user->update($inputUser);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\User $user user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        try {
            if ($user->role_id != Role::ADMIN_ROLE) {
                return $user->delete();
            }
        } catch (Exception $e) {
            Log::error($e);
        }
        return false;
    }

    /**
     * Update the profile.
     *
     * @param array $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(array $data)
    {
        $user = \Auth::user();
        DB::beginTransaction();
        try {
            $inputProfile = [
                'name' => $data['name'],
                'gender' => $data['gender'],
                'address' => $data['address'],
                'phonenumber' => $data['phonenumber'],
            ];
            if (isset($data['avatar'])) {
                $inputProfile['avatar'] = $this->uploadAvatar($data['avatar']);
                File::delete(public_path($user->profile->avatar));
            }
            $user->profile->update($inputProfile);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Register a new account
     *
     * @param array $data data
     *
     * @return object
     */
    public function register(array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'role_id' => Role::CUSTOMER_ROLE,
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            Profile::create([
                'user_id' => $user['id'],
                'name' => $data['name'],
                'gender' => $data['gender'],
                'address' => $data['address'],
                'phonenumber' => $data['phonenumber'],
                'avatar' => isset($data['avatar']) ? $this->uploadAvatar($data['avatar']) : null,
            ]);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Update the password.
     *
     * @param array $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(array $data)
    {
        $user = \Auth::user();
        DB::beginTransaction();
        try {
            $user->password = bcrypt($data['new_password']);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }
}
