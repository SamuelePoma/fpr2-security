<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function assessments() {
        return $this->hasMany(Assessment::class);
    }

    public function average() {
        $assessments = $this->assessments();
        if ($assessments->count() == 0) return 0;

        $total = 0;
        foreach($assessments->get() as $assessment) {
            $total += $assessment->grade;
        }
        return round($total / $assessments->count(),1);
    }

    public function isPassed() {
        return ($this->average() > 5.5);
    }
}
