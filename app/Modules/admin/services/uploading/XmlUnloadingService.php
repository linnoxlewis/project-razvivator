<?php

namespace App\Modules\admin\services\uploading;

use Illuminate\Support\Facades\DB;

/**
 * XML выгрузка
 *
 * Class XmlUnloadingService
 *
 * @package App\Modules\admin\services
 */
class XmlUnloadingService implements UploadInterface
{
    /**
     * Объект загрузки
     *
     * @var \XMLReader
     */
    protected $csvReader;

    /**
     * Путь к файлу
     *
     * @var string
     */
    protected $filePath = '/uploading';

    /**
     * Поля выгрузки
     *
     * @var array
     */
    protected $fields;

    /**
     * Имя таблицы
     *
     * @var string
     */
    protected $tableName;

    /**
     * Данные вставки
     *
     * @var array
     */
    protected $insertData = [];

    /**
     * Инициализация компонента
     *
     * @param string $fileName имя файла
     * @param string $tableName название таблицы
     * @param array $relationFileDbField саязь полей таблицы с полями файлов
     *
     * @return mixed
     * @throws \Exception
     */
    public function inisialize(string $fileName, string $tableName, array $relationFileDbField)
    {
        try {
            $reader = new \XMLReader();
            $reader->open(public_path() . '/' . $this->filePath . '/' . $fileName);
            $this->tableName = $tableName;
            $this->fields = $relationFileDbField;
            $this->csvReader = $reader;

            return $this;
        } catch (\Exception $e){
            return null;
        }
    }

    /**
     * Получение данных выгрузки
     *
     * @return mixed
     */
    public function getData()
    {
        $result = [];
        $records = [];
        $item = [];
        try {
            while ($this->csvReader->read()) {
                if ($this->csvReader->nodeType == \XMLReader::ELEMENT) {
                    foreach ($this->fields as $field) {
                        if ($this->csvReader->name == $field) {
                            $this->csvReader->read();
                            $item[$field] = $this->csvReader->value;
                            if (end($this->fields) == $field) {
                                $records[] = $item;
                            }
                        }
                    }
                }
            }
            $reverse = array_flip($this->fields);
            foreach ($records as $values) {
                foreach ($values as $key => $value) {
                    if (array_key_exists($key, $reverse)) {
                        $preResult[$reverse[$key]] = $value;
                    }
                }
                $result[] = $preResult;
            }
            return $result;
        } catch (\Exception $e){
            return [];
        }
    }

    /**
     * Загрузка данных выгрузки
     *
     * @param array $value данные
     *
     * @return mixed
     */
    public function setData($value)
    {
        $this->insertData = $value;
        return $this;
    }

    /**
     * Выгрузка данных
     *
     * @param null|array $data данные выгрузки
     *
     * @return mixed
     */
    public function upload($data = null)
    {
        (!empty($data)) ? $insert = $data : $insert = $this->getData();
        return DB::table($this->tableName)->insert($insert);
    }
}
