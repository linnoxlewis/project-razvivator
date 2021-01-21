<?php

namespace App\Http\Models;


use Illuminate\Support\Facades\File;

/**
 * Сферы развития
 *
 * Class Scope
 *
 * @package App\Http\Models
 */
class Course extends BaseModel
{
    public $timestamps = true;

    protected $table = 'course';

    protected $fillable = ['name', 'description','status',];

    public const LIMIT_TASK_IN_COURSE = 30;

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($course) {
            Task::where('course_id', $course->id)
                ->update(['course_id' => null]);
        });
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:course,name, ' . $this->id,
            'description' => 'string|min:3',
            'status' => 'integer',
        ];
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public static function validateCountTask($courseId)
    {
        $tasks = Task::where('course_id', '=', $courseId)->get();
        return $tasks->count() < static::LIMIT_TASK_IN_COURSE;
    }
}
