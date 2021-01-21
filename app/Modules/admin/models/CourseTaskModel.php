<?php

namespace App\Modules\admin\models;

use App\Http\Models\Course;
use App\Http\Models\Task;
use App\Modules\admin\helpers\ApiResponseHelper;
use App\Modules\admin\helpers\StatusHelper;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель курсов с их задачами
 *
 * Class CourseTaskModel
 *
 * @package App\Modules\admin\models
 */
class CourseTaskModel extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['taskId', 'courseId'];

    /**
     * Атрибуты
     *
     * @var array
     */
    protected $attributes = [
        'taskId',
        'courseId'
    ];

    /**
     * Получение задач по сфере
     *
     * @param int $id id сферы
     *
     * @return mixed
     */
    public function getTaskByScope(int $id)
    {
        return Task::select(['id', 'name'])
            ->where('scope_id', $id)
            ->where('status', '!=', StatusHelper::STATUS_CLOSED)
            ->where('course_id', null)
            ->get();
    }

    /**
     * Получение задач по сфере
     *
     * @param int $id id сферы
     *
     * @return mixed
     */
    public function getTaskByName(string $search)
    {
        return Task::select(['id', 'name'])
            ->where('name','like', '%'. $search . '%')
            ->where('status', '!=', StatusHelper::STATUS_CLOSED)
            ->where('course_id', null)
            ->get()
            ->toArray();
    }

    /**
     * Добавить задачу в курс
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addTaskInCourse()
    {
        $course = Course::find($this->courseId);
        if (empty($course)) {
            return ApiResponseHelper::getErrorResponse(null, 'Курс не найден');
        }
        if (!Course::validateCountTask($this->courseId)) {
            return ApiResponseHelper::getErrorResponse(null, 'Лимит по задачам достигнут');
        }
        $data = tap(Task::findOrFail($this->taskId))->update(['course_id' => $this->courseId])->toArray();
        return (!empty($data))
            ? ApiResponseHelper::getSuccessResponse($data, 'Задача успешно добавлена в курс')
            : ApiResponseHelper::getErrorResponse($data, 'Ошибка добавление задачи в курс');
    }

    /**
     * Получить задачи по курсу
     *
     * @return mixed
     */
    public function getTasksByCourse()
    {
       return Task::select(['id', 'name', 'scope_id'])
           ->where('course_id', $this->courseId)
           ->get();
    }

    /**
     * Удалить задачу из курса
     *
     * @return mixed
     */
    public function deleteTasksOnCourse()
    {
        return Task::findOrFail($this->taskId)->update(['course_id' => null]);
    }

    /**
     * Cгенерировать курс из рандомных задач
     *
     * @return mixed
     */
    public function generateRandomCourse()
    {
        return Task::where('course_id', null)
            ->inRandomOrder()
            ->limit(Course::LIMIT_TASK_IN_COURSE)
            ->update(['course_id' => $this->courseId]);
    }
}
