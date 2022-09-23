<?php
namespace AHT\BrandProducts\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function __construct(
        \Magento\Catalog\Model\ProductRepository $productRepo
      ) {
        $this->_productRepo = $productRepo;
        }
      
      
      /**
       * Load product from productId
       *
       * @param $id
       * @return $this
       */
      public function getProductById($id)
      {
        return $this->_productRepo->getById($id);
      }
}
