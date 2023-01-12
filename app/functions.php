<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
if (!function_exists('passwordHash')) {
    /**
     * 加密方法.
     * @return string
     */
    function passwordHash(string|int $pwd)
    {
        return password_hash((string)$pwd, PASSWORD_DEFAULT);
    }
}

if (!function_exists('getPassword')) {
    /**
     * 加盐方法.
     * @return string
     */
    function getPassword(string|int $pwd)
    {
        return $pwd . '_salt_123';
    }
}

if (!function_exists('array_olay')) {

    /**
     * @param array $array
     * @param array $keys
     * @return array
     */
    function array_olay(array $array, array $keys) :array
    {
        return array_intersect_key($array, array_flip($keys));
    }
}

if (!function_exists('set_params')) {

    /**
     * @param array $array
     * @param string $key
     * @param string $value
     * @return void
     */
    function set_params(array &$array ,string $key,string|null $value=null){
        if(!empty($array[$key])) {
            $array[$key] = is_null($value) ? $array[$key] : $value;
        }else{
            unset($array[$key]);
        }
    }
}
