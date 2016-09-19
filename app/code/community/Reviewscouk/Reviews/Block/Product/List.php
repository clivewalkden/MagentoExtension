<?php
class Reviewscouk_Reviews_Block_Product_List extends Mage_Catalog_Block_Product_List {

    public function __construct(){
        parent::__construct();
        $this->helper = Mage::helper('reviewshelper');
    }

    /*
     * Hide Magento Default Rating - We dont use this to display rating because it is wrapped in a condition
     */
    function getReviewsSummaryHtml(){
        return '';
    }

    /*
     * Hook into getPriceHtml to Display Rating
     */
    function getPriceHtml($product, $displayMinimalPrice = false, $idSuffix = ''){
        $priceHtml = parent::getPriceHtml($product, $displayMinimalPrice, $idSuffix);

        $ratingSnippet = $this->helper->getRatingSnippet($product);

        return $priceHtml.$ratingSnippet;
    }
}
