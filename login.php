<?php

include("conexao.php");

if (isset($_POST['email']) || isset($_POST['password'])) {

    if (strlen($_POST['email']) == 0) {
        echo "Digite seu email";
    } else if (strlen($_POST['password']) == 0) {
        echo "Digite sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        $sql_pesquisa = "SELECT * FROM cadastro WHERE cad_email = '$email'  AND nmu_senha = '$password'";
        $sql_query = $mysqli->query($sql_pesquisa) or die("Erro de pesquisa query" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['nome'] = $usuario['id_cadastro']; // iniciar uma sessão 

            header('Location: leadingpage.html'); // Direcionar para o arquivo leadingpage.hmtl
        } else {
            echo "erro no login";
        }
    }
}
