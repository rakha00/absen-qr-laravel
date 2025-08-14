<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class CourseSession extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($session) {
            // Delete the associated QR code file
            if ($session->qr_code_path && Storage::disk('public')->exists($session->qr_code_path)) {
                Storage::disk('public')->delete($session->qr_code_path);
            }
        });
    }

    protected $table = 'courses_session';

    protected $fillable = [
        'course_id',
        'session_name',
        'session_date',
        'start_time',
        'end_time',
        'qr_code_data',
        'qr_code_path',
    ];

    protected $casts = [
        'session_date' => 'date', // Change to 'date'
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Get the course that owns the session.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the attendances for the session.
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class, 'session_id');
    }
}
