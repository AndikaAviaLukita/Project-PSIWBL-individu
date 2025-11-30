<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGroupController extends Controller
{
    public function index()
    {
        // Ambil semua kelompok
        $groups = Group::withCount('users')->latest()->get();
        
        // Ambil daftar ID kelompok yang diikuti user
        $myGroupIds = Auth::user()->groups()->pluck('groups.id')->toArray();

        return view('user.groups.index', compact('groups', 'myGroupIds'));
    }

    public function join(Group $group)
    {
        // Cek status join
        if (!$group->users()->where('user_id', Auth::id())->exists()) {
            $group->users()->attach(Auth::id());
            return redirect()->back()->with('success', 'Berhasil bergabung ke kelompok ' . $group->name);
        }

        return redirect()->back()->with('error', 'Anda sudah menjadi anggota kelompok ini.');
    }

    public function leave(Group $group)
    {
        // detach (keluar grup)
        $group->users()->detach(Auth::id());
        return redirect()->back()->with('success', 'Anda telah keluar dari kelompok ' . $group->name);
    }
}