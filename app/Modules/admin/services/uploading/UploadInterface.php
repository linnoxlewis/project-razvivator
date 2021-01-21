<?php


namespace App\Modules\admin\services\uploading;

/**
 * Интерфейс выгрузки
 *
 * Interface uploadInterface
 *
 * @package App\Modules\admin\services\uploading
 */
interface UploadInterface
{
    /**
     * Инициализация компонента
     *
     * @param string $fileName           имя файла
     * @param string $tableName          название таблицы
     * @param array $relationFileDbField саязь полей таблицы с полями файлов
     *
     * @return mixed
     */
    public function inisialize(string $fileName, string $tableName, array $relationFileDbField);

    /**
     * Получение данных выгрузки
     *
     * @return mixed
     */
    public function getData();

    /**
     * Загрузка данных выгрузки
     *
     * @param array $value данные
     *
     * @return mixed
     */
    public function setData($value);

    /**
     * Выгрузка данных
     *
     * @param null|array $data данные выгрузки
     *
     * @return mixed
     */
    public function upload($data = null);

}
