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
        $this->_blockGroup = 'Task_QuickOrder';
        $this->_headerText = __('Manage Orders');
        parent::_construct();
        $this->buttonList->remove('add'); //to remove add button
    }
}
