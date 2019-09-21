<?php

namespace Yonna\Validator;

use Closure;
use Yonna\Foundation\Arr;

class ArrayChecker extends AbstractChecker
{

    /**
     * check params is set
     * @param array $data check witch data
     * @param array $keys
     * @param Closure $failCallback
     */
    public static function isSet(array $data, array $keys, Closure $failCallback): void
    {
        if (empty($keys)) return;
        $checker = self::createChecker();
        if (empty($data)) {
            $checker->error('data is empty for check');
        }
        foreach ($keys as $k) {
            if (Arr::get($data, $k, 'unset') === 'unset') {
                $checker->error("{$k} unset");
            }
        }
        $checker->callback($failCallback);
    }

    /**
     * check params is empty
     * @param array $data check witch data
     * @param array $keys
     * @param Closure $failCallback
     */
    public static function isEmpty(array $data, array $keys, Closure $failCallback): void
    {
        if (empty($keys)) return;
        $checker = self::createChecker();
        if (empty($data)) {
            $checker->error('data is empty for check');
        }
        foreach ($keys as $k) {
            if (!Arr::get($data, $k)) {
                $checker->error("{$k} is empty");
            }
        }
        $checker->callback($failCallback);
    }

    /**
     * check params is numeric
     * @param array $data check witch data
     * @param array $keys
     * @param Closure $failCallback
     */
    public static function isNumeric(array $data, array $keys, Closure $failCallback): void
    {
        if (empty($keys)) return;
        $checker = self::createChecker();
        if (empty($data)) {
            $checker->error('data is empty for check');
        }
        foreach ($keys as $k) {
            if (!is_numeric(Arr::get($data, $k))) {
                $checker->error("{$k} is not a numeric");
            }
        }
        $checker->callback($failCallback);
    }

    /**
     * check params is numeric
     * @param array $data check witch data
     * @param array $keys
     * @param Closure $failCallback
     */
    public static function isArray(array $data, array $keys, Closure $failCallback): void
    {
        if (empty($keys)) return;
        $checker = self::createChecker();
        if (empty($data)) {
            $checker->error('data is empty for check');
        }
        foreach ($keys as $k) {
            if (!is_array(Arr::get($data, $k))) {
                $checker->error("{$k} is not a array");
            }
        }
        $checker->callback($failCallback);
    }

}