<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table='posts';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'note', 'author',
    ]; //只有這些欄位可以被新增

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ]; //不希望user的密碼被洩漏

    public function author(){
        return $this->hasOne('App\User','id','author');
    }

}


// $user=new App\user;
// $user->create(['name'=>'jerry', 'email'=>'jerry@gmail.com', 'password'=>Hash::make('password') ]);