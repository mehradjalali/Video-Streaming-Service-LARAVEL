<?php

namespace App\Models\video;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model {
    use HasFactory;

    protected $table = "videos";
    protected $fillable = [
        "name",
        "user_id",
        "URL",
    ];
    public $timestamps = true;
}