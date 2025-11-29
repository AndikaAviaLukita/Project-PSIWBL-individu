<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        //Akun Admin
        $admin = User::create([
            'name' => 'Admin Project',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        //Akun User Biasa
        $user = User::create([
            'name' => 'Anggota Tim 1',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        Task::create([
            'title' => 'Setup Project Awal',
            'description' => 'Melakukan instalasi Laravel, setup database, dan konfigurasi git.',
            'status' => 'in_progress',
            'due_date' => now()->addDays(2),
            'assigned_to' => $user->id,
            'created_by' => $admin->id,
        ]);
    }
}