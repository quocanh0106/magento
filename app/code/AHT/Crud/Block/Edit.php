<?php


namespace AHT\Crud\Block;


use AHT\Crud\Model\Post;
use AHT\Crud\Model\PostFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use AHT\Crud\Controller\Post\Edit as ViewAction;

class Edit extends Template
{
    /**
     * Core registry
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Post
     * @var null|Post
     */
    protected $_post = null;

    /**
     * PostFactory
     * @var null|PostFactory
     */
    protected $_postFactory = null;

    /**
     * Constructor
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PostFactory $postCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PostFactory $postFactory,
        array $data = []
    ) {
        $this->_postFactory = $postFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * Lazy loads the requested post
     * @return Post
     * @throws LocalizedException
     */
    public function getPost()
    {
        if ($this->_post === null) {
            /** @var Post $post */
            $post = $this->_postFactory->create();
            $post->load($this->_getId());

            if (!$post->getId()) {
                throw new LocalizedException(__('Post not found'));
            }

            $this->_post = $post;
        }
        return $this->_post;
    }

    /**
     * Retrieves the post id from the registry
     * @return int
     */
    protected function _getId()
    {
        return (int) $this->_coreRegistry->registry(
            ViewAction::REGISTRY_KEY_ID
        );
    }

}
