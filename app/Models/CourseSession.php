<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseSession extends Model
{
	use HasFactory;

	protected $table = 'courses_session';

	protected $fillable = [
		'course_id',
		'session_date',
		'start_time',
		'end_time',
		'qr_code_data',
		'is_active',
	];

	protected $casts = [
		'session_date' => 'date',
		'start_time' => 'datetime',
		'end_time' => 'datetime',
		'is_active' => 'boolean',
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