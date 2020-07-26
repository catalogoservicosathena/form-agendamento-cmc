<?php
session_start();
include_once("conexao.php");

$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_EMAIL);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_agendacmc = "INSERT INTO agendacmc (cpf,matricula, email, telefone, created) VALUES ('$cpf', '$matricula', '$email', '$telefone', NOW())";
$resultado_agendacmc = mysqli_query($conn, $result_agendacmc);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Cadastro Efetivado !</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Cadastro não Efetivado !</p>";
	header("Location: index.php");
}
