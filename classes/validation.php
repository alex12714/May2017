<?php

class validation {

    var $str;
    var $num;
    var $email;
    var $date;
    var $url;

    function pass($str) {
        $invalid = 0;
        $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$@_-";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function GetValidDate($month, $day, $year) {
        $flg = 0;
        switch ($month) {
            case 2 :
                if (($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)) && $day <= 29) {

                } elseif ($day > 28) {
                    $flg = 1;
                }
                break;
            case 4 : //** APRIL
            case 6 : //** JUNE
            case 9 : //** SEPTEMBER
            case 11 : //** NOVEMBER
                if ($day > 30)
                    $flg = 1;
                break;
        }
        if ($flg == 1) {
            return false;
        } else {
            return true;
        }
    }

    function alphanumsymb($str) {
        $invalid = 0;
        $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$%^&*@()_\-=+{}[]:;.,|/?<>";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function AlphaNumDotUnderscore($str) {
        $invalid = 0;
        $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789._";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function alphanumsymbskype($str) {
        $invalid = 0;
        $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-.,";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function alphasymbspace($str) {
        $invalid = 0;
        $allowed = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function alphanumsymbspace($str) {
        $invalid = 0;
        $allowed = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$%^&*@()_-=+{}[]:;.,|/\?<>";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function alpha($str) {
        $invalid = 0;
        $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function alphaspace($str) {
        $invalid = 0;
        $allowed = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function numericsym($num) {
        $invalid = 0;
        $allowed = "0123456789+-{}[]().";
        for ($i = 0; $i < strlen($num); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($num[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function numericsymspace($num) {
        $invalid = 0;
        $allowed = " 0123456789+-";
        for ($i = 0; $i < strlen($num); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($num[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function numeric($num) {
        $invalid = 0;
        $allowed = "0123456789";
        for ($i = 0; $i < strlen($num); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($num[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return "FALSE";
                break;
                break;
            }
            $invalid = 0;
        }
         return "TRUE";
    }
    function numericrt($num) {
        $invalid = 0;
        $allowed = "0123456789,";
        for ($i = 0; $i < strlen($num); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($num[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function numericdot($num) {
        $invalid = 0;
        $allowed = "0123456789.";
        for ($i = 0; $i < strlen($num); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($num[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function validateemail($email) {
        // echo $email;
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";
        if (eregi($pattern, $email)) {
            //return true;
            return "TRUE";
        } else {
            // return false;
            return "FALSE";
        }
    }

    function alphanumeric($str) {
        $invalid = 0;
        $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function alphanumericspace($str) {
        $invalid = 0;
        $allowed = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function validatedate($date) {
        if (preg_match("/^([0-9]{2})[\/]([0-9]{2})[\/]([0-9]{4})$/", $date, $parts)) {
            if (checkdate($parts[1], $parts[2], $parts[3]))
                return true;
            else
                return false;
        }
        else
            return false;
    }

    function validateurl($url) {
        $pattern = '/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&amp;?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/';

        if (preg_match($pattern, $url))
            return true;
        else
            return false;
    }

    function alphadotspace($str) {
        $invalid = 0;
        $allowed = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function alphadotsymspace($str) {
        $invalid = 0;
        $allowed = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.+#,";
        for ($i = 0; $i < strlen($str); $i++) {
            for ($x = 0; $x < strlen($allowed); $x++) {
                if ($str[$i] == $allowed[$x]) {
                    $invalid++;
                }
            }
            if ($invalid == 0) {
                return false;
                break;
                break;
            }
            $invalid = 0;
        }
        return true;
    }

    function validateemailpmatch($email) {
//        $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

        $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        if (preg_match($pattern, $email)) {
            return true;
        } else {
            return false;
        }
    }

}