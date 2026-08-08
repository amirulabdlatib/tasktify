<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WorkspaceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Task::where('user_id', Auth::id());

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $tasks = $query->latest()
            ->select([
                'id',
                'name',
                'status',
                'due_at',
                'completed_at',
            ])
            ->paginate(2)
            ->withQueryString();

        $baseQuery = Task::where('user_id', Auth::id());

        $total_task_count = (clone $baseQuery)->count();

        $completed_task_count = (clone $baseQuery)->where('status', TaskStatusEnum::COMPLETED)->count();

        $pending_task_count = (clone $baseQuery)->where('status', TaskStatusEnum::PENDING)->count();

        $overdue_task_count = (clone $baseQuery)->where('status', TaskStatusEnum::PENDING)
            ->where('due_at', '<', now())
            ->count();

        return view('workspace.index', compact(
            'tasks',
            'search',
            'total_task_count',
            'completed_task_count',
            'pending_task_count',
            'overdue_task_count'
        ));
    }
}
