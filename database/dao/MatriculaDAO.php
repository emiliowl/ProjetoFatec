<?php

class MatriculaDAO {

    private $sql;
    private $resultSet;
    private $conn;

    public function getSql() {
        return $this->sql;
    }

    //Construtor do Objeto de Conexao com o Banco de Dados
    public function MatriculaDAO() {

    }

    //Consulta que retorna todas as Materias cadastradas
    public function verTodos() {

        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_matricula_materia order by id_matricula";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $matriculas[] = new Matricula($linha['id_matricula'], $linha['id_materia'], $linha['id_aluno'], $linha['id_turma'], $linha['status']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $matriculas;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorPK($matriculaID) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_matricula_materia where id_matricula='".$matriculaID."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $matricula = new Matricula($linha['id_matricula'], $linha['id_materia'], $linha['id_aluno'], $linha['id_turma'], $linha['status']);
            }
        } else {
            echo "Nao foi encontrado esta matricula.";
            $matricula = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $matricula;
    }

    //verifica se um aluno esta matricula e retorna true caso verdadeiro ou false caso seja falso
    public function verificaMatricula($aluno, $aula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_matricula_materia where id_aluno='".$aluno->getAlunoID()."' and id_materia='".$aula->getMateriaID()."'";
         $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
         if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $matricula = new Matricula($linha['id_matricula'], $linha['id_materia'], $linha['id_aluno'], $linha['id_turma'], $linha['status']);
            }
            if($matricula->getStatus()!=0) {
                return true;
            } else {
                return false;
            }
         } else {
             return false;
         }
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_matricula_materia where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $matricula = new Matricula($linha['id_matricula'], $linha['id_materia'], $linha['id_aluno'], $linha['id_turma'], $linha['status']);
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $matricula;
    }

    public function deletaItem($matricula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "delete from tb_matricula_materia where id_matricula=".$matricula->getMatriculaID();
        mysql_query($this->sql, $conn->getConexao());
        $conn->finalizaConexao();
        return $matricula;
    }

    public function insereMatricula(Matricula $matricula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        //Se matriculaID for igual a ZERO faremos um INSERT senão UPDATE.
        if ($matricula->getMatriculaID()==0) {
            $this->sql = "insert into tb_matricula_materia(id_materia, id_aluno, id_turma, status)
                values('".$matricula->getMateriaID()."', '".$matricula->getAlunoID()."', '".$matricula->getTurmaID()."', '".$matricula->getStatus()."')";
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar insercao. Erro = ".mysql_error());
        } else {
            $this->sql = "update tb_matricula_materia set id_materia='".$matricula->getMateriaID()."', id_aluno='".$matricula->getAlunoID().
            "', id_turma='".$matricula->getTurmaID()."', status='".$matricula->getStatus()."' where id_matricula=".$matricula->getMatriculaID();
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        }
        $conn->finalizaConexao();
        return $matricula;
    }
}

?>
