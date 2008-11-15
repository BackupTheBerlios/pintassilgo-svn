<?php
class Feeds extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function index() {
        $data = $this->db->query('SELECT id, title, summary, content_date, url FROM content')->result();
        $this->load->view("feeds_view", array('data' => $data));
    }

    function more($id) {
        $data = $this->db->query('SELECT body FROM content WHERE id = ' . $id)->row();
        $this->load->view("feed_body", array('data' => $data));
    }

}
?>
