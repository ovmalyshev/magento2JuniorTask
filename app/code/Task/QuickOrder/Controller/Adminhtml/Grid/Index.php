<?php

namespace Task\QuickOrder\Controller\Adminhtml\Grid;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    /**
     * @var \Magento\Backend\App\Action\Context
     */
    private $context;

    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Backend\App\Action\Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->context = $context;
        parent::__construct($context);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Task_QuickOrder::menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Quick orders'));
        return $resultPage;
    }

    /**
     * @return mixed
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Task_QuickOrder::menu');
    }
}
