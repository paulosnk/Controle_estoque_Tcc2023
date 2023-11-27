<?php
require_once '../auth.php';
require_once '../Models/usuario.class.php';

$username  = $_POST['username'];
$email = $_POST['email'];
$idUser = $_POST['username'];
$permissao = $_POST['permissao'];

    if ($username != NULL && $perm == 1 || $idUser == $idUsuario) { 
        
        if (!file_exists($_FILES['arquivo']['name'])) {		
			
			$pt_file =  '../../views/dist/img/'.$_FILES['arquivo']['name'];
			
			if ($pt_file != '../../views/dist/img/'){	
				
				$destino =  '../../views/dist/img/'.$_FILES['arquivo']['name'];				
				$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
				move_uploaded_file($arquivo_tmp, $destino);
				chmod ($destino, 0644);	

				$nomeimagem =  'dist/img/'.$_FILES['arquivo']['name'];
				
			}else
							
			
				$nomeimagem = 'dist/img/avatar.png';

			}
    
if(isset($_POST['idUser']) != NULL){
	if($perm == 1){
		$usuario->UpdateUser($_POST['idUser'], $username, $email, $nomeimagem, $permissao);
	}else{
		$usuario->UpdateUser($_POST['idUser'], $username, $email, $nomeimagem);
	}
}else{
	$password = md5($_POST['password']);
    $usuario->InsertUser($username, $email, $password, $nomeimagem, $permissao);

}
    
}