<?php
namespace App\Modules\admin\controllers;

use App\Http\Controllers\Controller;
//use App\Services\Logs\Log;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Базовый класс КРУДОВ
 *
 * Class CrudController
 *
 * @package App\Modules\admin\controllers
 */
class CrudController extends Controller
{
    /**
     * order by and filters field
     *
     * @var array
     */
    protected $orderBy;

    /**
     * path to view
     *
     * @var string
     */
    protected $viewAlias;

    /**
     * Config array
     *
     * @var array
     */
    protected $config;

    /**
     * sort params
     *
     * @var string
     */
    public $sort;

    /**
     * Конструктор
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->middleware('isAdmin');

        $action = app('request')->route()->getAction();

        if(!array_key_exists('alias',$action)){
           throw new \Exception('key \'alias\' not found in route group');
        }
        $config =  config('adminmodules' . '.' . $action['alias']);
        if(!array_key_exists('modelName',$config)){
            throw new \Exception('key \'modelName\' not found in ' .  $action['alias'] );
        }
        if(!array_key_exists('orderBy',$config)){
            throw new \Exception('key \'orderBy\' not found in ' .  $action['alias'] );
        }
        if(!array_key_exists('viewAlias',$config)){
            throw new \Exception('key \'viewAlias\' not found in ' .  $action['alias'] );
        }

        $this->config = $config;
    }

    /**
     * Главная страница
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $model = $this->getModel();
        $filters = $request->all();
        if(is_array($filters) && !empty($filters)) {
            foreach ($filters as $key => $value) {
                if (!array_key_exists($key,$this->getOrderBy())
                    && !array_key_exists($key,$this->getSelectFilters())
                    ||  empty($value)) {
                    continue;
                } else{
                    (is_string($value))
                        ? $model = $model->where($key,'like', '%' .$value . '%')
                        : $model = $model->where($key,$value);
                }
            }
        }
        $orderBy = $request->input('sort');
        if(empty($orderBy)){
            $model->orderBy('id','desc');
        } else{
            $orderBy = explode(':',$orderBy);
            $model = $model->orderBy($orderBy[0],strtolower($orderBy[1]));
        }
        $model = $model->paginate(15);
        return view('admin::'.$this->getViewAlias().'.index', [
            'model' =>$model,
            'orderBy' => $this->getOrderBy(),
            'filter' => $filters,
            'selectFilter' => $this->getSelectFilters()
        ]);
    }

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
        $id = $request->input('id');
        if($request->isMethod('get')) {
            (!empty($id)) ? $model = $this->getModel($id) : $model = null;
            return view('admin::'.$this->getViewAlias().'.change',['model' => $model]);
        }
        if($request->isMethod('post') && !empty($request)) {
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

            return redirect()->route('admin.'.$this->getViewAlias().'.index')->with('info', 'Запись добавлена ');
        }
    }

    /**
     * Удаление записи
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $model = $this->getModel($id);
        $model->delete();
        return redirect()->route('admin.'.$this->getViewAlias().'.index')->with('info', 'Удаление завершено ');
    }

    public function view($id)
    {
        $model = $this->getModel($id);
        return view('admin::'.$this->getViewAlias().'.view',['model' => $model]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     * @throws \Exception
     */
    public function imageUploadPost(Request $request,$uploadConfig)
    {
        $request->validate([
            $uploadConfig['field'] => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->{$uploadConfig['field']}->extension();
        if(!$request->image->move(public_path('images/' . $uploadConfig['path']), $imageName)){
            throw new \Exception('Загрузка не удалась');
        }
        return $imageName;
    }

    /**
     *  Получение модели
     *
     * @param null $id
     *
     * @return mixed
     */
    protected function getModel($id = null)
    {
        $class =  $this->config['modelName'];
        return empty($id) ? new $class : $class::find($id);
    }

    /**
     * Получение правил валидаций
     *
     * @return array
     */
    protected function getRules()
    {
        return $this->config['rules'];
    }

    /**
     * Получение алиаса представления
     *
     * @return mixed
     */
    protected function getViewAlias()
    {
        return $this->config['viewAlias'];
    }

    /**
     * Получение параметров фильтраций и сортировке
     *
     * @return mixed
     */
    protected function getOrderBy()
    {
        return $this->config['orderBy'];
    }

    /**
     * Получение параметров фильтраций и сортировке
     *
     * @return mixed
     */
    protected function getSelectFilters()
    {
        return (array_key_exists('selectFilter',$this->config))
            ? $this->config['selectFilter']
            : [];
    }
}
