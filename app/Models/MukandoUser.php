<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mukando;
class MukandoUser extends Model
{
    use HasFactory;
    protected $table = 'mukando_users';
    protected $primaryKey ='id';
    protected $fillable =[
        'user_id',
        'mukando_id',
        ];
        public function mukando(){
            return $this->belongsTo(Mukando::class, 'mukando_id','id');
        }
       
}
