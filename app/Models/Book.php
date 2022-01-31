<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publish_year',
        'rack_id',
    ];

    public function rack()
    {
        return $this->hasOne(Rack::class, 'id', 'rack_id');
    }

}
