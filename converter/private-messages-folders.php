<?php

$phpBBFoldersCount = array();

$mysqlFoldersCount = $phpBBDb->query("SELECT folder_id, COUNT(msg_id) as pm_count FROM {$phpBBMySQLConnection['prefix']}privmsgs_to GROUP BY folder_id WHERE folder_id > 0;");

if($mysqlFoldersCount->num_rows > 0)
{
    while($folder = $mysqlFoldersCount->fetch_assoc())
    {
        $phpBBFoldersCount[$folder['folder_id']]    = $folder['pm_count'];
    }

    $wbbPmFolders      = $wbbDb->query("SELECT * FROM wcf{$wbbMySQLConnection['wbbNum']}_pm_folder;");

    while($wbbPmFolder = $wbbPmFolders->fetch_assoc())
    {
        $phpBBFolder = array(
            'folder_id'   => $wbbPmFolder['folderID'],
            'user_id'     => $wbbPmFolder['userID'],
            'folder_name' => $phpBBDb->real_escape_string($wbbPmFolder['folderName']),
            'pm_count'    => isset($phpBBFoldersCount[$wbbPmFolder['folderID']]) ? $phpBBFoldersCount[$wbbPmFolder['folderID']] : 0,
        );

        insertData("privmsgs_folder", $phpBBFolder);
        echo '.';
    }

    $wbbPmFolders->close();
}
else
{
    echo '.';
}

$mysqlFoldersCount->close();