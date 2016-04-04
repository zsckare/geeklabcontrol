<?php 
if ($values==null) {
	echo "string";
}else{
	$password=Security::getEncrypt($pass);
	echo $password;
	$pasbd="";
	$type="";
	$name="";
	$base="";
	$id = null;
	foreach ($values as $row) {
		echo "<br> ".$row['user_password']."<br> ";
		$pasbd=$row['user_password'];
		$type=$row['type'];
		$name=$row['user_name'];
		$id = $row['id_user'];
	}

	if ($password==$pasbd) {
		$_SESSION['id']=$id;
		$_SESSION['user']=$name;
		$_SESSION['type']=$type;	
		
		Redirection::go('note');
	}else{
		session_destroy();
		Redirection::go('home');
	}
}

?>