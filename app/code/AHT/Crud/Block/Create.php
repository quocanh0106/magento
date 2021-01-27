<?php


namespace AHT\Crud\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Create extends Template
{
    /**
     * Constructor
     *
     * @param Context $context
     *
     */
    public function __construct(
        Context $context)
    {
        parent::__construct($context);
    }

}
