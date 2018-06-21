<?php
    /*
        Tracker modul is a part of the recommend system 
        It's job is gathering data of user such as  the product and it's time that product is visited by the user
        The data will be store inside the the Track object and alsway be update to cookie on client during the time user visits website
     */


    class Tracker {
        // the visit_list array is associative array with key is the id of product and value is the time that user visit that product
        private $visit_list;

        public function __construct() {
            $this->visit_list = array();

            if (isset($_COOKIE['track'])) {
                // the cookie named "track" has value like 5-3,1-1,2-3
                $track_string = $_COOKIE['track'];

                // explode the the track cookie with delimiter ','
                $track_list = explode(',',$track_string);

                // after explode we have an array that each element has value like 5-3
                foreach ($track_list as $product) {
                    // explode each element again to have each product and time visited of a user
                    $resource = explode('-',$product);

                    $pID = $resource[0];
                    $time = $resource[1];

                    $this->visit_list["$pID"] = $time;
                }
            }
        }

        public function Add(int $id) {
            // check if the product is visited by user
            if (isset($this->visit_list["$id"])) {
                $this->visit_list["$id"]++;
            }
            else {
                $this->visit_list["$id"] = 1;
            }

            $this->PlaceCookie();
        }

        private function PlaceCookie() {
            $i = 0;
            $length = count($this->visit_list);
            // the cookie's value will be place 
            $cookie_value = '';

            foreach ($this->visit_list as $id => $time) {
                if ($i === 0) {
                    $cookie_value = $cookie_value.$id.'-'.$time;
                }
                else {
                    $cookie_value = $cookie_value.','.$id.'-'.$time;
                }
                ++$i;
            }
            // track is name of the user tracking data cookie 
            setcookie('track',$cookie_value,time() + (86400 *4),'/');
        }

        // method return the visit_list after sort by descending order arccording to value
        // the visit_list array is associative array with key is the id of product and value is the time that user visit that product
        public function GetVisitList() {
            arsort($this->visit_list);

            return $this->visit_list;
        }        
    }
?>