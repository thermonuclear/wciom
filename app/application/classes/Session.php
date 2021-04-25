<?php defined('SYSPATH') OR die('No direct script access.');

abstract class Session extends Kohana_Session
{
    /**
     * очистка данных сессии
     */
    public function clear()
    {
        $this->_data = [];
        return $this;
    }
}
