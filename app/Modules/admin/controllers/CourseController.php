<?php

namespace App\Modules\admin\controllers;

use App\Http\Models\Course;
use App\Http\Models\Task;
use App\Modules\admin\models\CourseTaskModel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Modules\admin\helpers\ApiResponseHelper;


class CourseController extends CrudController
{
    use AuthenticatesUsers;

    protected $class = CourseTaskModel::class;

    protected $model;

    public function __construct(Request $request)
    {
        $this->model = new $this->class;
        $this->model->fill($request->all());
    }


    public function getTaskByScope(int $id)
    {
        $result = $this->model->getTaskByScope($id);
        return (!empty($result))
            ? ApiResponseHelper::getSuccessResponse($result)
            : ApiResponseHelper::getErrorResponse([], 'Ничего не найдено', 200);
    }

    public function addTaskInCourse()
    {
        return $this->model->addTaskInCourse();
    }

    public function getTasksByCourse(int $id)
    {
        $this->model->courseId = $id;
        return ApiResponseHelper::getSuccessResponse($this->model->getTasksByCourse());
    }

    public function deleteTasksOnCourse(int $taskId)
    {
        $this->model->taskId = $taskId;
        return ($this->model->deleteTasksOnCourse())
            ? redirect()->back()->with('info', 'Удаление записи завершено')
            : redirect()->back()->with('error', 'Ошибка удаления задачи из курса');
    }

    public function generateRandomCourse(int $courseId)
    {
        $this->model->courseId = $courseId;
        if (!Course::where('id', $courseId)->get()) {
            throw new \Exception('Курс не найден');
        }
        $count = Task::where('course_id', $courseId)->count();
        if ($count >= Course::LIMIT_TASK_IN_COURSE || $count > 0) {
            return redirect()->back()->with('error', 'Курс уже сгенерирован либо уже содержит задачи');
        }
        $task = $this->model->generateRandomCourse();
        return (!$task)
            ? redirect()->back() - with('error', 'Курс успешно сгенерирован')
            : redirect()->back()->with('info', 'Курс успешно сгенерирован');
    }

    public function searchTask($search)
    {
        try {
            $result = $this->model->getTaskByName($search);
            $count = count($result);
            return (!empty($result))
                ? ApiResponseHelper::getSuccessResponse(['tasks' => $result, 'count' => $count])
                : ApiResponseHelper::getErrorResponse([], 'Ничего не найдено', 200);
        } catch (\Exception $e) {
            return ApiResponseHelper::getErrorResponse([], 'Ничего не найдено', 200);
        }
    }
}
