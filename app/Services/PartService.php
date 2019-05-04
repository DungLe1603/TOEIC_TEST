<?php

namespace App\Services;

use App\Models\Part;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PartService
{
    /**
     * Get all data table Parts
     *
     * @return object
     */
    public function getParts()
    {
        return Part::all();
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
            $Part = Part::create([
                'name' => $data['name'],
                'section' => $data['section'],
                'description' => $data['description'],                
            ]);
            DB::commit();
            return $Part;
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
     * @param App\Models\Part $Part Part
     *
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, Part $Part)
    {
        // dd($data['role_id']);
        DB::beginTransaction();
        try {
            // if ($Part->role_id == Role::ADMIN_ROLE && ($data['role_id'] != Role::ADMIN_ROLE || Auth::Part()->id != $Part->id)) {
            //     session()->flash('error', trans('Part.edit_error'));
            //     return false;
            // }
            $inputPart = [
                'name' => $data['name'],
                'gender' => $data['gender'],
                'role_id' => $data['role_id'],
                'birthday' => $data['birthday'],
            ];
            if (isset($data['avatar'])) {
                $inputPart['avatar'] = $this->uploadAvatar($data['avatar']);
                File::delete(public_path($Part->avatar));
            }
            // dd($inputPart['role_id']);
            $Part->update($inputPart);
            DB::commit();
            return $Part;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Part $Part Part
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($Part)
    {
        try {
            if ($Part->role_id != Role::ADMIN_ROLE) {
                return $Part->delete();
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
        $Part = \Auth::Part();
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
                File::delete(public_path($Part->profile->avatar));                
            }
            $Part->profile->update($inputProfile);
            DB::commit();
            return $Part;
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
            $Part = Part::create([
                'role_id' => Role::CUSTOMER_ROLE,
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            Profile::create([
                'Part_id' => $Part['id'],
                'name' => $data['name'],
                'gender' => $data['gender'],
                'address' => $data['address'],
                'phonenumber' => $data['phonenumber'],
                'avatar' => isset($data['avatar']) ? $this->uploadAvatar($data['avatar']) : null,
            ]);
            DB::commit();
            return $Part;
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
        $Part = \Auth::Part();
        DB::beginTransaction();
        try {
            $Part->password = bcrypt($data['new_password']);
            DB::commit();
            return $Part;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }
}
