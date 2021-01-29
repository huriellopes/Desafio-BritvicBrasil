<?php

namespace App\Architecture\Bookings\Models;

use App\Architecture\Cars\Models\Car;
use App\Architecture\Clients\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'client_id',
        'car_id',
        'reserved_at'
    ];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'client_id');
    }
}
