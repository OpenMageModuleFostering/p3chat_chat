<?php
class P3chat_Chat_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo "dd";
    }

    public function fooAction()
    {
        echo "foo";
    }

    public function testModelAction()
    {
        $params = $this->getRequest()->getParams();
        $department = Mage::getModel('chat/department');
        echo("Loading the department with an ID of ".$params['id']);
        $department->load($params['id']);
        $data = $department->getOrigData();;
        var_dump($data);
    }

    public function createNewUidAction() {
        $department = Mage::getModel('chat/department');
        $department->setUid('New UID!');
        $department->save();
        echo 'UID with ID ' . $department->getId() . ' created';
    }

    public function editSecondUidAction() {
        $department = Mage::getModel('chat/department');
        $department->load(3);
        $department->setUid("Changed UID!");
        $department->save();
        echo 'UID edited';
    }

    public function deleteLastUidAction() {
        $department = Mage::getModel('chat/department');
        $department->load(5);
        $department->delete();
        echo 'UID removed';
    }

    public function showAllUidsAction() {
        $posts = Mage::getModel('chat/department')->getCollection();
        foreach($posts as $department){
            echo '<h3>'.$department->getUid().'</h3>';
            echo nl2br($department->getId());
        }
    }
}