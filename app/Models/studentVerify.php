<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class studentVerify extends Model
{
    use HasFactory;
    protected $table = "student_verify";
    protected $fillable = [
        'student_token',
        'student_id'
    ];

    public function Student(): BelongsTo
    {
        return $this->belongsTo(student::class);
    }
}
