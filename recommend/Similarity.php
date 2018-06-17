<?php
    require_once '../model/M_Product.php';

    /* 
        ProductProperty class specifies all properties of a single product 
        analytic machine will evaluate similarities of products through this class 
    */
    class ProductProperty {
        // static arr primary_tag use to hold the primary property of product for whole class to refer
        private static $primary_tag = array('quần'=>true, 'áo'=>true, 'giày'=>true);
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

                    if (isset(self::$primary_tag["tagName"])) {
                        $this->primaryTag = $tagName;
                    }

                    $this->properties_array[] = $tagName;
                    // set true just because boolean is the cheapest type :v
                    $this->properties_assoc['tag'] = true;
                }
            }
        }

        // get primary tag method
        public function PrimaryProperty() {
            return $this->primaryTag();
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

                    $this->properties_array[] = $tagName;
                    // set true just because boolean is the cheapest type :v
                    $this->properties_assoc['tag'] = true;
                }
            }
        }

        // check for existence of product's single property
        // return true if product has the specified property and false for the rest
        public function ExistProperty($_property) {
            return (isset($this->properties_assoc["$_property"]));
        }

        // get all properties of product method
        // return a list of property as an numeric array
        public function Properties() {
            return $this->property_array;
        }

    }
?>