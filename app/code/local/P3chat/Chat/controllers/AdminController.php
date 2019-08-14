<?php
class P3chat_Chat_AdminController extends Mage_Adminhtml_Controller_Action
{
    public function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('chat/accountconfig');
        return $this;
    }

    public function accountconfigAction()
    {
        $this->loadLayout()
            ->_addContent($this->getLayout()->createBlock('chat/accountconfig'))
            ->renderLayout();
    }

    public function indexAction()
    {
        accountconfigAction();
    }
}
