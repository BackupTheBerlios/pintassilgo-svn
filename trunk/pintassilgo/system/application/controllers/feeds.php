<?php
class Feeds extends Controller {

    function index() {
        $this->load->database();
        
        $data = $this->db->get("content")->result();
        $this->load->view("feeds_view.php", array('data' => $data));
    }
    
}
?>
