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
            <br>
            <div>
                 <center>
                    <table width="90%" align="right" id="tbDefault">
                            <tr>
                                <td align="center"><a href="/ProjetoFatec/view/CadastraAluno.php"> <img id="novoAluno" name="novoAluno" title="novo aluno" src="/ProjetoFatec/images/novo_64x64.png" border="0" width="128" height="128" alt="novo aluno" /> </a></td>
                                <td align="center"><a href="/ProjetoFatec/view/BuscaAluno.php"> <img id="buscarAluno" name="buscarAluno" title="procurar aluno" src="/ProjetoFatec/images/lupa_128x128.png" border="0"  width="128" height="128" alt="procurar aluno" /> </a></td>
                                <td align="center"><a href="/ProjetoFatec/view/VerAlunos.php"> <img id="todosAlunos" name="todosAlunos" title="ver alunos" src="/ProjetoFatec/images/todos_128x128.png" border="0" width="128" height="128" alt="ver alunos" /> </a></td>
                            </tr>
                            <tr>
                                <td align="center">NOVO</td>
                                <td align="center">BUSCAR</td>
                                <td align="center">VER TODOS</td>
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
