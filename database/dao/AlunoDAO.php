<?php

class AlunoDAO {

    private $sql;
    private $resultSet;
    private $conn;
    
    public function getSql() {
        return $this->sql;
    }

    //Construtor do Objeto de Conexao com o Banco de Dados
    public function AlunoDAO() {

    }

    //Consulta que retorna todos os Alunos cadastrados
    public function verTodos() {

        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_alunos order by nome";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $alunos[] = new Aluno($linha['nome'], $linha['cpf'], $linha['rg'], $linha['rua'], $linha['cidade'],
                $linha['estado'], $linha['telefone'], $linha['impressaoDigital'], $linha['ra'], $linha['id_aluno']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $alunos;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorPK($alunoID) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_alunos where id_aluno='".$alunoID."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $aluno = new Aluno($linha['nome'], $linha['cpf'], $linha['rg'], $linha['rua'], $linha['cidade'],
                $linha['estado'], $linha['telefone'], $linha['impressaoDigital'], $linha['ra'], $linha['id_aluno']);
            }
        } else {
            echo "Nao foi encontrado este aluno.";
            $aluno = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $aluno;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_alunos where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $aluno = new Aluno($linha['nome'], $linha['cpf'], $linha['rg'], $linha['rua'], $linha['cidade'],
                $linha['estado'], $linha['telefone'], $linha['impressaoDigital'], $linha['ra'], $linha['id_aluno']);
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $aluno;
    }

    public function deletaItem($aluno) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "delete from tb_alunos where id_aluno=".$aluno->getAlunoID();
        mysql_query($this->sql, $conn->getConexao());
        $conn->finalizaConexao();
        return $aluno;
    }

    public function insereAluno(Aluno $aluno) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        //Se alunoID for igual a ZERO faremos um INSERT senão UPDATE.
        if ($aluno->getAlunoID()==0) {
            $this->sql = "insert into tb_alunos(nome, cpf, rg, rua, cidade, estado,
            telefone, impressaoDigital, ra) values('".$aluno->getNome()."', '"
            .$aluno->getCpf()."', '".$aluno->getRg()."', '".$aluno->getRua()."', '"
            .$aluno->getCidade()."', '".$aluno->getEstado()."', '".$aluno->getTelefone()."', '"
            .$aluno->getImpressaoDigital()."', '".$aluno->getRa()."')";
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar insercao. Erro = ".mysql_error());
        } else {
            $this->sql = "update tb_alunos set nome='".$aluno->getNome()."', cpf='".$aluno->getCpf().
            "', rg='".$aluno->getRg()."', rua='".$aluno->getRua()."', cidade='".$aluno->getCidade().
            "', estado='".$aluno->getEstado()."', telefone ='".$aluno->getTelefone().
            "', impressaoDigital='".$aluno->getImpressaoDigital()."', ra='".$aluno->getRa().
            "' where id_aluno=".$aluno->getAlunoID();
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        }
        $conn->finalizaConexao();
        return $aluno;
    }
}

?>
