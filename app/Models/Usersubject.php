<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Laravel\Lumen\Auth\Authorizable;

// class User extends Model implements AuthenticatableContract, AuthorizableContract
// {
//     use Authenticatable, Authorizable, HasFactory;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var string[]
//      */
//     protected $fillable = [
//         'name', 'email',
//     ];

//     /**
//      * The attributes excluded from the model's JSON form.
//      *
//      * @var string[]
//      */
//     protected $hidden = [
//         'password',
//     ];
// }

use Illuminate\Database\Eloquent\Model;
class Usersubject extends Model{
protected $primaryKey = 'authorid';
public $timestamps = false;
protected $table = 'tblauthors';
// column sa table
protected $fillable = [
'authorid', 'fullname', 'gender', 'birthday'
];
}