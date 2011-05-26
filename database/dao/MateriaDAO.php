<?php

class MateriaDAO {

    private $sql;
    private $resultSet;
    private $conn;

    public function getSql() {
        return $this->sql;
    }

    //Construtor do Objeto de Conexao com o Banco de Dados
    public function MateriaDAO() {

    }

    //Consulta que retorna todas as Materias cadastradas
    public function verTodos() {

        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_materias";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $materias[] = new Materia($linha['id_materia'], $linha['nome'], $linha['carga_horaria'], $linha['id_professor'], $linha['id_turma']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $materias;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorPK($materiaID) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_materias where id_materia='".$materiaID."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $materia = new Materia($linha['id_materia'], $linha['nome'], $linha['carga_horaria'], $linha['id_professor'], $linha['id_turma']);
            }
        } else {
            echo "Nao foi encontrado esta materia.";
            $materia = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $materia;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_materias where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $materia = new Materia($linha['id_materia'], $linha['nome'], $linha['carga_horaria'], $linha['id_professor'], $linha['id_turma']);
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $materia;
    }

     //buscar por coluna e retorna varios resultados
    public function buscarPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_materias where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $materias[] = new Materia($linha['id_materia'], $linha['nome'], $linha['carga_horaria'], $linha['id_professor'], $linha['id_turma']);
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $materias;
    }

    public function deletaItem($materia) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "delete from tb_materias where id_materia=".$materia->getMateriaID();
        mysql_query($this->sql, $conn->getConexao());
        $conn->finalizaConexao();
        return $materia;
    }

    public function insereMateria(Materia $materia) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        //Se materiaID for igual a ZERO faremos um INSERT senão UPDATE.
        if ($materia->getMateriaID()==0) {
            $this->sql = "insert into tb_materias(nome, carga_horaria, id_professor, id_turma)
                values('".$materia->getNome()."', '".$materia->getCargaHoraria()."', '".$materia->getProfessorID()."', '".$materia->getTurmaID()."')";
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar insercao. Erro = ".mysql_error());
        } else {
            $this->sql = "update tb_materias set nome='".$materia->getNome()."', carga_horaria='".$materia->getCargaHoraria().
            "', id_professor='".$materia->getProfessorID()."', id_turma='".$materia->getTurmaID()."' where id_materia=".$materia->getMateriaID();
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        }
        $conn->finalizaConexao();
        return $materia;
    }
}

?>
