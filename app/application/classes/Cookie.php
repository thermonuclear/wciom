<?php defined('SYSPATH') OR die('No direct script access.');

class Cookie extends Kohana_Cookie
{
    /**
     * Generates a salt string for a cookie based on the name and value.
     * Без user-agent, так как его смена приводит к удалению предыдущего значения куки и, соответственно, сбросу сессии.
     *
     *     $salt = Cookie::salt('theme', 'red');
     *
     * @param  string  $name  name of cookie
     * @param  string  $value  value of cookie
     * @return  string
     */
    public static function salt($name, $value)
    {
        // Require a valid salt
        if (!Cookie::$salt) {
            throw new Kohana_Exception('A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation');
        }

        return sha1($name.$value.Cookie::$salt);
        // на obr и на sgo делается так
        // return hash_hmac('sha1', $name.$value.Cookie::$salt, Cookie::$salt);
    }
}
