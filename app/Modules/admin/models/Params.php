<?php

namespace App\Modules\admin\models;

use Illuminate\Database\Eloquent\Model;

/**
 * Параметры системы
 *
 * Class Params
 *
 * @package App\Modules\admin\models
 */
class Params extends Model
{
    /**
     * Название таблицы
     *
     * @var string
     */
    public $table = 'system_params';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value', 'name',
    ];

    /**
     * Правила валидации
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'value' => 'required|min:0|max:99',
            'key' => 'required|string|min:0|max:255',
            'name' => 'required|string|min:1|max:255',
        ];
    }

    /**
     * Получение параметра
     *
     * @param string $key ключ параметра
     *
     * @return mixed
     */
    public static function getParam(string $key)
    {
        return static::where('key', $key)->first();
    }
}
