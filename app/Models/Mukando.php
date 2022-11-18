<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mukando extends Model
{
    use HasFactory;
    protected $table = 'mukando';
    protected $primaryKey ='id';
    protected $fillable =[
        'name',
        'description',
        'target',
        'monthly',
        'end_date'
        ];
}
