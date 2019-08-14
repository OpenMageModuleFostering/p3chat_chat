<?php
class P3chat_Chat_Model_Mysql4_Livechat extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('p3chat/p3chat', 'id');
    }
}
