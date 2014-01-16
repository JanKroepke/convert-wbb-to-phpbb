<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 15.01.14
 * Time: 23:21
 */

$wbbPolls    = $wbbDb->query("SELECT wcfp.*, wbbp.threadID, wbbt.firstPostID
    FROM wcf{$wbbMySQLConnection['wbbNum']}_poll wcfp
    INNER JOIN wbb{$wbbMySQLConnection['wbbNum']}_1_post wbbp ON wcfp.messageID = wbbp.postID
    INNER JOIN wbb{$wbbMySQLConnection['wbbNum']}_1_thread wbbt ON wbbp.postID = wbbt.firstPostID
    WHERE wcpf.messageType = 'post';");

while($wbbPoll = $wbbPolls->fetch_assoc())
{
    $phpBBPoll = array(
        'poll_title'            => $wbbPoll['question'],
        'poll_start'            => $wbbPoll['time'],
        'poll_length'           => $wbbPoll['endTime'] - $wbbPoll['time'],
        'poll_max_options'      => $wbbPoll['choiceCount'],
        'poll_last_vote'        => 0,
        'poll_vote_change'      => ($wbbPoll['votesNotChangeable'] == 0 ? 1 : 0),
    );
    updateData('topics', $phpBBPoll, "topic_id = '".$wbbPoll['threadID']."'");

}