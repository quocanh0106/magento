<?php

namespace AHT\Crud\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Crud\Model\Post', 'AHT\Crud\Model\ResourceModel\Post');
    }

}
