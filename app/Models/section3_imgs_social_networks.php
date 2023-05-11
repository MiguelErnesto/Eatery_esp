<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section3_imgs_social_networks extends Model
{
    use HasFactory;

    protected $table = 'section3_imgs_social_networks';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = ['section3_imgs_id', 'name', 'image', 'link'];

    protected $hidden = ['created_at', 'updated_at'];
}
