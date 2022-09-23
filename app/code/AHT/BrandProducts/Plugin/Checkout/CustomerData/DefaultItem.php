<?php
namespace AHT\BrandProducts\Plugin\Checkout\CustomerData;
use Magento\Quote\Model\Quote\Item;
class DefaultItem
{
    public function aroundGetItemData($subject, \Closure $proceed, Item $item) {
        $data = $proceed($item);
        $_product = $item->getProduct();
        $result = [];
        $result['lie_brand'] = $_product->getResource()->getAttribute('lie_brand')->getFrontend()->getValue($_product);
        return array_merge($data,$result);
    }

}
