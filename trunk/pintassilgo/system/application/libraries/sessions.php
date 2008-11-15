<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class sessions {
	function create($email, $password)
	{
		/* verificação segurança */
		$senha = md5($password);
		$this->load->database();
		$query = $this->db->query("SELECT * FROM `users` WHERE `mail` = '$email' AND `password` = '$senha' LIMIT 1");
		
		if($query->num_rows() > 0)
		{
			$_SESSION["login_user"] = $login;
			$_SESSION["password_user"] = $senha;
			
			$query = $this->db->query('SELECT `perms` FROM `users` LIMIT 1');
			$row = $query->row();
			$_SESSION["id_user"] = $row->perms;
			
			return true;
		}
		else
		{
			return false;
		}
	}

	function perms()
	{
		/* verificação dos dados enviados através das sessions */
		
		if (isset($_SESSION["id_user"]) AND isset($_SESSION["password_user"]) AND isset($_SESSION["login_user"])) {
			$id = $_SESSION["id_user"];
			$login = $_SESSION["login_user"];
			$pass = $_SESSION["password_user"];
			
			$this->load->database();
			$query = $this->db->query("SELECT * FROM `users` WHERE `ID` = '$id' AND `nick` = '$login' AND `password` = '$pass' LIMIT 1");
			
			foreach($query->result_array() as $row)
				$level = $row['admin'];
			
			return $level;
		}
		else
			return '2';	
	}



}
?>
