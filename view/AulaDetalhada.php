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

        <div id="conteudo" align="center">
            <?php
                include '../beans/Aula.php';
                include_once '../beans/Pessoa.php';
                include_once '../beans/Aluno.php';
                include_once '../beans/Materia.php';
                include_once '../beans/Professor.php';
                include_once '../database/dao/AulaDAO.php';
                include_once '../database/dao/AlunoDAO.php';
                include_once '../database/dao/MateriaDAO.php';
                include_once '../database/dao/ProfessorDAO.php';
                include_once '../database/dao/PresencaDAO.php';
                include_once '../database/FabricaConexoes.php';

                $aulaID = $_GET['id'];
                $aulaDAO = new AulaDAO();
                $materiaDAO = new MateriaDAO();
                $professorDAO = new ProfessorDAO();
                $aula = $aulaDAO->buscaPorPK($aulaID);
                if($aula!=null) {
                    $materiaID = $aula->getMateriaID();
                    $materia = $materiaDAO->buscaPorPK($materiaID);
                    $professorID = $materia->getProfessorID();
                    $professor = $professorDAO->buscaPorPK($professorID);
            ?>
            <p align="justify">
                <h2 align="justify">
                    Aula iniciada às: <?php echo $aula->getHoraInicio(); ?> do dia <?php echo $aula->getData(); ?><br/>
                    Mat&eacute;ria: <?php echo $materia->getNome(); ?><br/>
                    Professor: <?php echo $professor->getNome(); ?>
                </h2>
            </p>
            <?php

                $presencaDAO = new PresencaDAO();
                $alunoDAO = new AlunoDAO();
                $alunoID = $presencaDAO->buscarAlunoAula($aula);

            ?>
            <h1 align="center"> Alunos Presentes: </h1>
            <table id="tbDefault" width="100%" border="1">
                <tr>
                    <td style="font-weight:bold">RA</td>
                    <td style="font-weight:bold">Nome</td>
                    <td style="font-weight:bold">Entrada</td>
                </tr>
                <?php
                    if($alunoID != null) {
                        for($i = 0; $i < sizeof($alunoID); $i++) {
                            $aluno = $alunoDAO->buscaPorPK($alunoID[$i]);
                            $horaEntrada = $presencaDAO->horaEntrada($aluno, $aula);
                ?>
                <tr>
                    <td><?php echo $aluno->getRa(); ?></td>
                    <td><?php echo $aluno->getNome(); ?></td>
                    <td><?php echo $horaEntrada; ?></td>
                </tr>
                <?php
                        }
                    }
                }
                ?>

            </table>

        </div>

        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>

    </body>
</html>