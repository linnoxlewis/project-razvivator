<?php

namespace App\Modules\admin\services\uploading;

use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Statement;

/**
 * Сsv выгрузка
 *
 * Class CsvUnloadingService
 *
 * @package App\Modules\admin\services
 */
class CsvUnloadingService implements UploadInterface
{
    /**
     * Объект загрузки
     *
     * @var Reader
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
     * @param string $fileName           имя файла
     * @param string $tableName          название таблицы
     * @param array $relationFileDbField саязь полей таблицы с полями файлов
     *
     * @return mixed
     * @throws \Exception
     */
    public function inisialize(string $fileName, string $tableName, array $relationFileDbField)
    {
        try {
            $this->csvReader = Reader::createFromPath(public_path() . '/' . $this->filePath . '/' . $fileName, 'r');
            $this->csvReader->setHeaderOffset(0);
            $this->tableName = $tableName;
            $this->fields = $relationFileDbField;

            if (!$this->checkRelation()) {
                throw new \Exception('Error relation');
            }
            return $this;
        } catch (\Exception $e){
            return null;
        }
    }

    /**
     * Получение ключей загрузки
     *
     * @return array|void
     */
    public function getHeaders()
    {
        $headers = $this->csvReader->getHeader();
        return explode(';', $headers[0]);
    }

    /**
     * Проверка связей
     *
     * @return bool
     */
    protected function checkRelation()
    {
        $headers = $this->getHeaders();
        $successRelation = true;
        foreach ($headers as $header) {
            if (!in_array($header, $this->fields)) {
                $successRelation = false;
            }
        }
        return $successRelation;
    }

    /**
     * Получение данных выгрузки
     *
     * @return mixed
     */
    public function getData()
    {
        try{
            $stmt = (new Statement());
            $records = $stmt->process($this->csvReader);
            foreach ($records as $record) {
                foreach ($record as $key => $value) {
                    $keys = explode(';', $key);
                    $values = explode(';', $value);
                    $preResult = array_combine($keys, $values);
                    $fields = array_flip($this->fields);
                    foreach ($fields as $fieldsKey => $fieldsValue){
                        $subResult[$fieldsValue] = $preResult[$fieldsKey];
                    }
                    $result[] = $subResult;
                }
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
