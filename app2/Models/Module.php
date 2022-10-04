<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kurskuerzel',
        'kurzbezeichnung',
        'beschreibung',
        'tags',
        'logo',
        'user_id',
        /* TODO: könnte noch erweitert werden
        'beginn_datum',
        'end_datum',*/
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('kurzbezeichnung', 'like', '%' . request('search') . '%')
                ->orWhere('beschreibung', 'like', '%' . request('search') . '%')
                ->orWhere('kurskuerzel', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to User
    /* um vom Model aus den entsprechenden Tutor zu erhalten:
            Module::find(1)->user()->get()
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // public function tickets()
    // {
    //     //return $this->belongsTo(Ticket::class, 'module_id');


    //     return $this->hasMany(Ticket::class, 'module_id');
    // }

    /* Um alle zugewiesenen Module zum TUtor zu erhalten wird folgende Abfrage benötigt
            6 = user_id
    User::find(6)->modules()->get()
      */
    //   public function modules()
    //   {
    //       return $this->hasMany(Module::class, 'user_id');
    //   }

    // Module::find(28)->tickets()->get()
      public function tickets2()
      {
          return $this->hasMany(Ticket::class, 'module_id');
      }
      public function tickets()
      {
          return $this->hasMany(Ticket::class, 'module_id');
      }
}
