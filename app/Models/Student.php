<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = 
    [
    'name',
    'code' ,
    'phone' ,
    'email' ,
    'nameFather' ,
    'codeFather' ,
    'phoneFather' ,
    'nameMother' ,
    'codeMother' ,
    'phoneMother' ,
    'avatar' ,
    'address' , 
    'isActive'
    ];
}