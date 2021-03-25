<?php

namespace App\Rules;

use App\Models\Employee;
use Illuminate\Contracts\Validation\Rule;

class CheckSubordinationLevelRule implements Rule
{
    private $model;

    /**
     * CheckSubordinationLevelRule constructor.
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
     * @param  string  $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value) : bool
    {
        if ($headEmployee = Employee::find($value)) {
            $maxChildCount = $this->model->max_child_count ?? 0;
            $headCount = $headEmployee->head_count;
            $currentLengthBranchTree = $maxChildCount + $headCount + 1;

            if ($currentLengthBranchTree > Employee::MAX_LENGTH_BRANCH_TREE) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() : string
    {
        return 'The length of a tree branch cannot be more than ' . Employee::MAX_LENGTH_BRANCH_TREE;
    }
}
