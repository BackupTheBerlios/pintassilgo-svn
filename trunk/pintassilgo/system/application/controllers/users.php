<?php
class Users extends Controller {
	
	function index()
	{
		$data['title'] 		= "Pintassilgo";
		$data['heading'] 	= "Pintassilgo - Ver users";
		
		$this->load->database();
		$query = $this->db->query('SELECT * FROM `users`');
		
		$data['dados'] = $query->result_array() ;
		
		$this->load->library('pagination');

		$config['base_url'] = 'index.php/users/';
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = '1';

		$this->pagination->initialize($config); 

		$data['pagination'] = $this->pagination->create_links();
		$this->load->helper('html');
		$this->load->view('users_all', $data);
	}
	
	function new_user()
	{
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
		/* necessita de sistema de permissões, verificação de existencia de id, de id eliminado, etc. */
		
		if(is_numeric($id))
		{
			$this->load->database();
			$this->db->query('DELETE FROM `users` WHERE `ID` = "'.$id.'" LIMIT 1');
			echo "Utilizador removido com sucesso.";
		}
		else
			echo "Tipo de dados inválido";
	}

}
?>
