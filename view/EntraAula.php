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
                include_once '../beans/Matricula.php';
                include_once '../database/dao/MatriculaDAO.php';
                include_once '../database/dao/AulaDAO.php';
                include_once '../database/dao/AlunoDAO.php';
                include_once '../database/dao/MateriaDAO.php';
                include_once '../database/dao/ProfessorDAO.php';
                include_once '../database/dao/PresencaDAO.php';
                include_once '../database/FabricaConexoes.php';

                $aulaID = $_POST['aula_id'];
                $ra = $_POST['ra'];
                
                $alunoDAO = new AlunoDAO();
                $aulaDAO = new AulaDAO();
                $materiaDAO = new MateriaDAO();
                $matriculaDAO = new MatriculaDAO();
                $presencaDAO = new PresencaDAO();
                $professorDAO = new ProfessorDAO();
                $aluno = $alunoDAO->buscaPorColuna($ra, "ra");
                $aula = $aulaDAO->buscaPorPK($aulaID);
                if( (isset($aluno)) && (isset($aula))) {
                    if($matriculaDAO->verificaMatricula($aluno, $aula)) {
                        $aulas = $aulaDAO->buscarPorColuna("00:00:00", "hora_fim");
                         if($aulas != null) {
                            for($i=0; $i<sizeof($aulas); $i++) {
                                $flag = 0;
                                $alunoID = $presencaDAO->acharAluno($aulas[$i], $aluno);
                                if($alunoID != null) {
                                    $flag = 1;
                                    $materia = $materiaDAO->buscaPorPK($aulas[$i]->getMateriaID());
                                    $professor = $professorDAO->buscaPorPK($materia->getProfessorID());
                                    $horaEntrada = $presencaDAO->horaEntrada($aluno, $aulas[$i]);
                ?>
                                    <h2>
                                        Aluno: <?php echo $aluno->getNome();?>, encontra-se na aula de <?php echo $materia->getNome(); ?>,<br/>
                                        ministrada pelo professor <?php echo $professor->getNome(); ?>.<br/><br />
                                        Aula Iniciada &agrave;s <?php echo $aulas[$i]->getHoraInicio(); ?>, entrada do aluno &agrave;s <?php echo $horaEntrada; ?>.<br/>
                                        e n&atilde;o pode entrar em outra aula.
                                    </h2>
                <?php
                                    break;
                                }
                            }
                            if($flag == 0){
                                $presencaDAO = new PresencaDAO();
                                $presencaDAO->inserePresenca($aluno, $aula);
                                echo "Presenca de ".$aluno->getNome()." iniciada.<br/><br/>";
                            }
                         } else {
                        $presencaDAO = new PresencaDAO();
                        $presencaDAO->inserePresenca($aluno, $aula);
                        echo "Presenca de ".$aluno->getNome()." iniciada.<br/><br/>";
                        }
                    } else {
                        echo "Aluno n&atilde;o est&aacute; matriculado ou tem matr&iacute;la trancada.";
                    }
                } else {
                    echo "Aluno n&atilde;o existe.";
                }
                ?>
                <form action="Aula.php" method="post">
                    <input type="hidden" value="<?php echo $aulaID;?>" name="aula_id"/>
                    <input type="submit" value="retornar" name="retornar" />
                </form>
        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>

    </body>
</html>