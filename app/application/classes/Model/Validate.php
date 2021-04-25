<?php defined('SYSPATH') or die('No direct script access.');

class Model_Validate extends Model
{
    public function valid_email($str)
    {
        return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

    public function valid_password($str, $length)
    {
        return ( ! preg_match("/^[a-zA-Z0-9]{" . $length . "}$/", $str)) ? FALSE : TRUE;
    }

    public function alpha($str)
    {
        return ( ! preg_match("/^[\x80-\xFFa-zA-Z]+$/i", $str)) ? FALSE : TRUE;
    }

    public function alpha_numeric($str)
    {
        return ( ! preg_match("/^[\x80-\xFFa-zA-Z0-9]+$/i", $str)) ? FALSE : TRUE;
    }

    public function numeric_dash($str)
    {
        return ( ! preg_match("/^[0-9_-\s]+$/i", $str)) ? FALSE : TRUE;
    }

    public function alpha_dash($str, $utf8 = TRUE)
    {
        if ($utf8 === TRUE)
        {
            $regex = '/^[- \pL\pN_]++$/uD';
        }
        else
        {
            $regex = '/^[-a-z0-9_]++$/iD';
        }

        return (bool) preg_match($regex, $str);
    }

    public function numeric($str): bool
    {
        return (bool)preg_match( '/^[\-+]?[[:digit:]]*\.?[0-9]+$/', $str);

    }

    public function integerSign($str)
    {
        return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
    }

    public function integer($str)
    {
        return (bool) preg_match('/^[0-9]+$/', $str);
    }

    public function xss_clean($str)
    {
        //return $this->CI->security->xss_clean($str);
    }

    public function max_length($str, $val)
    {
        if (preg_match("/[^0-9]/", $val))
        {
            return FALSE;
        }

        if (function_exists('mb_strlen'))
        {
            return (mb_strlen($str) > $val) ? FALSE : TRUE;
        }

        return (strlen($str) > $val) ? FALSE : TRUE;
    }

    public function min_length($str, $val)
    {
        if (preg_match("/[^0-9]/", $val))
        {
            return FALSE;
        }

        if (function_exists('mb_strlen'))
        {
            return (mb_strlen($str) < $val) ? FALSE : TRUE;
        }

        return (strlen($str) < $val) ? FALSE : TRUE;
    }

    public function length($str, $val)
    {
        if (preg_match("/[^0-9]/", $val))
        {
            return FALSE;
        }

        if (function_exists('mb_strlen'))
        {
            return (mb_strlen($str) === $val) ? FALSE : TRUE;
        }

        return (strlen($str) === $val) ? FALSE : TRUE;
    }

    public function required($str)
    {
        if ( ! is_array($str))
        {
            return (trim($str) == '') ? FALSE : TRUE;
        }
        else
        {
            return ( ! empty($str));
        }
    }

    function valid_inn( $inn )
    {
        if ( preg_match('/\D/', $inn) ) return false;

        $inn = (string) $inn;
        $len = strlen($inn);

        if ( $len === 10 )
        {
            return $inn[9] === (string) (((
                        2*$inn[0] + 4*$inn[1] + 10*$inn[2] +
                        3*$inn[3] + 5*$inn[4] +  9*$inn[5] +
                        4*$inn[6] + 6*$inn[7] +  8*$inn[8]
                    ) % 11) % 10);
        }
        elseif ( $len === 12 )
        {
            $num10 = (string) (((
                        7*$inn[0] + 2*$inn[1] + 4*$inn[2] +
                        10*$inn[3] + 3*$inn[4] + 5*$inn[5] +
                        9*$inn[6] + 4*$inn[7] + 6*$inn[8] +
                        8*$inn[9]
                    ) % 11) % 10);

            $num11 = (string) (((
                        3*$inn[0] +  7*$inn[1] + 2*$inn[2] +
                        4*$inn[3] + 10*$inn[4] + 3*$inn[5] +
                        5*$inn[6] +  9*$inn[7] + 4*$inn[8] +
                        6*$inn[9] +  8*$inn[10]
                    ) % 11) % 10);

            return $inn[11] === $num11 && $inn[10] === $num10;
        }

        return false;
    }

}
