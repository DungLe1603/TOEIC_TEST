<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Part;

class PutPartRequest extends FormRequest
{
    /**
     * Determine if the part is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->part->id;
        return [
            'name' => 'required|unique:parts,name,' . $id,
            'section' => 'in:'.Part::Listening.','.Part::Reading.'',
        ];
    }
}
