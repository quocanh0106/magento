<?php


namespace AHT\Crud\Controller\Post;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Create extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct(
            $context
        );
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Saves the blog id to the register and renders the page
     * @return Page
     * @throws LocalizedException
     */
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;

    }

    public function createPost(){
        return $var = $this->getRequest()->getParams();
    }
}
