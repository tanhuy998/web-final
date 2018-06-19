<?php
    require_once '../model/M_Database.php';

    function hashCode($str) {
        $str = (string)$str;
        $hash = 0;
        $len = strlen($str);
        if ($len == 0 )
            return $hash;
     
        for ($i = 0; $i < $len; $i++) {
            $h = $hash << 5;
            $h -= $hash;
            $h += ord($str[$i]);
            $hash = $h;
            $hash &= 0xFFFFFFFF;
        }
        return $hash;
    }    
?>