<?php

namespace AHT\Crud\Block;

use AHT\Crud\Model\Post;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use AHT\Crud\Model\ResourceModel\Post\CollectionFactory;

class Index extends Template
{
    /**
     * CollectionFactory
     * @var null|CollectionFactory
     */
    protected $_postCollectionFactory = null;

    /**
     * Constructor
     *
     * @param Context $context
     * @param CollectionFactory $postCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $postCollectionFactory,
        array $data = [])
    {
        $this->_postCollectionFactory = $postCollectionFactory;
        parent::__construct($context, $data);
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    /**
     * @return Post[]
     */
    public function getPosts()
    {
        /** @var PostCollection $postCollection */
        $postCollection = $this->_postCollectionFactory->create();
        $postCollection->addFieldToSelect('*')->load();
        return $postCollection->getItems();
    }

    /**
     * For a given post, returns its url
     * @param Post $post
     * @return string
     */
    public function getPostUrl(
        Post $post
    ) {
        return '/crud/post/edit/id/' . $post->getId();
    }

    public function getDelPostUrl(
        Post $post
    ) {
        return '/crud/post/delete/id/' . $post->getId();
    }

    /**
     * For a given post, returns its url
     * @return string
     */
    public function getCreatePostUrl() {
        return '/crud/post/create';
    }
}
