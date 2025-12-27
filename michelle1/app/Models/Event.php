<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Merchandise;

class Event extends Model
{
    use SoftDeletes;
    protected $table = 'events';
    protected $fillable = [
        'name',
        'event_date',
    ];

    protected $casts = [
    'event_date' => 'date',
];


     public function merchandise()
    {
        return $this->belongsToMany(
        Merchandise::class,
        'event_merchandise' // pivot table
    )->withTimestamps();
}
}



