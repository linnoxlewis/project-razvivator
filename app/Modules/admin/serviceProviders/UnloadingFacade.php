<?php

namespace App\Modules\admin\serviceProviders;

use App\Modules\admin\services\uploading\UploadInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Фасад ВЫгрузки
 *
 * Class UnloadingFacade
 *
 * @package App\Modules\admin\serviceProviders
 */
class UnloadingFacade extends Facade
{
    /**
     * Загрузка фасада
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return UploadInterface::class;
    }
}
