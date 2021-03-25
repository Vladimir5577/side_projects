<?php

namespace App\Http\Requests;

use App\Rules\DateRule;
use App\Rules\PhotoRule;
use App\Rules\CheckNestedAttributesRule;
use App\Rules\CheckSubordinationLevelRule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'photo' => [new PhotoRule],
            'name' => ['required', 'string', 'min:2', 'max:256'],
            'phone' => ['required', 'string', 'regex:/^\+380 \([0-9]{2}\) [0-9]{3} [0-9]{2} [0-9]{2}/i'],
            'email' => ['required', 'max:255', 'email', "unique:employees,email,$this->id"],
            'position_id' => ['required', 'exists:positions,id'],
            'salary' => ['required', 'numeric', 'between:0,500.000'],
            'head_id' => [
                'sometimes',
                'nullable',
                'exists:employees,id',
                new CheckNestedAttributesRule($this->id),
                new CheckSubordinationLevelRule($this->id),
            ],
            'date' => ['required', new DateRule],
        ];
    }
}
