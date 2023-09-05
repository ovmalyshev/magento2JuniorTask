<?php

namespace Task\QuickOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class QuickOrders extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'quick_orders_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('quick_orders', 'id');
        $this->_useIsObjectNew = true;
    }
}
