<?php
    
    if (isset($_POST['enviar']) && !empty($_POST['login']) && !empty($_POST['senha']) && !empty($_POST['nome'])) {
        $consulta = $conn->prepare("SELECT * FROM usuarios where login = :login AND senha = md5(:senha) AND nome = :nome");
        $resultado = $consulta->execute(array('login' => $_POST['login'], 'senha' => $_POST['senha'], 'nome' => $_POST['nome']));
        $usuario = $consulta->fetch();
        if ($consulta->rowCount() > 0) {
            if ($usuario['login'] == $_POST['login']) {
                $_SESSION['usuaCarrinho'] = $usuario['id'];
                $_SESSION['usuaNome'] = $usuario['nome'];
                $_SESSION['autenticado'] = true;
            }
        } else {
            echo "Usuario Não Registrado";
        }
    }

?>