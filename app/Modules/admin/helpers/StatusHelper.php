<?php
namespace App\Modules\admin\helpers;

use Illuminate\Support\Collection;

/**
 * Хелпер статусов
 *
 * Class StatusHelper
 *
 * @package App\Modules\admin\helpers
 */
class StatusHelper
{
    public const STATUS_NEW = 0;

    public const STATUS_ACTIVE = 1;

    public const STATUS_CLOSED = 2;

    /**
     * Статусы
     *
     * @var array
     */

    /**
     * Получить список статусов
     *
     * @return array
     */
    public static function list(): array
    {
        $data = static::getCollection();
        return $data->all();
    }

    /**
     * Получить статус
     *
     * @param int $status
     *
     * @return mixed
     */
    public static function getStatus($status)
    {
        $data = static::getCollection();
        return $data->get($status);
    }

    /**
     * Создать коллекцию
     *
     * @return Collection
     */
    protected static function getCollection()
    {
        $data = [
            static::STATUS_NEW => 'Новый',
            static::STATUS_ACTIVE => 'Активный',
            static::STATUS_CLOSED => 'Отключен',
        ];

        return collect($data);
    }
}
