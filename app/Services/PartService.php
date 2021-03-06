<?php

namespace App\Services;

use App\Models\Part;
use Illuminate\Support\Facades\Storage;
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
            $part = Part::create([
                'name' => $data['name'],
                'skill_id' => $data['skill_id'],
                'description' => $data['description'],
            ]);
            DB::commit();
            return $part;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array           $data data
     * @param App\Models\Part $part $part
     *
     * @return \Illuminate\Http\Response
     */
    public function update(array $data, Part $part)
    {
        DB::beginTransaction();
        try {
            $inputPart = [
                'name' => $data['name'],
                'skill_id' => $data['skill_id'],
                'description' => $data['description'],
            ];
            $part->update($inputPart);
            DB::commit();
            return $part;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Part $part part
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        try {
            return $part->delete();
        } catch (Exception $e) {
            Log::error($e);
        }
        return false;
    }
}
