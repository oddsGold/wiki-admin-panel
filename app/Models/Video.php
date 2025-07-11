<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory,
        SoftDeletes;


    protected $fillable = [
        'title',
        'url',
    ];

    public $sortable = [
        'id',
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function preview()
    {
        return $this->belongsTo(Image::class,'preview_id');
    }

}
