<?php

namespace App\Models;

use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'total_price',
        'pincode',
        'status',
        'message',
        'tracking_no',
    ];

    public function orderitems()
    {
        return $this->hasMany(Orderitem::class); 
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
