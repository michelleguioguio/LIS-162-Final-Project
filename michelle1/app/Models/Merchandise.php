<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchandise extends Model
{
    use SoftDeletes;
    protected $table = 'merchandise';
    protected $fillable = [
        'name',
        'price',
        'stock',
        'user_id',
        'merchandise_type_id',
    ];

    public function events()
{
    return $this->belongsToMany(Event::class, 'event_merchandise', 'merchandise_id', 'event_id')
                ->withTimestamps()
                ->withPivot('user_id'); // if you want to track user who added
}

public function user()
    {
        return $this->belongsTo(User::class);
    }

public function merchandiseType()
{
    return $this->belongsTo(MerchandiseType::class);
}

}
use App\Models\Event;


