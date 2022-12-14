<?php
namespace AHT\HidePrice\Pricing\Render;
use Magento\Catalog\Pricing\Price;
use Magento\Framework\Pricing\Render;
use Magento\Framework\Pricing\Render\PriceBox as BasePriceBox;
use Magento\Msrp\Pricing\Price\MsrpPrice;
use AHT\HidePrice\Helper\Data as Helper;

class FinalPriceBox extends \Magento\Catalog\Pricing\Render\FinalPriceBox
{
    protected $_helper;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Pricing\SaleableInterface $saleableItem,
        \Magento\Framework\Pricing\Price\PriceInterface $price,
        \Magento\Framework\Pricing\Render\RendererPool $rendererPool,
        array $data = [],
        \Magento\Catalog\Model\Product\Pricing\Renderer\SalableResolverInterface $salableResolver = null,
        \Magento\Catalog\Pricing\Price\MinimalPriceCalculatorInterface $minimalPriceCalculator = null,
        Helper $helper
    )
    {
        parent::__construct($context, 
        $saleableItem, 
        $price, 
        $rendererPool, 
        $data, 
        $salableResolver, 
        $minimalPriceCalculator);

        $this->_helper = $helper;
    }
    protected function wrapResult($html)
    {
        $status = $this->_helper->getIsEnable();
        if(!$status){
            return '<div class="price-box ' . $this->getData('css_classes') . '" ' .
                    'data-role="priceBox" ' .
                    'data-product-id="' . $this->getSaleableItem()->getId() . '"' .
                    '>' . $html . '</div>';
        }
        
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $httpContext = $objectManager->get('Magento\Framework\App\Http\Context');
        $isLoggedIn = $httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);

        if($isLoggedIn){
            return '<div class="price-box ' . $this->getData('css_classes') . '" ' .
                'data-role="priceBox" ' .
                'data-product-id="' . $this->getSaleableItem()->getId() . '"' .
                '>' . $html . '</div>';
        }else{
            $wording = $this->_helper->getWordingHidePrice();
            return '<div class="" ' .
                'data-role="priceBox" ' .
                'data-product-id="' . $this->getSaleableItem()->getId() . '"' .
                '>'.$wording.'</div>';
        }
    }
}
