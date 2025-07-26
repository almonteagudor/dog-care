<?php

namespace App\Http\Requests\Api\Disease;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiseaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:diseases|max:50',
            'description' => 'required|max:500',
        ];
    }
}
