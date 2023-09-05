<?php
namespace Task\QuickOrder\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Orders extends Container
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_orders';
        $this->_blockGroup = 'Task_QuickOrder';
        $this->_headerText = __('Manage Orders');
        $this->_addButtonLabel = __('Add New Post');

        parent::_construct();
    }
}
