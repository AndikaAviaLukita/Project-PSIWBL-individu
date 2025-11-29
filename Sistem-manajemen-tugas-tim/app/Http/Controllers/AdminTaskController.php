<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function index()
    {
        // Mengambil semua tugas
        $tasks = Task::with('assignee')->latest()->get();
        
        // PENTING: Harus mengarah ke folder admin/dashboard
        return view('admin.dashboard', compact('tasks'));
    }

    public function create()
    {
        // Mengambil user untuk dropdown
        $users = User::where('role', 'user')->get();
        return view('admin.tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'assigned_to' => $validated['assigned_to'],
            'due_date' => $validated['due_date'],
            'status' => 'pending',
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Tugas berhasil dibuat!');
    }
}