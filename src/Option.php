<?php

namespace Hisman\Option;

class Option
{
    /**
     * Get option.
     *
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function get($name, $default = false)
    {
        $option = OptionModel::name($name)->first();

        if (!$option) {
            return $default;
        }

        return unserialize($option->value);
    }

    /**
     * Set option.
     *
     * @param string $name
     * @param mixed $value
     * @return boolean
     */
    public function set($name, $value)
    {
        $option = OptionModel::name($name)->first();
        $option = ($option) ? $option : new OptionModel;
        $option->name = $name;
        $option->value = serialize($value);

        return $option->save();
    }
}
