<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'created_by'];

    // Relasi: Anggota kelompok (Many-to-Many)
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user')->withTimestamps();
    }

    // Relasi: Admin pembuat kelompok
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}