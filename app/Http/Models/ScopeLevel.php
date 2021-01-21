<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель персонажа
 *
 * Class Character
 *
 * @package App\Http\Models
 */
class ScopeLevel extends Model
{
    public $timestamps = true;

    protected $table = 'scope_level';

    protected $fillable = ['level', 'score', 'scopeId','userCharacterId'];

    /**
     * Правила валидации
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userCharacterId' => 'required|integer',
            'scopeId' => 'required|integer',
            'sсore' => 'integer',
            'level' => 'integer|min:0|max:99',
        ];
    }

    /**
     * Связб с прокачкой персонажа
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characterUser()
    {
        return $this->belongsToMany(UserCharacter::class, 'scope_level', 'userCharacterId', 'id');
    }

    /**
     * Связь со сферой развития
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scope()
    {
        return $this->belongsTo(Scope::class,'scopeId');
    }
}
