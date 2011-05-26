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
  <link rel="stylesheet" type="text/css" href="/ProjetoFatec/estiloPadrao.css">
</head>
<body>
<?php
    include '../database/FabricaConexoes.php';
    $fabricaConexoes = new FabricaConexoes("localhost", "root", "");
    $fabricaConexoes->selecionaBaseDados("presencadigitaldb");
    //recebendo variaveis pelo post
    $login = $_SESSION['login_session'];
    $senha = $_SESSION['senha_session'];
    $resultSet = mysql_query("select * from tb_usuarios where login='".$login."' and senha ='".$senha."'", $fabricaConexoes->getConexao());
    $linha = mysql_fetch_array($resultSet);
    $nome = $linha['login'];
?>
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
Seja bem vindo <?php echo $nome; ?> .
<div id="rodape">
<h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
</div>
</body>
</html>
