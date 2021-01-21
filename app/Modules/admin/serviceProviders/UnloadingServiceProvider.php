<?php
namespace App\Modules\admin\serviceProviders;

use App\Modules\admin\services\uploading\CsvUnloadingService;
use App\Modules\admin\services\uploading\UploadInterface;
use App\Modules\admin\services\uploading\XmlUnloadingService;
use Illuminate\Support\ServiceProvider;

/**
 * Сервис выгрузки
 *
 * Class UnloadingServiceProvider
 *
 * @package App\Modules\admin\serviceProviders
 */
class UnloadingServiceProvider extends ServiceProvider
{
    /**
     * Отложенная загрузка
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Регистрация сервиса
     *
     */
    public function register()
    {
       // $this->app->bind(UploadInterface::class,CsvUnloadingService::class);
        $this->app->bind(UploadInterface::class,XmlUnloadingService::class);
    }

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
       // return [CsvUnloadingService::class];
        return [XmlUnloadingService::class];
    }
}
