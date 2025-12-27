<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Merchandise;

class MerchandiseType extends Model
{
    use SoftDeletes;
    protected $table = 'merchandise_types';
    protected $fillable = [
        'name',
        'event_date',
    ];

    protected $casts = [
    'patong' => 'integer',
    ];

    public function merchandise()
    {
        return $this->hasMany(Merchandise::class);
    }
}

