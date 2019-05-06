<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Test;

class PutTestRequest extends FormRequest
{
    /**
     * Determine if the test is authorized to make this request.
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
        $id = $this->test->id;
        return [
            'name' => 'required|unique:tests,name,' . $id,
        ];
    }
}
