<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('assignee')->latest()->get();

        return view('admin.dashboard', compact('tasks'));
    }
}