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
class Scope extends BaseModel
{
    public $timestamps = true;

    protected $table = 'scope';

    protected $fillable = ['name', 'description','key'];

    /**
     * Эвенты
     */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $id = $model->id;
            $scopes = ScopeLevel::all(['userCharacterId'])->toArray();
            foreach ($scopes as $scope) {
                $model = new ScopeLevel();
                $model::create([
                    'scopeId' => $id,
                    'userCharacterId' => $scope['userCharacterId']
                ]);
            }
        });
        static::deleting(function ($model) {
            $scopes = ScopeLevel::where('scopeId', $model->id)->delete();
        });
    }

    /**
     * Правила валидации
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:20|unique:scope,id, ' . $this->id,
            'description' => 'string|min:3',
            'key' => 'string|min:3',
        ];
    }

    /**
     * Связь с задачами
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Вернуть в виде списка
     *
     * @return mixed
     */
    public static function getList()
    {
        return Cache::remember('scopeList',10, function() {
            return static::pluck('name','id')->toArray();
        });
    }
}
