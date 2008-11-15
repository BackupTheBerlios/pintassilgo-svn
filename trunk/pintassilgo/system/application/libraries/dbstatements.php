<?php

class Dbstatements {
    var $ps_add_friends = 'update users set friends = ? where ID = ?';
    var $ps_consult_friends = 'select friends from users where ID = ?';
}

?>
