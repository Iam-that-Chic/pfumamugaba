<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userpoint extends Model
{
    use HasFactory;
    protected $table = 'userpoints';
    protected $primaryKey ='id';
    protected $fillable =[
        'user_id',
        'points'
        ];
}
