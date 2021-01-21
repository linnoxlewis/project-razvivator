<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель пользователь
 *
 * Class Users
 *
 * @property string name
 * @property integer level
 * @property integer cahracter_id
 * @package App\Http\Models
 */
class Users extends Model
{
    public $timestamps = true;

    protected $table = 'users';

    protected $hidden = [
        'password'
    ];

    protected $fillable = ['name', 'email', 'password','status','image'];

    /**
     * Правила валидации
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:250',
            'password' => 'string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'level' => 'integer|min:1|max:99',
            'info' => 'string|min:3|max:2000',
            'hobies' => 'string|min:3|max:2000',
            'job' => 'string|min:3|max:500',
            'status' => 'integer|min:1|max:99'
        ];
    }

    /**
     * Связь с персонажем
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function character()
    {
        return $this->hasOne(UserCharacter::class,'user_id');
    }
}
