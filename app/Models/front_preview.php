<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class front_preview extends Model
{
    use HasFactory;

    protected $table = 'front_previews';
    protected $primaryKey = 'id';

    protected $fillable = ['url'];

    protected $hidden = ['created_at', 'updated_at'];
}
