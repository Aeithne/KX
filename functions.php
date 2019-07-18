<?php

    
        try {
            $conn = new PDO('mysql:host=localhost;dbname=kx', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
        }

	(isset($_POST['usuario'])) ? $usuario = $_POST['usuario'] : $usuario = null;
        (isset($_POST['senha'])) ? $senha = $_POST['senha'] : $senha = null;
        (isset($_REQUEST['acao'])) ? $acao = $_REQUEST['acao'] : $acao = NULL;
        (isset($_POST['firstName'])) ? $firstName = $_POST['firstName'] : $firstName = null;
        (isset($_POST['lastName'])) ? $lastName = $_POST['lastName'] : $lastName = null;
        (isset($_POST['email'])) ? $email = $_POST['email'] : $email = null;
        (isset($_POST['username'])) ? $username = $_POST['username'] : $username = null;
        (isset($_POST['pass'])) ? $pass = $_POST['pass'] : $pass = null;
        (isset($_POST['confirmaPassword'])) ? $confirmaPassword = $_POST['confirmaPassword'] : $confirmaPassword = null;
        (isset($_POST['tipo'])) ? $tipo = $_POST['tipo'] : $tipo = null;
        (isset($_POST['country'])) ? $country = $_POST['country'] : $country = null;  
        (isset($_POST['erroCadastro'])) ? $erroCadastro = $_POST['erroCadastro'] : $erroCadastro = null;
		  (isset($_POST['erroLogin'])) ? $erroLogin = $_POST['erroLogin'] : $erroLogin = null;
		  (isset($_POST['mensagem'])) ? $mensagem = $_POST['mensagem'] : $mensagem = null;
		  (isset($_POST['comentario'])) ? $comentario = $_POST['comentario'] : $comentario = null;
		  (isset($_POST['video_id'])) ? $video_id = $_POST['video_id'] : $video_id = null;
		
		
		//echo $acao;

	if($acao == "cadastro"){

		$stmt = $conn->prepare("SELECT * FROM usuario WHERE nomeUsuario = '$username' OR email = '$email' ");
		$stmt->execute();
		$resultado = $stmt->fetchObject();
 		if($resultado){
 			
			$acao = "erro";
			$erro = "Usuário já existe!";
			
		} else {
			$nome = $firstName . " " . $lastName;
			$stmt = $conn->prepare("INSERT INTO usuario (nome, senha, email, nomeUsuario, tipo) VALUES (?, ?, ?, ?, ?)");
			$stmt->bindParam(1, $nome);
			$stmt->bindParam(2, $pass);
			$stmt->bindParam(3, $email);
			$stmt->bindParam(4, $username);
			$stmt->bindParam(5, $tipo);
			$stmt->execute();

			print_r($stmt);

			//if($stmt->columnCount)
			
			$acao = "inicio";
		}
	}
	
	if($acao == "video") {
		$stmt = $conn->prepare("SELECT titulo, url FROM video WHERE video_id = ? OR link = ?");
			$stmt->bindParam(1, $video_id);
			$stmt->bindParam(2, $video_link);
			$stmt->execute();
			
		$resultado = $stmt->fetchObject();
 		if($resultado){
 			$_SESSION['link'] = $resultado->url;
			$_SESSION['titulo'] = $resultado->titulo;
			$comments = $conn->prepare("SELECT mensagem, usuario, datacriacao FROM comentario WHERE video_id = ? ORDER BY datacriacao");
			$comments->bindParam(1, $video_id);
			$comments->execute(); 
			
			$_SESSION['comentarios'] = array();
			while ($res2 = $comments->fetchObject()) {
				$_SESSION['comentarios'][] = array($res2->mensagem, $res2->usuario, $res2->datacriacao);
			}
						
			
		} else {
			
			$acao = "erro";
			$erro = "Vídeo não encontrado!";
		}
		
	}
	
	if($acao == "adicionarcomentario") {
		$stmt = $conn->prepare("INSERT INTO comentario (mensagem, video_id, usuario, datacriacao) VALUES (?, ?, ?, now() )");
			$stmt->bindParam(1, $comentario);
			$stmt->bindParam(2, $video_id);
			$stmt->bindParam(3, $username);
	}

	if($acao == "login"){

		//$sql = ;  
		$query = $conn->prepare("SELECT nome, senha, nomeUsuario FROM usuario WHERE nomeUsuario = '$usuario' AND senha = '$pass' ");
		//$query->bindValue(1, $usuario);
		//$query->bindValue(1, $senha);
		$query->execute();
		//print_r($query);

		$resultado = $query->fetchObject();
 		if($resultado){
			$welcome = $resultado->nome;
			$acao = "inicio"; 
		}else{
			$acao = "erro";
			$erro = "Usuário não encontrado!";
		}

	}

	if($acao == "inicio"){

		header('Location: ./welcome.html');
		$_SESSION['loginUsuario'] = $usuario;
		$_SESSION['nomeUsuario'] = $resultado->nome;
		echo "Bem Vindo, $resultado->nome";
	}
	
	if($acao == "erro"){

		$_SESSION['erro'] = $erro;
	}



