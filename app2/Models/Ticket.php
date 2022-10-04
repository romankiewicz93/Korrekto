<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module_id',
        'materials_id',
        'priority',
        'kategory',
        'status',
        'description',
        'comment',
        'screenshot',
    ];

    public function scopeFilter($query, array $filters)
    {
         if ($filters['tag'] ?? false) {
             $tag = request('tag');
             $query->where(function ($q) use ($tag) {
                 $q->where('priority', 'like', '%' . $tag . '%')
                     ->orWhere('kategory', 'like', '%' . $tag . '%')
                     ->orWhere('status', 'like', '%' . $tag . '%');
             });
         }

        if ($filters['search'] ?? false) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('kategory', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('user_id', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('comment', 'like', '%' . $search . '%')
                    ->orWhere('priority', 'like', '%' . $search . '%');
            });
        }
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to Module
    public function modul()
    {
        return $this->belongsTo(Module::class, 'module_id');
        //return $this->hasMany(Module::class, 'module_id');
    }



}
