<?php

namespace App\Architecture\Cars\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = [
        'car_model',
        'year',
        'vehicle_plate',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
