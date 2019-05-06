<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Part;

class PostPartRequest extends FormRequest
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
        return [
            'name' => 'required|unique:parts',
            'section' => 'in:'.Part::Listening.','.Part::Reading.'',
        ];
    }
}
