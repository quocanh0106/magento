<?php


namespace AHT\Crud\Controller\Post;

use Magento\Framework\App\Action\Action;

use Magento\Framework\App\Action\Context;
use AHT\Crud\Model\PostFactory;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Cache\Frontend\Pool;

class Save extends Action
{
    protected $_postFactory;

    protected $resultRedirect;

    private $_cacheTypeList;
    private $_cacheFrontendPool;


    public function __construct(
        Context $context,
        PostFactory $postFactory,
        TypeListInterface $cacheTypeList,
        Pool $cacheFrontendPool
    )
    {
        $this->_postFactory = $postFactory;
        $this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;

        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_postFactory->create();

        /* Create */
        if (isset($_POST['createbtn'])) {
            $post->setName($_POST['name']);
            $post->setCreatedAt(date('Y-m-d H:i:s'));
            $post->setUpdatedAt(date('Y-m-d H:i:s'));
        } /* Edit */
        elseif (isset($_POST['editbtn'])) {
            $post->setId($_POST['editbtn']);
            $post->setName($_POST['name']);
            $post->setUpdatedAt(date('Y-m-d H:i:s'));
        }

        $post->save();

        /* clean cache ?? */
        $types = ['config', 'layout', 'block_html', 'collections', 'reflection', 'db_ddl', 'compiled_config', 'eav', 'config_integration', 'config_integration_api', 'full_page', 'translate', 'config_webservice', 'vertex'];
        foreach ($types as $type) {
            $this->_cacheTypeList->cleanType($type);
        }
        foreach ($this->_cacheFrontendPool as $cacheFrontend) {
            $cacheFrontend->getBackend()->clean();
        }

        /* Redirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('crud/post/index');
        return $resultRedirect;
    }


}
