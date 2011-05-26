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
        <title>Presença Digital v1.0</title>
        <link rel="stylesheet" type="text/css" href="../estiloPadrao.css">
    </head>
    <body>
        <div id="cabecalho">
            <table width="100%" height="130%" id="tbDefault" style="width: 100%; height: 100%;">
                <tr>
                    <td height="100%" style="width:20%;">
                        <img src="/ProjetoFatec/images/logo_fatecjd.jpg" alt="logo_fatec" name="img_fatec" width="170" height="50" border="0" align="left" id="img_fatec"/>
                    </td>
                    <td style="width:60%; text-align:left;">
                        <h1>Fatec Jundia&iacute;</h1>
                    </td>
                    <td style="width:20%;" valign="bottom">
                        &nbsp;&nbsp;&nbsp;
                        <a href="/ProjetoFatec/index.html"><img src="/ProjetoFatec/images/home_32x32.png" alt="home" width="32" height="32" border="0" id="home" title="home" /></a>
                        &nbsp;&nbsp;
                    <a href="/ProjetoFatec/faleConosco.html"><img src="/ProjetoFatec/images/contato_32x32.png" alt="faleConosco" width="32" height="32" border="0" id="contato" title="contato" /></a>                    </td>
                    <td>
                    <img src="/ProjetoFatec/Untitled-1.png" width="60" height="70" alt="Biometria" align="top"/>                    </td>
                </tr>
            </table>
        </div>
        <div id="menu">
            <table border="0" style="width: 100%; height: 60%;">
                <tbody>
                    <tr align="center" bgcolor="lightblue">
                        <td style="width:100%; height:25%;"> <a href="/ProjetoFatec/view/operacoes.html"> <big> Opera&ccedil;&otilde;es </big> </a><br></td>
                    </tr>
                    <tr align="center" bgcolor="gray">
                        <td style="width:100%; height:25%;"> <a href="/ProjetoFatec/view/Intranet.php"> <big> &Aacute;rea Protegida </big> </a><br></td>
                    </tr>
                    <tr align="center" bgcolor="lightblue">
                        <td style="width:100%; height:25%;"> <a href="/ProjetoFatec/view/help.html"><big> Ajuda </big></a></td>
                    </tr>
                    <tr align="center" bgcolor="gray">
                        <td style="width:100%; height:25%;"> <a href="/ProjetoFatec/view/about.html"> <big> Sobre </big> </a><br></td>
                    </tr>
                </tbody>
            </table>
        </div>
		<div id="conteudo">
	<table style="background-color:#EDEBED; width:100%;">
		<tr>
			<td>
                <a href="./Cadastros.php">CADASTROS</a>
			</td>
			<td>
                <a href="./Aulas.php">VER AULAS</a>
			</td>
			<td>
                <a href="./help.html">AJUDA</a>
			</td>
		</tr>
	</table>
</div>
        <div id="conteudo">
            <br>
            <div>
                 <center>
                    <table width="90%" align="right" cellspacing="10px" id="tbDefault">
                            <tr>
                                <td align="center"><a href="/ProjetoFatec/view/CadastroAlunos.php"> <img id="alunos" name="alunos" title="cadastro de alunos" src="/ProjetoFatec/images/alunos_128x128.png" border="0" width="128" height="128" alt="alunos" /> </a></td>
                                <td align="center"><a href="/ProjetoFatec/view/CadastroProfessores.php"> <img id="professores" name="professores" title="cadastro de professores" src="/ProjetoFatec/images/professores_128x128.png" border="0" width="128" height="128" alt="professores" /> </a></td>
                            </tr>
                            <tr>
                                <td align="center">ALUNOS</td>
                                <td align="center">PROFESSORES</td>
                            </tr>
                            <tr>
                                <td align="center"><a href="/ProjetoFatec/view/CadastroUsuarios.php"> <img id="usuarios" name="usuarios" title="cadastro de usu&aacute;rios" src="/ProjetoFatec/images/usuarios_128x128.png" border="0" width="128" height="128" alt="usu&aacute;rios" /> </a></td>
                                <td align="center"><a href="/ProjetoFatec/view/CadastroMaterias.php"> <img id="materias" name="materias" title="cadastro de mat&eacute;rias" src="/ProjetoFatec/images/materias_128x128.png" border="0" width="128" height="128" alt="mat&eacute;rias" /> </a></td>
                            </tr>
                            <tr>
                                <td align="center">USU&Aacute;RIOS</td>
                                <td align="center">MAT&Eacute;RIAS</td>
                            </tr>
                    </table>
                 </center>
                <br><br>
            </div>
        </div>
        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>
    </body>
</html>
