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
        <?php
            include '../beans/Pessoa.php';
            include_once '../beans/Professor.php';
            include_once '../database/dao/ProfessorDAO.php';
            include_once '../database/FabricaConexoes.php';
            
            $professorID = $_GET['id'];
            $ProfessorDAO = new ProfessorDAO();
            $professor = $ProfessorDAO->buscaPorPK($professorID);
            if($professor != null) {

        ?>
            <fieldset id="CadastrarProfessor" style="width: 100%; height: 80%;">
                <legend for="CadastrarProfessor">Cadastro de Professor</legend>
                <form action="CadastrarProfessor.php" method="post">
                    <br>
                    <div align="justify">
                        <div style="margin-left: 40px;">
                            Nome
                            <input name="nome" value="<? echo $professor->getNome(); ?>" size="70" maxlength="30">
                            <img src="" alt="Sua Foto Aqui" name="FOTO" style="background-color: rgb(255, 255, 255);" align="right" border="1" height="128" width="128"><br>
                        </div>
                        <br>
                        <div style="margin-left: 40px;">
                            CPF
                            <input size="24" value="<? echo $professor->getCpf() ?>" maxlength="14" name="cpf">
                            &nbsp; &nbsp;&nbsp;
                            RG
                            <input size="30" value="<? echo $professor->getRg() ?>" maxlength="20" name="rg" type="text">
                            <br />
                        </div>
                        <br>
                        <div style="margin-left: 40px;">
                            Rua
                            <input size="20" value="<? echo $professor->getRua() ?>" maxlength="30" name="rua" type="text">
                            Cidade
                            <input size="20" value="<? echo $professor->getCidade() ?>" maxlength="30" name="cidade" type="text">
                            <br /><br />
                            Estado
                            <select name="estado">
                                <optgroup label="Centro Oeste">
                                    <option value="DF" />Distrito Federal
                                    <option value="GO" />Goi&aacute;s
                                    <option value="MT" />Mato Grosso
                                    <option value="MS" />Mato Grosso do Sul
                                </optgroup>
                                <optgroup label="Nordeste">
                                    <option value="BA" />Bahia
                                    <option value="CE" />Cear&aacute;
                                    <option value="MA" />Maranh&atilde;o
                                    <option value="PB" />Para&iacute;ba
                                    <option value="PE" />Pernambuco
                                    <option value="PI" />Piau&iacute;
                                    <option value="RN" />Rio Grande do Norte
                                    <option value="SE" />Sergipe
                                </optgroup>
                                <optgroup label="Norte">
                                    <option value="AC" />Acre
                                    <option value="AL" />Alagoas
                                    <option value="AP" />Amap&aacute;
                                    <option value="AM" />Amazonas
                                    <option value="PA" />Par&aacute;
                                    <option value="RO" />Rond&ocirc;nia
                                    <option value="RR" />Ror&acirc;ima
                                    <option value="TO" />Tocantins
                                </optgroup>
                                <optgroup label="Sudeste">
                                    <option value="ES" />Esp&iacute;rito Santo
                                    <option value="MG" />Minas Gerais
                                    <option value="RJ" />Rio de Janeiro
                                    <option value="SP" selected/>S&atilde;o Paulo
                                </optgroup>
                                <optgroup label="Sul">
                                    <option value="PR" />Paran&aacute;
                                    <option value="RS" />Rio Grande do Sul
                                    <option value="SC" />Santa Catarina
                                </optgroup>
                            </select>
                            <br>
                        </div>
                        <br>
                        <div style="margin-left: 40px;">
                            Telefone
                            <input size="14" value="<? echo $professor->getTelefone() ?>" maxlength="14" name="telefone" type="text">
                            &nbsp; &nbsp; &nbsp;
                            Impress&atilde;o Digital
                            <input size="20" value="<? echo $professor->getImpressaoDigital() ?>" maxlength="20" name="impressaoDigital" type="text">
                            <input name="professor_id" type="hidden" value="<? echo $professor->getProfessorID(); ?>"/>
                        </div>
                        <p align="center">
                            <input name="Salvar" value="Salvar" type="submit">
                            <input name="limpar" value="Limpar" type="reset">
                            <br>
                            <br>
                        </p>
                    </div>
                </form>
            </fieldset>
            <?php
            }
            ?>
        </div>
        <div id="rodape">
            <h3 align="center">Copyrigth - Todos os Direitos Reservados</h3>
        </div>
    </body>
</html>
