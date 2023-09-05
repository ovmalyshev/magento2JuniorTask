<?php

namespace Task\QuickOrder\Model\ResourceModel\QuickOrders;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Task\QuickOrder\Model\QuickOrders as Model;
use Task\QuickOrder\Model\ResourceModel\QuickOrders as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'quick_orders_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
