<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTaskController extends Controller
{
   
    public function index()
    {
        $tasks = Task::where('assigned_to', Auth::id())
                    ->latest()
                    ->get();

        return view('dashboard', compact('tasks'));
    }

    // Mengupdate status tugas
    public function updateStatus(Request $request, Task $task)
    {
        
        if ($task->assigned_to !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status tugas diperbarui!');
    }
}