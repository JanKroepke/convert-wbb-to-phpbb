<?php


// MySQL Connection to the old Woltlab Buring Board
// MySQl Settings on wcf/config.inc.php; wbbNum on ./config.inc.php
$wbbMySQLConnection = array(
    'host'        => 'localhost',
    'user'        => 'root',
    'password'    => '',
    'database'    => 'wbb',
    'wbbNum'      => '1',
    'wcfNum'      => '1',
);

// MySQL Connection to the new phpBB
$phpBBMySQLConnection = array(
    'host'        => 'localhost',
    'user'        => 'root',
    'password'    => '',
    'database'    => 'phpbb',
    'prefix'      => 'phpbb_',
);

$wbbPath    = '/path/to/wbb/';
$phpBBPath  = '/path/to/phpBB3/';