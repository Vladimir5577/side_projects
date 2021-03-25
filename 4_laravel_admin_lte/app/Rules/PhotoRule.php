<?php

namespace App\Rules;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\ImplicitRule;

class PhotoRule implements ImplicitRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        $rules = [];

        if (request()->isMethod('POST')) {
            $rules[] = 'required';
        } else {
            $rules = array_merge($rules, ['sometimes', 'nullable']);
        }

        $rules = array_merge($rules, ['image', 'max:5120']);

        $validator = Validator::make([
            $attribute => $value,
        ], [
            $attribute => $rules,
        ]);

        return !$validator->fails();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() : string
    {
        return 'Incorrect image.';
    }
}
