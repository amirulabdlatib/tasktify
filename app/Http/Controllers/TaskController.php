<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    use AuthorizesRequests;

    public function create()
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        Task::create([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('workspace')->with('status', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $this->authorize('view', $task);

        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $data = $request->validated();

        $data['completed_at'] = $data['status'] === TaskStatusEnum::COMPLETED->value
            ? now()
            : null;

        $task->update($data);

        return redirect()
            ->route('workspace')
            ->with('status', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()
            ->route('workspace')
            ->with('status', 'Task deleted successfully');
    }
}
