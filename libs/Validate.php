<?php
    class C_Validate {
        public static function EmailCheck($string) {
            if (filter_var($string,FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            else {
                return false;
            }
        }

        
    }
?>