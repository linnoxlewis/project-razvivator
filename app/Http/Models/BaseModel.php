<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

abstract class BaseModel extends Model
{
    /**
     * Правила валидации
     *
     * @param array $params
     *
     * @return bool|\Illuminate\Support\MessageBag
     */
    public function validate(array $params)
    {
        $validation = Validator::make($params,$this->rules());
        return  ($validation->fails()) ? $validation->errors() : true;
    }

    abstract protected function rules();
}
