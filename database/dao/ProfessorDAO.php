<?php

	class ProfessorDAO {
		
	private $sql;
    private $resultSet;
    private $conn;

    public function getSql() {
        return $this->sql;
    }

    //Construtor do Objeto de Conexao com o Banco de Dados
    public function ProfessorDAO() {

    }

    //Consulta que retorna todos os Alunos cadastrados
    public function verTodos() {

        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_professores";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $professores[] = new Professor($linha['nome'], $linha['cpf'], $linha['rg'], $linha['rua'],
            $linha['cidade'], $linha['estado'], $linha['telefone'], $linha['impressaoDigital'], 
            $linha['id_professor']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $professores;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorPK($professorID) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_professores where id_professor='".$professorID."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $professor = new Professor($linha['nome'], $linha['cpf'], $linha['rg'], $linha['rua'],
                $linha['cidade'], $linha['estado'], $linha['telefone'], $linha['impressaoDigital'],
                $linha['id_professor']);
            }
         } else {
            echo "Nao foi encontrado este professor.";
            $professor = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $professor;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_professores where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $professor = new Professor($linha['nome'], $linha['cpf'], $linha['rg'], $linha['rua'],
                $linha['cidade'], $linha['estado'], $linha['telefone'], $linha['impressaoDigital'],
                $linha['id_professor']);
            }
        } else {
            $professor = null;
        }
        $conn->finalizaConexao($this->resultSet);
        return $professor;
    }

    public function deletaItem(Professor $professor) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "delete from tb_professores where id_professor=".$professor->getProfessorID();
        mysql_query($this->sql, $conn->getConexao());
        $conn->finalizaConexao();
        return $professor;
    }

    public function insereProfessor(Professor $professor) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        //Se professsorID for igual a ZERO faremos um INSERT senão UPDATE.
        if ($professor->getProfessorID()==0) {
            $this->sql = "insert into tb_professores(nome, cpf, rg, rua, cidade, estado,
            telefone, impressaoDigital) values('".$professor->getNome()."', '"
            .$professor->getCpf()."', '".$professor->getRg()."', '".$professor->getRua()."', '"
            .$professor->getCidade()."', '".$professor->getEstado()."', '".$professor->getTelefone()."', '"
            .$professor->getImpressaoDigital()."')";
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        } else {
            $this->sql = "update tb_professores set nome='".$professor->getNome()."', cpf='".$professor->getCpf().
            "', rg='".$professor->getRg()."', rua='".$professor->getRua()."', cidade='".$professor->getCidade().
            "', estado='".$professor->getEstado()."', telefone ='".$professor->getTelefone().
            "', impressaoDigital='".$professor->getImpressaoDigital()."' where id_professor=".$professor->getProfessorID();
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        }
        return $professor;
    }		
}

?>
