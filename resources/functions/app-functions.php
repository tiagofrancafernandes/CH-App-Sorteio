<?php

if (!function_exists('is_a_date')) {
    /**
     * function is_a_date
     *
     * @param mixed $value
     * @return bool
     */
    function is_a_date(mixed $value): bool
    {
        try {
            if (!$value) {
                return false;
            }

            now()->parse($value);

            return true;
        } catch (Throwable $th) {
            return false;
        }
    }
}

if (!function_exists('try_parse_date')) {
    /**
     * function try_parse_date
     *
     * @param mixed $value
     * @return ?\Illuminate\Support\Carbon
     */
    function try_parse_date(mixed $value): ?Illuminate\Support\Carbon
    {
        try {
            if (!$value) {
                return null;
            }

            return now()->parse($value);
        } catch (Throwable $th) {
            return null;
        }
    }
}

if (!function_exists('try_is_a')) {
    /**
     * function try_is_a
     *
     * @param mixed $objectOrClass
     * @param string $class
     *
     * @return bool
     */
    function try_is_a(mixed $objectOrClass, string $class): bool
    {
        try {
            if (!$objectOrClass || !(is_object($objectOrClass) || is_string($objectOrClass))) {
                return false;
            }

            if (is_object($objectOrClass)) {
                return is_a($objectOrClass, $class, true);
            }

            return class_exists($objectOrClass) && class_exists($class) && is_a($objectOrClass, $class, true);
        } catch (Throwable $th) {
            return false;
        }
    }
}

if (!function_exists('try_route')) {
    /**
     * function try_route
     *
     * Generate the URL to a named route.
     *
     * @param  mixed  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     *
     * @return null|string
     */
    function try_route(
        mixed $name = null,
        mixed $parameters = [],
        bool $absolute = true,
    ): null|string {
        try {
            if (!$name || !is_string($name)) {
                return null;
            }

            return route($name, $parameters, $absolute);
        } catch (Throwable $th) {
            return null;
        }
    }
}

if (!function_exists('long_microtime')) {
    /**
     * function long_microtime
     *
     * @param bool $toFloat
     *
     * @return string|float
     */
    function long_microtime(bool $toFloat = false): string|float
    {
        $value = implode(
            '.',
            array_map(fn ($item) => ltrim($item, '0.'), array_reverse(explode(' ', microtime($toFloat) . '')))
        );

        return $toFloat ? floatval($value) : $value;
    }
}
