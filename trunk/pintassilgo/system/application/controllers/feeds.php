<?php
class Feeds extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('dbstatements');
    }

    function index() {
        $data = $this->db->query('SELECT id, title, summary, content_date, url FROM content')->result();
        $this->load->view("feeds_view", array('data' => $data));
    }

    function more($id) {
        $data = $this->db->query($this->dbstatements->ps_get_feed_body, array($id))->row();
        $this->load->view("feed_body", array('data' => $data));
    }

    function submit() {
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('source_name', 'Título', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');

        $success = FALSE;
        if ($this->form_validation->run() != FALSE) {
            $success = TRUE;
        }
        $this->load->view('submit_feed', array('success' => $success));
    }
}
?>
