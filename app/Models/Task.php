<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    public function getUser(){
        return $this->hasOne(User::class,'id');
    }
     protected $fillable = [
        'user_id'       
    ];
}
