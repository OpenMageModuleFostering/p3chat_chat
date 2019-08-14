<?php
$installer = $this;
$installer->startSetup();

$installer->run("
   CREATE TABLE IF NOT EXISTS {$this->getTable('p3chat_department')} (
      `id` int(11) NOT NULL auto_increment,
      `uid` varchar(100),
      PRIMARY KEY  (`id`)
   ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO {$this->getTable('p3chat_department')}
(`id`, `uid`) VALUES
(1, NULL);
");


$installer->endSetup();
