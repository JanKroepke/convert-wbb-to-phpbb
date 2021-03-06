<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 17.01.14
 * Time: 00:02
 */

$wbbBoardSubscriptions = $wbbDb->query("SELECT * FROM ".PREFIX_WBB."_board_subscription;");

while($wbbBoardSubscription = $wbbBoardSubscriptions->fetch_assoc())
{
    $phpBBForumsWatch = array(
        'forum_id'      => $wbbBoardSubscription['boardID'],
        'user_id'       => $wbbBoardSubscription['userID'],
        'notify_status' => (int) $wbbBoardSubscription['emails'] == 0
    );

    insertData(FORUMS_WATCH_TABLE, $phpBBForumsWatch);

    output('row');
}

$wbbBoardSubscriptions->close();
output('end');