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
            $tracking_data = $_tracker->GetVisitList();

            $result = array();
            if (count($tracking_data) >= 3) {
                $i = 0;
                foreach($tracking_data as $id => $time) {
                    if (i < 3) {
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

        private function RecommendDBbaseMode() {
            $db = new Database();

            $tracker = new Tracker();
            $recommend_list = $this->GetRecommendData($tracker);

            $result = array();

            if (count($recommend_list) > 0) {
                foreach ($recommend_list as $id) {

                    $sql = "SELECT * FROM product_similar WHERE product_similar.IDSANPHAM1 = '$id' OR product_similar.IDSANPHAM2 = '$id' ORDER BY product_similar.DISTANCE DESC";
                    $resource = $db->SelectData($sql);

                    if ($resource->num_rows > 0) {
                        echo 1;
                        for ($i = 0; $i<2; ++$i) {
                            $row = $resource->fetch_assoc();

                            if ($id == $row['IDSANPHAM1']) {
                                $result[] = $row['IDSANPHAM2'];
                            }
                            else {
                                $result[] = $row['IDSANPHAM1'];
                            }
                        }
                    }
                }
            }

            return $result;
        }

        private function RecommendLogicalMode() {

        }

        private function RecommendFilebaseMode() {

        }
    }

    // $rcmd = new RecommendSystem('DBbase');
    // $track = new Tracker();
    // $track->Add(1);
    // echo $rcmd->Mode();

    // $arr = $rcmd->Recommend();
    // echo '<br>';
    // foreach($arr as $id) {
    //     echo $id.' ';
    // }
?>