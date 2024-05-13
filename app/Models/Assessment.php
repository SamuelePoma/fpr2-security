<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function isPassed() {
        return ($this->grade >= 5.5);
    }
}
