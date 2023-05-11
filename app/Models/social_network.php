<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social_network extends Model
{
    use HasFactory;

    protected $table = 'social_networks';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['name', 'image', 'url'];
    protected $hidden = ['created_at', 'updated_at'];
}
