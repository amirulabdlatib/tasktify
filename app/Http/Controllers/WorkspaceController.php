<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class WorkspaceController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
            ->latest()
            ->select([
                'id',
                'name',
                'status',
                'due_at',
                'completed_at',
            ])
            ->paginate(20);

        $total_task_count = $tasks->count();

        $completed_task_count = $tasks->where('status', TaskStatusEnum::COMPLETED)->count();

        $pending_task_count = $tasks->where('status', TaskStatusEnum::PENDING)->count();

        $overdue_task_count = $tasks->where('status', TaskStatusEnum::PENDING)
            ->where('due_at', '<', now())
            ->count();

        return view('workspace.index', compact(
            'tasks',
            'total_task_count',
            'completed_task_count',
            'pending_task_count',
            'overdue_task_count'
        ));
    }
}
