<?php
class P3chat_Chat_Model_Resource_Department extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('chat/department', 'id');
    }
}