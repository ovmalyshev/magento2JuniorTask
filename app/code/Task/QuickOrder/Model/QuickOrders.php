<?php

namespace Task\QuickOrder\Model;

use Magento\Framework\Model\AbstractModel;
use Task\QuickOrder\Model\ResourceModel\QuickOrders as ResourceModel;

class QuickOrders extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'quick_orders_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
