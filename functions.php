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
		(isset($_POST['pass2'])) ? $pass2 = $_POST['pass2'] : $pass2 = null;
        (isset($_POST['confirmaPassword'])) ? $confirmaPassword = $_POST['confirmaPassword'] : $confirmaPassword = null;
        (isset($_POST['tipo'])) ? $tipo = $_POST['tipo'] : $tipo = null;
        (isset($_POST['country'])) ? $country = $_POST['country'] : $country = null;  
        (isset($_POST['erroCadastro'])) ? $erroCadastro = $_POST['erroCadastro'] : $erroCadastro = null;
		(isset($_POST['erroLogin'])) ? $erroLogin = $_POST['erroLogin'] : $erroLogin = null;
		(isset($_POST['mensagem'])) ? $mensagem = $_POST['mensagem'] : $mensagem = null;
		
		//echo $acao;
		session_start();

	if($acao == "cadastro"){ 
		if ($pass != $pass2) {
			$acao = "erro";
			$erro = "Senhas não coincidem!";
		} else {
		$stmt = $conn->prepare("SELECT * FROM usuario WHERE nomeUsuario = '$username' OR email = '$email' ");
		$stmt->execute();
		$resultado = $stmt->fetchObject();
 		if($resultado){
			$acao = "erro";
			$erro = "Usuário já existe!";
		} else {
			$nome = $firstName." ".$lastName;
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
	}

	if($acao == "login"){

		$usuarioquery = $conn->prepare("SELECT nomeUsuario FROM usuario WHERE nomeUsuario = '$usuario'");
		$usuarioquery->execute();
		$resultado = $usuarioquery->fetchObject();
		if($resultado){
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
		 } else {
			$acao = "erro";
			$erro = "Senha Incorreta!";
		 } 
		} else {
			$acao = "erro";
			$erro = "Usuário não encontrado!";
		}

	}

	if($acao == "exibir"){
		//$sql = ;  
		$userSearch = $_SESSION['loginUsuario'];
		echo $userSearch;
		$query2 = $conn->prepare("SELECT nome, tipo, nomeUsuario, email FROM usuario WHERE nomeUsuario = '$userSearch' ");
		//$query->bindValue(1, $usuario);
		//$query->bindValue(1, $senha);
		$query2->execute();
		//print_r($query);

		$resultado2 = $query2->fetchObject();
 		if($resultado2){
			if($resultado2->tipo == '1'){
				$tipo = "Free Account";
			}else{
				$tipo = "PREMIUM Account";
			}

			$_SESSION['nome'] = $resultado2->nome;
			$_SESSION['email'] = $resultado2->email;
			$_SESSION['tipo'] = $tipo;
			$_SESSION['user'] = $resultado2->nomeUsuario;
			
			header('Location: ./dados.php');
		}else{
			$acao = "erro";
			$erro = "Usuário não encontrado!";
		}

	}

	if($acao == "inicio"){
		$_SESSION['loginUsuario'] = $usuario;
		$_SESSION['nomeUsuario'] = $resultado->nome;
		$_SESSION['nome'] = $resultado2->nome;
		$_SESSION['email'] = $resultado2->email;
		$_SESSION['tipo'] = $tipo;

		header('Location: ./welcome.html');
		
		echo "Bem Vindo, $resultado->nome";
	}
	
	if($acao == "erro"){
		if($acao == "erro"){
			$_SESSION['erro'] = $erro;
		}

		header('Location: ./error.php');
	}

	



