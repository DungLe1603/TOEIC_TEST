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
                'section' => $data['section'],
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
}
