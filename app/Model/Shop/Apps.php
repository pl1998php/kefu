<?php

declare(strict_types=1);


namespace App\Model\Shop;

use Hyperf\Database\Model\SoftDeletes;

class Apps extends ShopBaseModel
{
    use SoftDeletes;

    /**
     * 检查是否是合法app应用
     * @param string $appId
     * @param string $appKey
     * @return bool
     * @author: latent
     * @email: pltrueover@gamil.com
     * @Time: 2023/1/8   20:47
     */
    public static function check( string $appId , string $appKey) :bool
    {
        if(empty($appId) || empty($appKey)) {
            return false;
        }
        if($apps = static::where('app_id',$appId)->first()) {
            if($apps->app_key!=$appKey) return false;
            return  true;
        }
        return false;
    }
}