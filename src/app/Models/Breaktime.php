<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'worktime_id',
        'start_breaktime',
        'end_breaktime',
    ];

    public function worktime()
    {
        $this->belongsTo('App\Models\Worktime');
    }
}
