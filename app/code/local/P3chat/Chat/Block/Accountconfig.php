<?php
define('P3CHAT_BASE_URL', "http://www.p3chat.com");
define('P3CHAT_SIGNUP_URL', P3CHAT_BASE_URL . "/signup");
define('P3CHAT_SIGNIN_URL', P3CHAT_BASE_URL . "/signin");
define('P3CHAT_DEPARTMENT_URL', P3CHAT_BASE_URL . "/my/departments/show");
define('UID_EXAMPLE_IMG_URL', "widget_code.png");
define('YOUTUBE_VIDEO_URL', "http://www.youtube.com/watch?v=9AGoGgRguT8&feature=plcp");
class P3chat_Chat_Block_Accountconfig extends Mage_Core_Block_Template
{
    protected function _toHtml()
    {
        $department = Mage::getModel('chat/department');
        $department->load(1);
        $html = "";
        if ($this->getRequest()->getParam('p3chat_uid') != "") {
            $department->setUid($this->getRequest()->getParam('p3chat_uid'));
            $department->save();
            $html .= "<h2 style='color: green;'>Changes have been saved.</h2><br/>";
        }
        $uid = $department->getUid();
        $action = $this->curpageurl();
        $html .= '<div style="font-size: 1.2em;">
        <h4>Below are few simple steps to add <a href="' . P3CHAT_BASE_URL . '" target="_blank">P3chat</a> live chat widget to your shop:</h4>
		<ol style="list-style:decimal;">
			<li style="margin-bottom:16px">
				<a href="' . P3CHAT_SIGNUP_URL . '" target="_blank">Sign Up for P3chat</a> if you didn\'t yet or <a href="' . P3CHAT_SIGNIN_URL . '" target="_blank">Sign In</a>.<br/>
				<span>Additionally, we suggest you to watch this useful <a href="' . YOUTUBE_VIDEO_URL . '" target="_blank">video</a> about initial P3chat configuration.</span>
			</li>
			<li style="margin-bottom:16px">
				Copy <em>Department UID</em> from Widget HTML Code section of <a href="' . P3CHAT_DEPARTMENT_URL . '" target="_blank">P3chat Dashboard</a>.<br/>
				<img src="' . $this->getSkinUrl('images/p3chat/' . UID_EXAMPLE_IMG_URL) . '" alt="widget code"/><br/>
				<span>In this example it is equal to <code>1301222674</code>, but you will have something different.</span>
			<li style="margin-bottom:16px">
				<form method="get" action="' . $action . '">
					<label><b>Enter your P3chat Department UID here and press Save: </b>
						<input type="text" name="p3chat_uid" value="' . $uid . '"/>&nbsp;<input type="submit" value="Save"/>
					</label>
				</form>
			</li>
			<li style="margin-bottom:16px">
				Well done! Chat Widget button should appear in your User Area now.<br/>
				<span>In case you have some questions, please don\'t hesitate to email us: <a href="mailto:support@p3chat.com">support@p3chat.com</a></span><br/>
				<span>or directly ask consultant on <a href="' . P3CHAT_BASE_URL . '" target="_blank">p3chat.com</a></span>
			</li>
        </ol>';
        return $html;
    }

    private function curPageURL()
    {
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }

        $pageURL = preg_replace("/\?.*$/", "", $pageURL);

        return $pageURL;
    }
}
