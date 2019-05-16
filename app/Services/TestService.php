<?php

namespace App\Services;

use App\Models\Test;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestService
{
    /**
     * Get all data table Tests
     *
     * @return object
     */
    public function getTests()
    {
        return Test::select('id', 'name', 'description')->get();
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
            $test = Test::create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
            DB::commit();
            return $test;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array           $data data
     * @param App\Models\Test $test $test
     *
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, Test $test)
    {
        DB::beginTransaction();
        try {
            $inputTest = [
                'name' => $data['name'],
                'description' => $data['description'],
            ];
            $test->update($inputTest);
            DB::commit();
            return $test;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Test $test test
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        try {
            return $test->delete();
        } catch (Exception $e) {
            Log::error($e);
        }
        return false;
    }
}
