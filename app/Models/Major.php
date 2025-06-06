<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'title',
        'teacher_id',
    ];
        public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}
