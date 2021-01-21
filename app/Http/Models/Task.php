<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\Cache;

/**
 * Сферы развития
 *
 * Class Scope
 *
 * @package App\Http\Models
 */
class Task extends BaseModel
{
    public $timestamps = true;

    protected $table = 'task';

    protected $fillable = ['name', 'description','status','scope_id','course_id'];

    /**
     * Валдиация данных
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:scope,id, ' . $this->id,
            'description' => 'string|min:3',
            'status' => 'integer',
            'scope_id' => 'required|integer',
            'course_id' => 'integer'
        ];
    }

    /**
     * Связь со сферой
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }

    /**
     * Связь с курсам
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Получить название таблицы
     *
     * @return mixed
     */
    public static function getTableTitle()
    {
        return with(new static)->getTable();
    }

    /**
     * Соотношение полей с бд с полями из csv
     *
     * @return array
     */
    public static function getCsvFields()
    {
        return [
            'scope_id' => 'sphere_cey',
            'name' => 'title',
            'description' => 'description'
        ];
    }

    /**
     * Получить задачи
     *
     * @param int $scopeId id сферы
     *
     * @return mixed
     */
    public static function getByScope($scopeId)
    {
        return Cache::remember('tasks_scope_' . $scopeId,10, function() use ($scopeId) {
            return static::where('scope_id', $scopeId)->get();
        });
    }
}
