<?php

namespace Task\QuickOrder\Controller\Index;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\ConfigurableProduct\Model\Product\Type\Configurable;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Task\QuickOrder\Model\QuickOrdersFactory;
use Task\QuickOrder\Model\ResourceModel\QuickOrders;

class Buy extends Action implements HttpPostActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected ProductRepositoryInterface $productRepository;

    /**
     * @var Configurable
     */
    private Configurable $configurable;

    /**
     * @var QuickOrdersFactory
     */
    private QuickOrdersFactory $quickOrdersFactory;
    private QuickOrders $quickOrdersResource;

    /**
     * Buy constructor.
     * @param QuickOrders $quickOrdersResource
     * @param ProductRepositoryInterface $productRepository
     * @param Configurable $configurable
     * @param QuickOrdersFactory $quickOrdersFactory
     * @param Context $context
     */
    public function __construct(
        QuickOrders $quickOrdersResource,
        ProductRepositoryInterface $productRepository,
        Configurable $configurable,
        QuickOrdersFactory $quickOrdersFactory,
        Context $context

    ) {
        $this->quickOrdersResource = $quickOrdersResource;
        $this->productRepository = $productRepository;
        $this->configurable = $configurable;
        $this->quickOrdersFactory = $quickOrdersFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $productId = $data['product'];
        $product = $this->productRepository->getById($productId);
        if (!empty($data['super_attribute'] ?? [])) {
            $product = $this->configurable->getProductByAttributes($data['super_attribute'], $product);
        }
        $sku = $product->getSku();
        $quickOrder = $this->quickOrdersFactory->create();
        $quickOrder->setData('sku', $sku)->setData('phoneNumber', $data['phoneNumber']);
        $this->quickOrdersResource->save($quickOrder);
    }
}
