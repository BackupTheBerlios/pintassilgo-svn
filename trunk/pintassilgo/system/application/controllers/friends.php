<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Friends
 *
 * @author bruno
 */
class Friends extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('dbstatements');
    }

    function index() {
        $this->load->view("friends");
    }

    function add_friend($user, $friend_id) {

        if ( $user == $friend_id ) {
            $this->index();
        }

        $result = $this->db->query($this->dbstatements->ps_consult_friends, array($user));

        $users = $result->row();

        // Maybe it would be a good idea to add a friend to the list
        // and sort that list before inserting to DB
        $this->db->query($this->dbstatements->ps_add_friends, array($user, $users.';'.$friend_id));

    }

    function remove_friend($user, $friend_id) {
        if ( $user == $friend_id ) {
            $this->index();
        }

        $result = $this->db->query($this->dbstatements->ps_consult_friends, array($user));

        $users = $result->row();

        $users = split(";",$users);
    }
}
?>
