<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateRule implements Rule
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
        return (bool) strtotime($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() : string
    {
        return 'The date does not match the format d.m.Y';
    }
}
