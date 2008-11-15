<?php

class Dbstatements {
    var $ps_add_friends = 'UPDATE users SET friends = ? WHERE id = ?';
    var $ps_consult_friends = 'SELECT friends FROM users WHERE id = ?';
    var $ps_get_feed_body = 'SELECT body FROM content WHERE id = ?';
}
?>
