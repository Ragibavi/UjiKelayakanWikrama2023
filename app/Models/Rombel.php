<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $fillable = ['rombel'];

    use HasFactory;

    public function student(){
        return $this->hasMany(Student::class, 'rombel_id', 'id');
    }
}
