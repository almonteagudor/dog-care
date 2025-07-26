<?php

namespace App\Http\Requests\Api\Medicine;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicineRequest extends FormRequest
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
