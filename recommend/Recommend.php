<?php
    /*  
        Recommend modul is part of the recommend system
        it's job is get data provided by Analytical system and Tracker modul to do the recommend misson
        This modull will have three modes for operation but now the first release here is just complete the DBbase
        three mode is:
            logical(default): Recommend system get data about the similarities between products via a matrix inside the an AnalysticalSystem ofject and do the recommend task by this data
            DBbase: the system will get *data from database which is stored by Analytical system modul
            filebase: like DBbase but instead of getting *data in database, this mode will read the *data on files that place on the server directory by the Analytical system modul
     */
    require_once 'ISystem.php';
    require_once 'Analysis.php';
    require_once 'Tracking.php';
    require_once '../model/M_Database.php';


    /*
        define the RecommendSystem class
     */
    class RecommendSystem implements ISystem {
        public Static $recommend_mode = array('DBbase'=>0, 'filebase'=>1, 'logical'=>2);
        private static $recommend_mode_array = array('DBbase', 'filebase', 'logical');

        private $mode;

        // default mode is logical
        public function __construct(string $_mode = 'logical') {
            if (!$this->SetMode($_mode)) {
                $this->SetMode('logical');
            }
        }

        public function SetMode(string $_mode) {
            if (isset(self::$recommend_mode["$_mode"])) {
                $this->mode = self::$recommend_mode["$_mode"];
                return true;
            }
            else {
                return false;
            }
        }

        public function Mode() {
            return self::$recommend_mode_array[intval($this->mode)];
        }

        // this method get the visit list from a Tracker object to prepare for the recommend process 
        private function GetRecommendData(Tracker $_tracker) {
            // the GetVisiList method return the sorted(descending) associative array of visited product of user 
            $tracking_data = $_tracker->GetVisitList();
            echo count($tracking_data);
            $result = array();

            // here just need three or less than most visited product 
            if (count($tracking_data) >= 3) {
                $i = 0;
                foreach($tracking_data as $id => $time) {
                    if ($i < 3) {
                        $result[] = $id;

                        ++$i;
                    }
                    else {
                        break;
                    }
                }
            }
            else {
                foreach($tracking_data as $id => $time) {
                    $result[] = $id;
                }
            }
            //echo 'track'.count($result).'track';
            return $result;
        } 

        // this method start the recommend process according to the operation mode is setted
        public function Recommend() {
            if ($this->mode == self::$recommend_mode['logical']) {
                return $this->RecommendLogicalMode();
            }
            else if ($this->mode == self::$recommend_mode['DBbase']) {
                return $this->RecommendDBbaseMode();
            }
            else if ($this->$mode == self::$recommend_mode['filebase']) {
                return $this->RecommendFilebaseMode();
            }
        }

        // this funciton return a list of recommend products 
        // the list is an associative array that key and value are both the ID of a product
        private function RecommendDBbaseMode() {
            $tracker = new Tracker();
            $recommend_list = $this->GetRecommendData($tracker);
            echo 'list['.count($recommend_list).']';
            $result = array();

            if (count($recommend_list) > 0) {
                // with each 3 most visited product, we will get 6 product for recommend (2 for each most visited product)
                foreach ($recommend_list as $id) {
                    echo '['.$id.']';
                    $db = new Database();
                    $sql = "SELECT * FROM product_similar WHERE product_similar.IDSANPHAM1 = '$id' OR product_similar.IDSANPHAM2 = '$id' ORDER BY product_similar.DISTANCE LIMIT 5";
                    $resource = $db->SelectData($sql);
                    
                    // the first_five most array will hold the most 5 similar product of a most visited product
                    // it's lengh will depend on the data in the database but it's max length is 5
                    $first_five = array();
        
                    //    echo 1;
                    // get 5 most similar to a most visit product 

                    if ($resource->num_rows > 0) {
                        while ($row = $resource->fetch_assoc()) {
                            if ($id == $row['IDSANPHAM1']) {
                                $first_five[] = $row['IDSANPHAM2'];
                            }
                            else {
                                $first_five[] = $row['IDSANPHAM1'];
                            }
                        }

                        // the max number of row of $resource is five 
                        // the $first_five array has length equal to the number of row of $resource
                        // but there is exception for if the the number of row of $resource can be equal to 1
                        if ($resource->num_rows > 1) {
                            // this loop statment will loop 2 time to get 2 product in the first five most similar product array
                            // beacause of this 2-times loop that we must check if the $resource's num_rows > 1
                            for ($j = 0; $j < 2; ++$j) {
                                // here we will get the random index of the first_five most similar product array
                                $random_index = mt_rand(0,$resource->num_rows-1); // type int
                                // this is the id of the product already chosen randomly
                                $ID = $first_five[$random_index];
                                $i = 0;
                                // if the choosen product is not exist in the $result array, push the product to the $result array
                                if (!isset($result["$ID"])) {
                                    echo 'add';   
                                    $result["$ID"] = $ID;
                                }
                                else { // else there 5 chances to rechoose new similar product
                                    for ($i = 0; $i < 5; ++$i) {
                                        $random_index = mt_rand(0,$resource->num_rows -1);
                                        $ID = $first_five[$random_index];

                                        if (!isset($result["$ID"])) {
                                            $result["$ID"] = $ID;
                                            break;
                                        }
                                    }
                                }
                            }
                        }   // this is an exception when the first_five array length is 1
                        else if ($resource->num_rows == 1) {
                            // just has one product
                            $ID = $first_five[0];
                            // if not exist in $result then push in
                            if (!isset($result["$ID"])) {
                                $result["$ID"] = $$ID;
                            }
                        }
                    }
                }
            }
            echo 'ka'.count($result);
            return $result;
        }

        private function RecommendLogicalMode() {

        }

        private function RecommendFilebaseMode() {

        }
    }

    // $rcmd = new RecommendSystem('DBbase');
    // $track = new Tracker();
    // $track->Add(7);
    // echo $rcmd->Mode();

    // $arr = $rcmd->Recommend();
    // echo '<br>';
    // echo 'recommend product (ID): ';
    // foreach($arr as $id) {
    //     echo $id.' ';
    // }
?>