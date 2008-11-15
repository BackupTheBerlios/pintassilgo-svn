<?php
class Users extends Controller {
	
	function index()
	{
		/* trabalhar paginação */
		
		$data['title'] 		= "Pintassilgo - Agregador de Feeds";
		$data['heading'] 	= "Pintassilgo - Ver users";
		
		$this->load->database();
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

		$query = $this->db->query("INSERT INTO `pintassilgo` (`ID`, `nick`, `password`, `mail`, `url`, `data_nasc`, `areas`)
		VALUES (NULL, '".$this->nick."', '".$this->pass."', '".$this->mail."', '".$this->blog_url."', '".$this->data_nasc."', '".$this->areas."', '".$this->data."')");

		$mensagem = "O utilizador ". $this->nick ." foi introduzido com sucesso na base de dados.";
		
		echo $mensagem;
	}
	
	function remove_user($id)
	{

		/* verificação de existencia de id e de id eliminado, etc. */
		$this->load->library('sessions');
		$perms = $this->sessions->perms();
		if(is_numeric($id) and $perms == 2)
		{
			$this->load->database();
			$this->db->query('UPDATE `users` SET `active` = "0" WHERE `ID` = "'.$id.'" AND `active` = 1 LIMIT 1');
			echo "Utilizador removido com sucesso.";
		}
		else
			if(!is_numeric($id)) echo "Tipo de dados inválido.";
			else echo "Não tem permissões para realizar essa acção.";
	}

	function perfil($id)
	{
		if(is_numeric($id)) {
			$this->load->database();
			$query = $this->db->query('SELECT * FROM `users` WHERE `ID` = "'.$id.'" AND `active` = 1 LIMIT 1');
			$data['dados_pessoais'] = $query->result_array();
			$data['title'] 		= "Pintassilgo - Agregador de Feeds";
			
			foreach($data['dados_pessoais'] as $row) $nick = $row['nick'];
			$data['heading'] 	= "Pintassilgo - Perfil de " . $nick;
			
			$query = $this->db->query('SELECT * FROM `feed` WHERE `user_id` = "'.$id.'"');
			
			$data['dados_feeds'] = $query->result_array();
			
			$this->load->view('perfil', $data);
		}
	}
			
			
	

}
?>
