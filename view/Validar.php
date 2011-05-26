<?php

    include '../database/dao/UsuarioDAO.php';
    include_once '../beans/Usuario.php';
    include_once '../database/FabricaConexoes.php';
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $usuarioDAO = new UsuarioDAO();
    $fabricaConexoes = new FabricaConexoes("localhost", "root", "");
    $fabricaConexoes->selecionaBaseDados("presencadigitaldb");
    $user = $usuarioDAO->buscaPorColuna($usuario, "login");
    if(($user!=null) && ($user->getSenha() == $senha)) {
        session_start();
        $_SESSION['login_session'] = $usuario;
        $_SESSION['senha_session'] = $senha;
?>

    <script>
        window.location.href="./Intranet.php"
    </script>

<?php

    } else {
        
?>
        <script>
            window.location.href="../index.html"
        </script>
<?php

    }

?>
