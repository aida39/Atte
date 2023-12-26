<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_worktime',
        'start_worktime',
        'end_worktime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function breaktimes()
    {
        return $this->hasMany(Breaktime::class);
    }
}
