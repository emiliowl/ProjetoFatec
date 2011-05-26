<?php

class PresencaDAO {

    private $sql;
    private $resultSet;
    private $conn;

    public function getSql() {
        return $this->sql;
    }

    //Construtor do Objeto de Conexao com o Banco de Dados
    public function PresencaDAO() {

    }

    public function inserePresenca(Aluno $aluno, Aula $aula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "insert into tb_presencas(id_aluno, id_aula, hora_entrada)
                values('".$aluno->getAlunoID()."', '".$aula->getAulaID()."', '".date('H:i:s')."')";
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar insercao. Erro = ".mysql_error());
        $conn->finalizaConexao();
    }

    public function buscarAlunoAula(Aula $aula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select id_aluno from tb_presencas where id_aula=".$aula->getAulaID();
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $alunoID[] = $linha['id_aluno'];
            }
        } else {
            echo "Aula nao encontrada ou nenhum aluno presente.";
            $alunoID = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $alunoID;
    }

    public function acharAluno($aula, $aluno) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select id_aluno from tb_presencas where id_aula=".$aula->getAulaID()." and id_aluno=".$aluno->getAlunoID();
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $alunoID = $linha['id_aluno'];
            }
        } else {
            $alunoID = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $alunoID;
    }

    public function horaEntrada(Aluno $aluno, Aula $aula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select hora_entrada from tb_presencas where id_aula=".$aula->getAulaID()." and id_aluno=".$aluno->getAlunoID();
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $horaEntrada = $linha['hora_entrada'];
            }
        } else {
            echo "Aula nao encontrada ou nenhum aluno presente.";
            $horaEntrada = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $horaEntrada;
    }

}

?>
