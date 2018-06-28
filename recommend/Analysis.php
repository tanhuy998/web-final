<?php
    /*
        Analysis modul is part of the recommend system
        It's job is collect data in database about products to analyze the similarities between products
        This modull will have three modes for operation but now the first release here is just complete the DBbase and logical mode
        three mode is:
            logical(default): AnalyticalSystem store the similarities between products via a matrix inside the object
            DBbase: not only store the similarities between products via matrix inside object but also store this matrix to database
            filebase: like DBbase but instead of storing *data to database, this mode will store the *data to files that place on the server directory
    */


    require_once 'ISystem.php';
    require_once 'Similarity.php';
    require_once '../model/M_Database.php';
    require_once '../model/M_Product.php';

    //echo class_exists('System')? 1: 0;

    function AddPairDistance_DB($id1, $id2, $distance) {
        $db = new database();

        $sql = "INSERT INTO product_similar(IDSANPHAM1,IDSANPHAM2,DISTANCE) VALUES('$id1','$id2','$distance')";

        return $db->InsertData($sql);
    }


    /*
        define a Analytical System that calculate distance between two product throughout all product
    */
    class AnalyticalSystem implements ISystem {
        private static $analize_mode_array = array('DBbase', 'filebase', 'logical');
        public static $analize_mode = array('DBbase'=>0,'filebase'=>1,'logical'=>2);

        private $distance_matrix;
        private $productID_array;
        private $mode;

        public function __construct(string $_mode = 'logical') {
            $this->distance_matrix = array();
            $this->productID_array = array();

            if (!$this->SetMode($_mode)) {
                $this->SetMode('logical');
            }
        }

        // method to calculate the distance of two product
        // the less distance returned means the more similar in two product
        private static function Distance($id1, $id2) {

            $product1 = new ProductProperty($id1);
            $product2 = new ProductProperty($id2);

            // each normal property will gains 1 distance
            // primary property gains 4 distance
            // now a single product just has one primary property
            // so the formula is sum of two product properties + 6
            $totalDistance = $product1->Count() + $product2->Count() + 6;

            // check primary property first
            // if two product has the same primary property then substract $totalDistance by 8 (each gains 4)
            // because each primary key of two product gain 4 distance on total distance
            if ($product1->PrimaryProperty() === $product2->PrimaryProperty()) {
                $totalDistance -= 8;
            }

            // next, we check for normal property
            // we just only need to get all properties of one product
            // then check for a specified property in a product is exist in the other
            // if exist the total distance will substract by 2 (each property gains 1)
            $product1_properties = $product1->Properties();
            // the Properties method return list of a product properties
            foreach($product1_properties as $current_pr) {

                if ($current_pr != $product1->PrimaryProperty()) {

                    if ($product2->ExistProperty($current_pr)) {
                        $totalDistance -= 2;
                    }
                }
            }

            return $totalDistance;
        }

        /*
            method to start analyzing
            this method just only need to call when a new AnalyticalSystem object's created
            *NOTICE: before Analyzing, method will truncate the product_similar table in database
        */
        public function Start() {
            
            // delete all record in Product_similar table to make new recommend result
            $db = new Database();
            $sql = 'TRUNCATE TABLE product_similar';
            $db->DeleteData($sql);
            //******************************************************** */
            // clear distance matrix and ProductID_array
            if (isset($this->distance_matrix)) {
                unset($this->distance_matrix);

                $this->distance_matrix = array();
            }
            if (isset($this->productID_array)) {
                unset($this->productID_array);

                $this->productID_array = array();
            }
            //********************************************************  */
            
            //*****************Code start here************************ */
            $prd = new Product();
            $product_resource = $prd->SelectAllProduct();

            //$productsIDList = array();

            if ($product_resource->num_rows > 0) {
                while ($row = $product_resource->fetch_assoc()) {
                    // productIDList array just need to store ID of all products
                    $this->productID_array[] = $row['ID'];
                }
            }

            // to free memory
            unset($product_resource);
            $count = count($this->productID_array);

            // set empty value for distance matrix
            for ($i = 0; $i < $count; ++$i) {
                $this->distance_matrix[] = array();
                for ($j = 0; $j < $count; ++$j) {
                    $this->distance_matrix[$i][] = 0;
                }
            }

            for ($i = 0; $i < $count; ++$i) {
                for ($j = $i; $j < $count; ++$j) {

                    if ($i == $j) {
                        continue;
                    }
                    else {
                        $id_1 = $this->productID_array[$i];
                        $id_2 = $this->productID_array[$j];

                        $distance = self::Distance($id_1, $id_2);

                        $this->distance_matrix[$i][$j] = $distance;
                        $this->distance_matrix[$j][$i] = $distance;

                        //echo ($this->mode == self::$analize_mode['DBbase'])? 1 : 0;
                        //echo parent::$MODE[$this->mode];
                        if ($this->mode == self::$analize_mode['DBbase']) {
                            AddPairDistance_DB($id_1, $id_2, $distance);
                        }
                    }
                }
            }
        }

        public function Mode() {
            return self::$analize_mode_array[intval($this->mode)];
            //return $MODE_array[$this->mode];
        }

        public function SetMode(string $_mode) {
            //echo parent::$MODE["$_mode"];
            if (isset(self::$analize_mode["$_mode"])) {
                //echo 2;
                $this->mode = self::$analize_mode["$_mode"];
                //$this->mode = $MODE_array["$_mode"];
                return true;
            }
            else {
                return false;
            }
        }

        public function ProductSimilarMatrix() {
            return $this->distance_matrix;
        }

        public function IDList() {
            return $this->productID_array;
        }
    }


    // $a = new AnalyticalSystem('DBbase');
    // $a->start();

    // $array = $a->ProductSimilarMatrix();
    // echo $a->Mode();
    //  echo '<br><br>';
    // for ($i = 0; $i < count($array); ++$i) {
    //     for ($j = 0; $j < count($array); ++$j) {
    //         echo $array[$i][$j];
    //         echo ' ';
    //     }
    //     echo '<br>';
    // }
?>