<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    use HasFactory;

    protected $fillable =['name','logo','email','website'];

    static function getOldLogo($id)
    {
        $logo =  DB::table('shops')->select('logo')->where('id',$id)->pluck('logo')->first();
        return $logo;
    }

    public function getLogoAttribute($value)
    {
        if($value){
            return url('storage/logos/'.$value);
        }else{
            return null;
        }
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
