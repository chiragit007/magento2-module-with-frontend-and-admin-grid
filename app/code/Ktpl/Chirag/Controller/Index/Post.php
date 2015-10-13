<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ktpl\Chirag\Controller\Index;

class Post extends \Magento\Framework\App\Action\Action
{
    /**
     * Show Contact Us page
     *
     * @return void
     */
    protected $_objectManager;
    
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\ObjectManagerInterface $objectManager) 
    {
        $this->_objectManager = $objectManager;
        parent::__construct($context);    
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $currenttime = date('Y-m-d H:i:s');
        $model = $this->_objectManager->create('Ktpl\Chirag\Model\Employee');
        $model->setData('e_name', $post['e_name']);
        $model->setData('e_address', $post['e_address']);
        $model->setData('is_active', $post['is_active']);
        $model->setData('created_at', $currenttime);
        $model->save();
        $this->_redirect('myform/index/view');
        $this->messageManager->addSuccess(__('Employee details have been inserted successfully.'));    
    }
}
