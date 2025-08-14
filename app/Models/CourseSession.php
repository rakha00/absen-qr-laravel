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
		'session_name',
		'session_date',
	];

	protected $casts = [
		'session_date' => 'datetime',
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