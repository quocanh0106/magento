<?php

namespace AHT\Crud\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'aht_crud_post';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Crud\Model\ResourceModel\Post');
    }
}
