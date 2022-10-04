<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleMaterials extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {

        if ($filters['search'] ?? false) {
            $query->where('bezeichnung', 'like', '%' . request('search') . '%')
            ->orWhere('beschreibung', 'like', '%' . request('search') . '%')
            ->orWhere('id', 'like', '%' . request('search') . '%');
        }
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bezeichnung',
        'beschreibung',
    ];
}

