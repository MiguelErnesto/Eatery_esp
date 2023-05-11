<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;

    protected $table = 'footers';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'symbol',
        'year',
        'owner',
        'link',
        'name_link',
        'other_details',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
