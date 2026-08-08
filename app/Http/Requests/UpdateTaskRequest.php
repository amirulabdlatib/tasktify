<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Validator;

class UpdateTaskRequest extends CreateTaskRequest
{
    public function rules(): array
    {
        return [
            ...parent::rules(),
            'status' => [new Enum(TaskStatusEnum::class)]
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $task = $this->route('task');

            if (
                $task
                && $task->status === TaskStatusEnum::COMPLETED
                && $this->input('status') === TaskStatusEnum::PENDING->value
            ) {
                $validator->errors()->add(
                    'status',
                    'A completed task cannot be reverted to pending.'
                );
            }
        });
    }
}
