<?php


namespace AHT\Crud\Controller\Post;


use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\View\Result\Page;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\Registry;

class Edit extends Action
{
    const REGISTRY_KEY_ID = 'crud_blog_post_id';

    /**
     * Core registry
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     *
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory
    ) {
        parent::__construct(
            $context
        );
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Saves the blog id to the register and renders the page
     * @return Page
     * @throws LocalizedException
     */
    public function execute()
    {
        $this->_coreRegistry->register(self::REGISTRY_KEY_ID, (int) $this->_request->getParam('id'));
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}
