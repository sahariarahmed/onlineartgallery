<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'course_user';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
