<?php
class Users extends Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->library('dbstatements');
        $this->load->library('sessions');
    }
	
	function index()
	{
		/* trabalhar paginação */
		
		$data['title'] 		= "Pintassilgo - Agregador de Feeds";
		$data['heading'] 	= "Pintassilgo - Ver users";
		
		$query = $this->db->query('SELECT * FROM `users` WHERE `active` = 1');
		
		$data['dados'] = $query->result_array() ;
		
		$this->load->library('pagination');

		$config['base_url'] = 'index.php/users/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = '20';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->helper('html');
		
		$this->load->view('users_all', $data);
	}
	
	function new_user()
	{
		/* fazer validações de segurança */
		
		$this->user 		= $_POST['username'];
		$this->nick 		= $_POST['nick'];
		$this->pass1 		= $_POST['pass1'];
		$this->pass2 		= $_POST['pass2'];
		$this->mail 		= $_POST['mail'];
		$this->blog_url 	= $_POST['blog'];
		$this->data_nasc	= $_POST['dia'] ."-".$_POST['mes']."-".$_POST['ano'];
		$this->areas 		= $_POST['areas'];
		$this->data			= date('d-m-Y');
		
		$query = $this->db->query($this->dbstatements->ps_insert_newuser, array($this->nick, $this->pass, $this->mail, $this->blog_url, $this->data_nasc, $this->areas, $this->data));

		$mensagem = "O utilizador ". $this->nick ." foi introduzido com sucesso na base de dados.";
		
		echo $mensagem;
	}
	
	function remove_user($id)
	{

		/* verificação de existencia de id e de id eliminado, etc. */
		
		$perms = $this->sessions->perms();
		if(is_numeric($id) and $perms == 1)
		{
			$this->db->query($this->dbstatements->ps_update_rem_user, array($id));
			echo "Utilizador removido com sucesso.";
		}
		else
			if(!is_numeric($id)) echo "Tipo de dados inválido.";
			else echo "Não tem permissões para realizar essa acção.";
	}

	function perfil($id)
	{
		if(is_numeric($id)) {
			$data['dados_pessoais'] = $this->db->query($this->dbstatements->ps_get_by_userid, array($id))->result_array();
			foreach($data['dados_pessoais'] as $row)
				$nick = $row['nick'];
				
			$data['title'] 		= "Pintassilgo - Agregador de Feeds";
			$data['heading'] 	= "Pintassilgo - Perfil de " . $nick;
			
			$data['dados_feeds'] = $this->db->query($this->dbstatements->ps_get_feed_by_userid, array($id))->result_array();
			
			
			$this->load->view('perfil', $data);
		}
	}
			
			
	

}
?>
