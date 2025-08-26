<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
        'npm',
        'attendance_time',
        'status',
    ];

    protected $casts = [
        'attendance_time' => 'datetime',
    ];

    /**
     * Get the session that owns the attendance.
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(CourseSession::class, 'session_id');
    }

    /**
     * Get the student that owns the attendance.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
