<?php

namespace App\Rules;

use App\Models\Employee;
use Illuminate\Contracts\Validation\Rule;

class CheckNestedAttributesRule implements Rule
{
    private $model;

    /**
     * CheckNestedAttributesRule constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->model = Employee::find($id);
    }

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
        return $this->model ? !in_array($value, $this->model->array_of_child_identifiers) : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() : string
    {
        return 'You are trying to assign the head recursively with another head.';
    }
}
