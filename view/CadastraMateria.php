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
                            <a href="/ProjetoFatec/faleConosco.html"><img src="/ProjetoFatec/images/contato_32x32.png" alt="faleConosco" id="contato" title="contato" border="0" height="32" width="32"></a>                    </td>
                        <td>
                        <img src="/ProjetoFatec/Untitled-1.png" alt="Biometria" align="top" height="70" width="60">                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="menu">
            <table style="width: 100%; height: 60%;" border="0">
                <tbody>
                    <tr align="center" bgcolor="lightblue">
                        <td style="width: 100%; height: 25%;">
                            <a href="/ProjetoFatec/view/operacoes.html"> <big> Opera&ccedil;&otilde;es </big> </a><br>
                        </td>
                    </tr>
                    <tr align="center" bgcolor="gray">
                        <td style="width: 100%; height: 25%;">
                            <a href="/ProjetoFatec/view/Intranet.php"> <big> &Aacute;rea Protegida </big> </a><br>
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
            <fieldset id="CadastrarMateria" style="width: 100%; height: 80%;">
                <legend for="CadastrarMateria">Cadastro de Mat&eacute;ria</legend>
                <form action="CadastrarMateria.php" method="post">
                    <br>
                    <div align="justify">
                        <div style="margin-left: 40px;">
                            Nome
                            <input type="text" name="nome" size="30" maxlength="30">
                        </div>
                        <br>
                        <div style="margin-left: 40px;">
                            Carga Hor&aacute;ria
                            <input size="5" maxlength="2" name="cargaHoraria">
                            &nbsp; &nbsp;&nbsp;
                            Professor
                            <?php
                                include '../beans/Pessoa.php';
                                include_once '../beans/Professor.php';
                                include_once '../database/dao/ProfessorDAO.php';
                                include_once '../database/FabricaConexoes.php';
                                
                                $professorDAO = new ProfessorDAO();
                                $professores = $professorDAO->verTodos();
                            ?>
                            <select name="professorID">
                                <?php
                                    for($i=0; $i<sizeof($professores); $i++) {
                                ?>
                                        <option value="<?php echo $professores[$i]->getProfessorID(); ?>" /><?php echo $professores[$i]->getNome();?>
                                <?php
                                    }
                                ?>
                            </select>
                            <br /><br />
                            Turma
                            <input type="text" name="turmaID" size="10" maxlength="10" />
                        </div>
                        <br>
                        <p align="center">
                            <input name="Salvar" value="Salvar" type="submit">
                            <input name="limpar" value="Limpar" type="reset">
                            <br>
                            <br>
                        </p>
                    </div>
                </form>
            </fieldset>
        </div>
        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>
    </body>
</html>
