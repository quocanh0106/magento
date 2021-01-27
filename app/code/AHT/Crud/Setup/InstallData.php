<?php

namespace AHT\Crud\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use AHT\Crud\Model\PostFactory;
class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'name'         => "How to Create SQL Setup Script in Magento 2",
        ];
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
    }
}
