<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main extends Model
{
    use HasFactory;

    protected $table = 'mains';
    protected $primaryKey = 'id';

    protected $fillable = ['name1', 'name2'];

    protected $hidden = ['created_at', 'updated_at'];
}
