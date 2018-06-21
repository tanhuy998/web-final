<?php
    /*
        this modul is part of the recommend system
        the main task of this modul is colect, cleans and classify the data of products for Analytical modul
    */
    require_once '../model/M_Product.php';

    /* 
        ProductProperty class specifies all properties of a single product 
        analytic machine will evaluate similarities of products through this class 
    */
    class ProductProperty {
        // static arr primary_tag use to hold the primary property of product for whole class to refer
        private static $primary_tag = array('quần'=>4, 'áo'=>4, 'giày'=>4);
        /*
            numeric array use for store all products tag's name
            associative array use for store tag's name as a key to check if the tag exists in this product
        */
        private $properties_array;
        private $properties_assoc;
        private $primaryTag;
        private $id;

        public function __construct($_id) {
            $this->properties_array = array();
            $this->properties_assoc = array();
            $this->id = $_id; 

            $prd = new Product();
            $tag_resource = $prd->SelectProductTagByProductID($_id);

            if ($tag_resource->num_rows > 0) {
                while ($row = $tag_resource->fetch_assoc()) {
                    $tagName = $row['TENTAG'];

                    // if $tagName key is set on primary_tag array 
                    // => $tagname is primary property of current product 
                    if (isset(self::$primary_tag[$tagName])) {
                        $this->primaryTag = $tagName;
                    }

                    $this->properties_array[] = $tagName;
                    // set true just because boolean is the cheapest type :v
                    $this->properties_assoc[$tagName] = true;
                }
            }
        }

        // get primary tag method
        public function PrimaryProperty() {
            return $this->primaryTag;
        }

        public function ID() {
            return $this->id;
        }

        public function Set_ID($_id) {
            //unset all old properties array
            unset($this->properties_array);
            unset($this->properties_assoc);
            $this->id = $_id;

            // set for new product 
            $this->properties_array = array();
            $this->properties_assoc = array();

            $prd = new Product();
            $tag_resource = $prd->SelectProductTagByProductID($_id);

            if ($tag_resource->num_rows > 0) {
                while ($row = $tag_resource->fetch_assoc()) {
                    $tagName = $row['TENTAG'];

                    // if $tagName key is set on primary_tag array 
                    // => $tagname is primary property of current product 
                    if (isset(self::$primary_tag[$tagName])) {
                        $this->primaryTag = $tagName;
                    }

                    $this->properties_array[] = $tagName;
                    // set true just because boolean is the cheapest type :v
                    $this->properties_assoc[$tagName] = true;
                }
            }
        }

        // check for existence of product's single property
        // return true if product has the specified property and false for the rest
        public function ExistProperty(string $_property) {
            return (isset($this->properties_assoc["$_property"]));
        }

        // get all properties of product method
        // return a list of property as an numeric array
        public function Properties() {
            return $this->properties_array;
        }

        public function Count() {
            return count($this->properties_array);
        }
    }
?>