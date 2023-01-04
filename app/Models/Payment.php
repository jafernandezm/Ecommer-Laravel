<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payed_at',
        'order_id',
    ];

    protected $dates=[
        'payed_at',
    ];

    public function order(){
        //tiene una orden de pago, pertece a una orden
        return $this->belongsTo(Order::class);
    }

}
