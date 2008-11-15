<?php

class Dbstatements {
    var $ps_add_friends = 'UPDATE users SET friends = ? WHERE id = ?';
    var $ps_consult_friends = 'SELECT friends FROM users WHERE id = ?';
    var $ps_get_feed_body = 'SELECT body FROM content WHERE id = ?';
    var $ps_get_by_userid = 'SELECT * FROM `users` WHERE `ID` = ? AND `active` = 1 LIMIT 1';
    var $ps_get_feed_by_userid = 'SELECT * FROM `feed` WHERE `user_id` = ?';
    var $ps_update_rem_user = 'UPDATE `users` SET `active` = "0" WHERE `ID` = ? AND `active` = "1" LIMIT 1';
    var $ps_insert_feed = 'INSERT INTO feed(url, description, user_id, source_name) VALUES (?, ?, ?, ?)';
    var $ps_insert_newuser = 'INSERT INTO `pintassilgo` (`ID`, `nick`, `password`, `mail`, `url`, `data_nasc`, `areas`) VALUES (NULL, ?, ?, ?, ?, ?, ?)';
}
?>
