<?php

namespace App\Http\Models;

/**
 * Связь персонаж-пользователь
 *
 * Class UserCharacter
 *
 * @package App\Http\Models
 */
class UserCharacter extends BaseModel
{
    public $timestamps = true;

    protected $table = 'user_character';

    protected $fillable = ['user_id', 'character_id', 'score'];

    /**
     * Event`ы
     */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($userCharacter) {
            $scopes = Scope::all();
            foreach ($scopes as $scope) {
                $scopeLevel = new ScopeLevel();
                $scopeLevel::create([
                    'scopeId' => $scope->id,
                    'userCharacterId' => $userCharacter->id

                ]);
            }
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
            'user_id' => 'required|integer',
            'character_id' => 'required|integer',
            'sсore' => 'integer',
            'level' => 'integer|min:0|max:99',
        ];
    }

    /**
     * Связь с персонажем
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo(Character::class, 'character_id');
    }

    /**
     * Связь с прокачкой сфер
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scopeLevel()
    {
        return $this->hasMany(ScopeLevel::class,'userCharacterId');
    }

    /**
     * Связь с юзером
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(Users::class, 'user_id');
    }
}
