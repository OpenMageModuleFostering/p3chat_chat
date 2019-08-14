<?php
class P3chat_Chat_Model_Resource_Department_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('chat/department');
    }
}