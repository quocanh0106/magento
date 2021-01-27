<?php

namespace AHT\Crud\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use AHT\Crud\Model\PostFactory;
class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $data = [
                'name'         => "Magento 2 Events",
            ];
            $post = $this->_postFactory->create();
            $post->addData($data)->save();
        }
    }
}
