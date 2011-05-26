<?php

class UsuarioDAO {

    private $sql;
    private $resultSet;
    private $conn;

    public function getSql() {
        return $this->sql;
    }

    //Construtor do Objeto de Conexao com o Banco de Dados
    public function UsuarioDAO() {

    }

    //Consulta que retorna todos os Alunos cadastrados
    public function verTodos() {

        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_usuarios";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $usuarios[] = new Usuario($linha['login'], $linha['cpf'], $linha['senha'], $linha['id_usuario']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $usuarios;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorPK($usuarioID) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_usuarios where id_usuario='".$usuarioID."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $usuario = new Usuario($linha['login'], $linha['cpf'], $linha['senha'], $linha['id_usuario']);
            }
        } else {
            echo "Nao foi encontrado este usuario.";
            $usuario = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $usuario;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_usuarios where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $usuario = new Usuario($linha['login'], $linha['cpf'], $linha['senha'], $linha['id_usuario']);
            }
        } else {
            $usuario = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $usuario;
    }

    public function deletaItem($usuario) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "delete from tb_usuarios where id_usuario=".$usuario->getUsuarioID();
        mysql_query($this->sql, $conn->getConexao());
        $conn->finalizaConexao();
        return $usuario;
    }

    public function insereUsuario(Usuario $usuario) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        //Se usuarioID for igual a ZERO faremos um INSERT senão UPDATE.
        if ($usuario->getUsuarioID()==0) {
            $this->sql = "insert into tb_usuarios(login, cpf, senha) values('".$usuario->getLogin()."', '"
            .$usuario->getCpf()."', '".$usuario->getSenha()."')";
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar insercao. Erro = ".mysql_error());
        } else {
            $this->sql = "update tb_usuarios set login='".$usuario->getLogin()."', cpf='".$usuario->getCpf().
            "', senha='".$usuario->getSenha()."' where id_usuario=".$usuario->getUsuarioID();
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        }
        $conn->finalizaConexao();
        return $usuario;
    }
}

?>
