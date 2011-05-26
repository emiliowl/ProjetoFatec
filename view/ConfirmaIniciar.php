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
            <?
                $materiaID = $_POST['materiaID'];
                $cpf = $_POST['cpf'];

                include '../beans/Materia.php';
                include_once '../beans/Pessoa.php';
                include_once '../beans/Aula.php';
                include_once '../beans/Professor.php';
                include_once '../database/dao/AulaDAO.php';
                include_once '../database/dao/ProfessorDAO.php';
                include_once '../database/dao/MateriaDAO.php';
                include_once '../database/FabricaConexoes.php';
                $professorDAO = new ProfessorDAO();
                $professor = $professorDAO->buscaPorColuna($cpf, "cpf");
                $aulaDAO = new AulaDAO();
                $materiaDAO = new MateriaDAO();
                $materia = $materiaDAO->buscaPorPK($materiaID);
                if(($professor!=null) && ($professor->getProfessorID()==$materia->getProfessorID())) {

                $aulas = $aulaDAO->buscarPorColuna("00:00:00", "hora_fim");
                if($aulas != null) {
                    $flag = 0;
                    for($i=0; $i<sizeof($aulas); $i++) {
                        $materia = $materiaDAO->buscaPorPK($aulas[$i]->getMateriaID());
                        $professorID = $materia->getProfessorID();
                        if($professor->getProfessorID() == $professorID) {
                            echo "Professor j&aacute; tem aula iniciada.";
                            ?>
                            <form method="post" action="Aula.php">
                                <input type="hidden" value="<?php echo $aulas[$i]->getAulaID(); ?>" name="aula_id" />
                                <br />
                                <br />
                                <br />
                                <input type="submit" name="recuperar" value="Recuperar Aula"/>
                            </form>
                            <?php
                            $flag = 1;
                            break;
                        }    
                    }
                    if($flag != 1) {
                        $horaInicio = date('H:i:s');
                        $data = date('Y/m/d');
                        $aula = new Aula(0, $materiaID, $horaInicio, $horaFim, $data);
                        $aulaDAO = new AulaDAO();
                        $aulaDAO->insereAula($aula);
                        $aulaInserida = $aulaDAO->buscarPorColunas($aula->getHoraInicio(), $aula->getData(), "hora_inicio", "data");
                        ?>
                        <h1>INICIAR AULA</h1>
                        <br />
                        <br />
                        <br />
                        AULA INICIADA PELO PROFESSOR <?php echo $professor->getNome(); ?> às <?php echo $aula->getHoraInicio(); ?>
                        <form method="post" action="Aula.php">
                            <input type="hidden" value="<?php echo $aulaInserida->getAulaID(); ?>" name="aula_id" />
                            <br />
                            <br />
                            <br />
                            <input type="submit" name="iniciar" value="Iniciar"/>
                        </form>
                    <?php
                    }
                } else {
                    $horaInicio = date('H:i:s');
                    $data = date('Y/m/d');
                    $aula = new Aula(0, $materiaID, $horaInicio, $horaFim, $data);
                    $aulaDAO = new AulaDAO();
                    $aulaDAO->insereAula($aula);
                    $aulaInserida = $aulaDAO->buscaPorColuna($aula->getHoraInicio(), "hora_inicio");
            ?>
            <h1>INICIAR AULA</h1>
            <br />
            <br />
            <br />
            AULA INICIADA PELO PROFESSOR <?php echo $professor->getNome(); ?> às <?php echo $aula->getHoraInicio(); ?>
            <form method="post" action="Aula.php">
                <input type="hidden" value="<?php echo $aulaInserida->getAulaID(); ?>" name="aula_id" />
                <br />
                <br />
                <br />
                <input type="submit" name="iniciar" value="Iniciar"/>
            </form>
            <?php } ?>
        <?php } else {
                echo "CPF inválido";
            }
        ?>
        </div>

        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>

    </body>
</html>