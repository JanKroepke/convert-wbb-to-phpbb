<?php

$wbbUserToGroups    = $wbbDb->query("SELECT ug.*,leaderUserID FROM wcf{$wbbMySQLConnection['wbbNum']}_user_to_groups ug
    LEFT JOIN wcf{$wbbMySQLConnection['wbbNum']}_group_leader gl
        ON userID = leaderUserID AND ug.groupID = gl.groupID
    WHERE ug.groupID > 6;");

while($wbbUserToGroup = $wbbUserToGroups->fetch_assoc())
{
    $phpBBUserToGroup = array(
        'group_id'     => $wbbUserToGroup['groupID'],
        'user_id'      => $wbbUserToGroup['userID'],
        'group_leader' => $wbbUserToGroup['userID'] == $wbbUserToGroup['leaderUserID'],
        'user_pending' => 0
    );

    insertData("user_group", $phpBBUserToGroup);
}

$wbbUserToGroups->close();