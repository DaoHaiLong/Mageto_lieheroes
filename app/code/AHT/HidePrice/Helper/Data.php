<?php
/**
 * Copyright © HidePrice All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AHT\HidePrice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }
    public function getIsEnable(){
        return $this->scopeConfig->getValue('aht_hideprice/general/enable', 
                                            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getWordingHidePrice(){
        return $this->scopeConfig->getValue('aht_hideprice/general/wording_hide_price', 
                                            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}