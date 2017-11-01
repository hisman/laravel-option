<?php

if (! function_exists('option')) {
    /**
     * Get the specified option value.
     *
     * If $name is null, it will return the Option object instead.
     *
     * @param  string $name
     * @param  mixed  $default
     * @return mixed
     */
    function option($name = null, $default = null)
    {
        if (is_null($name)) {
            return app('option');
        }

        return app('option')->get($name, $default);
    }
}
