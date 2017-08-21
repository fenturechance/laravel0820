<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';


    protected $fillable = [
        'name', 'price', 
    ]; //只有這些欄位可以被新增

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ]; //不希望user的密碼被洩漏

   
}
