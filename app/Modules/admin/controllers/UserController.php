<?php
namespace App\Modules\admin\controllers;

use App\Http\Models\UserCharacter;
use App\Http\Models\Users;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Базовый класс КРУДОВ
 *
 * Class CrudController
 *
 * @package App\Modules\admin\controllers
 */
class UserController extends CrudController
{
    /**
     * Создание или обновление записи
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Exception
     */
    public function change(Request $request)
    {
        if($request->isMethod('post'))
        {
            $id = $request->input('id');
            (isset($id))
                ? $model = $this->getModel($id)
                : $model = $this->getModel();

            $validate = Validator::make($request->all(),$model->rules());
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate->errors());
            }
            $model->fill($request->all());
            if(array_key_exists('upload',$this->config) && isset($request->{$this->config['upload']['field']})) {
                $imageName = $this->imageUploadPost($request,$this->config['upload']);
                $model->{$this->config['upload']['field']} = $imageName;
            }
            $model->save();
            $this->saveRelation($model,$request);
            return redirect()->route('admin.'.$this->getViewAlias().'.index')->with('info', 'Запись добавлена ');
        }
    }

    /**
     * Сохранение персонажа юзера
     *
     * @param Users $user
     * @param Request $request
     */
    protected function saveRelation( Users $user, Request $request)
    {
        $characterId = $request->input('character_id');
        if(!empty($characterId)) {
            $character = $user->character ? : new UserCharacter();
            $character->character_id =$characterId;
            $user->character()->save($character);
        }
    }
}
