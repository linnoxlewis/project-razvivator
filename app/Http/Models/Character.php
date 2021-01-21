<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\File;

/**
 * Модель персонажа
 *
 * Class Character
 *
 * @package App\Http\Models
 */
class Character extends BaseModel
{
    public $timestamps = true;

    protected $table = 'character';

    protected $fillable = ['name', 'description', 'image','status'];


    protected static function boot()
    {
        parent::boot();
        static::deleting(function($character) {
            if(!empty($character->image)){
                $file = public_path('images/character/' . $character->image);
                File::delete($file);
            }
        });
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:3',
          //  'image' => 'string|min:3',
            'status' => 'integer|min:0|max:99',
        ];
    }

    public function characterUser()
    {
        return $this->hasOne(UserCharacter::class);
    }
}
