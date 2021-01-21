<?php

namespace App\Modules\admin\controllers;

use App\Http\Models\Scope;
use App\Http\Models\Task;
use App\Modules\admin\serviceProviders\UnloadingFacade;
use Illuminate\Http\Request;

/**
 * Выгрузка задач
 *
 * Class TaskController
 *
 * @package App\Modules\admin\controllers
 */
class TaskController extends CrudController
{
    /**
     * Метод выгрузки
     *
     * @return mixed
     */
    public function uploadTask(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin::' . $this->getViewAlias() . '.upload');
        } elseif ($request->isMethod('post')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = public_path() . '/uploading';
                $filename = 'upload_' . date('Y-m-d') . '.xml';
                $file->move($path, $filename);
                $uploadService = UnloadingFacade::inisialize($filename, Task::getTableTitle(), Task::getCsvFields());
                if(!$uploadService){
                    redirect()->route('admin.' . $this->getViewAlias() . '.index')->with('error', 'Не удалось распарсить файл');
                }
                $results = $uploadService->getData();
                if(empty($results)){
                    redirect()->route('admin.' . $this->getViewAlias() . '.index')->with('error', 'Не удалось распарсить файл');
                }
                $data = collect($results)->map(function ($data) {
                    $scopes = Scope::get()->pluck('key', 'id')->toArray();
                    if (in_array($data['scope_id'], $scopes)) {
                        $data['scope_id'] = array_search($data['scope_id'], $scopes);
                    }
                    return $data;
                })->toArray();
                return ($uploadService->upload($data))
                    ? redirect()->route('admin.' . $this->getViewAlias() . '.index')->with('info', 'Запись добавлена ')
                    : redirect()->route('admin.' . $this->getViewAlias() . '.index')->with('error', 'Ошибка выгрузки');
            }
        }
    }
}
