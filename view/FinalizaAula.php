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
                $aulaID = $_POST['aula_id'];
                $cpf = $_POST['cpf'];
                $cpfDigitado = $_POST['cpf_digitado'];

                if($cpfDigitado != $cpf) {
            ?>
                    <form id="retorna" action="Aula.php" method="post">
                        Autentica&ccedil;&atilde;o inv&aacute;lida!
                        <input type="hidden" name="aula_id" value="<?php echo $aulaID;?>" />
                        <input type="submit" value="retornar" name="retornar"/>
                    </form>
            <?php
                } else {

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
                $horaFim = date('H:i:s');
                $aulaDAO = new AulaDAO();
                $aula = $aulaDAO->buscaPorPK($aulaID);
                $aula->setHoraFim($horaFim);
                $aulaDAO->insereAula($aula);
                $materiaDAO = new MateriaDAO();
                $materia = $materiaDAO->buscaPorPK($aula->getMateriaID());
            ?>
            <h1>FINALIZA&Ccedil;&Atilde;O DE AULA</h1>
            <br />
            <br />
            <br />
            <h2>
                PROFESSOR: <?php echo $professor->getNome(); ?> <br/><br/>
                MATERIA: <?php echo $materia->getNome(); ?> <br/><br/>
                HORA DE IN&Iacute;CIO: <?php echo $aula->getHoraInicio(); ?> <br/><br/>
                HORA DE FIM: <?php echo $aula->getHoraFim(); ?> <br/><br/>
            </h2>
            <?php } ?>
        </div>

        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>

    </body>
</html>