<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
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
        return view('tasks.edit', compact('task'));
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('workspace')
            ->with('status', 'Task deleted successfully');
    }
}
