<?php
    if(!isset($_SESSION)){
        session_start();
    }

    require_once('conexao.php');
    $db = Database::connect();

    if (isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['inicio']) && isset($_POST['termino']) && isset($_POST['cor']) && isset($_POST['correo'])) {
        
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $inicio = $_POST['inicio'];
        $termino = $_POST['termino'];
        $cor = $_POST['cor'];
        $correo = $_POST['correo'];

        $inicio = date('Y/m/d H:i:s', strtotime($inicio));
        $termino = date('Y/m/d H:i:s', strtotime($termino));

        
        $sql_check = "SELECT * FROM eventos WHERE (inicio <= :termino AND termino >= :inicio)";
        $query_check = $db->prepare($sql_check);
        $query_check->bindParam(':inicio', $inicio);
        $query_check->bindParam(':termino', $termino);
        $query_check->execute();
        
        if ($query_check->rowCount() > 0) {
            echo "<script>alert('Esa hora ya está ocupada'); window.history.back();</script>";
        } else {
            
            $sql = "INSERT INTO eventos(titulo, descricao, cor, inicio, termino, correo) values ('$titulo', '$descricao', '$cor', '$inicio', '$termino', '$correo')";
            $query = $db->prepare($sql);

            if ($query->execute() == false) {
                print_r($query->errorInfo());
                die ('Erro ao executar');
            }

        
        }
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);
?>
