<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable =['first_name','last_name','email','phone','shop_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
