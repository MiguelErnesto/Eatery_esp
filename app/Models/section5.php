<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section5 extends Model
{
    use HasFactory;

    protected $table = 'section5s';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['map_longitude', 'map_latitude'];

    protected $hidden = ['created_at', 'updated_at'];
}
