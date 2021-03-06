<?php
    session_start();
    if(!isset($_SESSION['login_session']) && !isset ($_SESSION['senha_session'])){
        header("location: ./login.html");
        exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Presen&ccedil;a Digital v1.0</title>
        <link rel="stylesheet" type="text/css" href="../estiloPadrao.css">
    </head>
    <body>
        <div id="cabecalho">
            <table id="tbDefault" style="width: 100%; height: 100%;" height="100%" width="100%">
                <tbody>
                    <tr>
                        <td style="width: 20%;" height="100%">
                            <img src="/ProjetoFatec/images/logo_fatecjd.jpg" alt="logo_fatec" name="img_fatec" id="img_fatec" align="left" border="0" height="50" width="170">
                        </td>
                        <td style="width: 60%; text-align: left;">
                            <h1>Fatec Jundia&iacute;</h1>
                        </td>
                        <td style="width: 20%;" valign="bottom">
                            &nbsp;&nbsp;&nbsp;
                            <a href="/ProjetoFatec/index.html"><img src="/ProjetoFatec/images/home_32x32.png" alt="home" id="home" title="home" border="0" height="32" width="32"></a>
                            &nbsp;&nbsp;
                            <a href="/ProjetoFatec/faleConosco.html"><img src="/ProjetoFatec/images/contato_32x32.png" alt="faleConosco" id="contato" title="contato" border="0" height="32" width="32"></a>
                        </td>
                        <td>
                            <img src="/ProjetoFatec/Untitled-1.png" alt="Biometria" align="top" height="70" width="60">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="menu">
            <table style="width: 100%; height: 60%;" border="0">
                <tbody>
                    <tr align="center" bgcolor="lightblue">
                        <td style="width: 100%; height: 25%;"> <a href="/ProjetoFatec/view/operacoes.html"> <big> Opera&ccedil;&otilde;es </big> </a><br>
                        </td>
                    </tr>
                    <tr align="center" bgcolor="gray">
                        <td style="width: 100%; height: 25%;"> <a href="/ProjetoFatec/view/Intranet.php"> <big> &Aacute;rea Protegida </big> </a><br>
                        </td>
                    </tr>
                    <tr align="center" bgcolor="lightblue">
                        <td style="width: 100%; height: 25%;"> <a href="/ProjetoFatec/view/help.html"><big> Ajuda </big></a></td>
                    </tr>
                    <tr align="center" bgcolor="gray">
                        <td style="width: 100%; height: 25%;"> <a href="/ProjetoFatec/view/about.html"> <big> Sobre </big> </a><br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="conteudo">

            <?php

                include '../beans/Pessoa.php';
                include_once '../beans/Professor.php';
                include_once '../database/dao/ProfessorDAO.php';
                include_once '../database/FabricaConexoes.php';
                
                //criand um objeto de conexao com BD
                $ProfessorDAO = new ProfessorDAO();
                $professores = $ProfessorDAO->verTodos();

            ?>
            <table  id="tbCadastros" width="100%" align="left">
                <tr align="center" bgcolor="darkgray">
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>RG</td>
                    <td>Rua</td>
                    <td>Cidade</td>
                    <td>Estado</td>
                    <td>Telefone</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
                <?php
                    for($i = 0; $i < sizeof($professores); $i++) {
                ?>
                <tr align="center" style="font-size:10px;" <?php if($i % 2 == 0) { ?> bgcolor="lightgray"<?php } ?>>
                    <td> <?php echo $professores[$i]->getNome(); ?> </td>
                    <td> <?php echo $professores[$i]->getCpf(); ?> </td>
                    <td> <?php echo $professores[$i]->getRg(); ?> </td>
                    <td> <?php echo $professores[$i]->getRua(); ?> </td>
                    <td> <?php echo $professores[$i]->getCidade(); ?> </td>
                    <td> <?php echo $professores[$i]->getEstado(); ?> </td>
                    <td> <?php echo $professores[$i]->getTelefone(); ?> </td>
                    <td> <a href="/ProjetoFatec/view/EditarProfessor.php?id=<?php echo $professores[$i]->getProfessorID(); ?>"> <img src="/ProjetoFatec/images/alterar_64x64.png" width="16px" height="16px" title="editar professor" border="0"> </a> </td>
                    <td> <a href="/ProjetoFatec/view/ExcluirProfessor.php?id=<?php echo $professores[$i]->getProfessorID(); ?>"> <img src="/ProjetoFatec/images/excluir_64x64.png" width="16px" height="16px" title="excluir professor" border="0"> </a> </td>
                </tr>
                <?php
                    }
                ?>
            </table>
            <br />
        </div>

        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>
    </body>
</html>
