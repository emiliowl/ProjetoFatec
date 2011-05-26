<?php

	class AulaDAO {

	private $sql;
    private $resultSet;
    private $conn;

    public function getSql() {
        return $this->sql;
    }

    //Construtor
    public function AulaDAO() {

    }

    //Consulta que retorna todas as aulas cadastradas
    public function verTodas() {

        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_aulas order by id_aula";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
            $aulas[] = new Aula($linha['id_aula'], $linha['id_materia'], $linha['hora_inicio'], $linha['hora_fim'],$linha['data']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $aulas;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorPK($aulaID) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_aulas where id_aula='".$aulaID."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        if(mysql_num_rows($this->resultSet)>0) {
            while($linha = mysql_fetch_array($this->resultSet)) {
                $aula = new Aula($linha['id_aula'], $linha['id_materia'], $linha['hora_inicio'], $linha['hora_fim'],$linha['data']);
            }
         } else {
            echo "Nao foi encontrada esta aula.";
            $aula = null;
        }
        $conn->finalizaConexaoResult($this->resultSet);
        return $aula;
    }

    public function buscaAulasFinalizadas() {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_aulas where hora_fim!='00:00:00'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
        	 $aulas[] = new Aula($linha['id_aula'], $linha['id_materia'], $linha['hora_inicio'], $linha['hora_fim'],$linha['data']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $aulas;
    }

    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscaPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_aulas where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
        	 $aula = new Aula($linha['id_aula'], $linha['id_materia'], $linha['hora_inicio'], $linha['hora_fim'],$linha['data']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $aula;
    }
    //Operacoes simples com o banco de dados (busca, delecao e insercao)
    public function buscarPorColuna($item, $coluna) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_aulas where ".$coluna."='".$item."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
        	 $aulas[] = new Aula($linha['id_aula'], $linha['id_materia'], $linha['hora_inicio'], $linha['hora_fim'],$linha['data']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $aulas;
    }

    //Busca aula com base em mais de uma coluna
    public function buscarPorColunas($item1, $item2, $coluna1, $coluna2) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "select * from tb_aulas where ".$coluna1."='".$item1."' and ".$coluna2."='".$item2."'";
        $this->resultSet = mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        while($linha = mysql_fetch_array($this->resultSet)) {
        	 $aula = new Aula($linha['id_aula'], $linha['id_materia'], $linha['hora_inicio'], $linha['hora_fim'],$linha['data']);
        }
        $conn->finalizaConexao($this->resultSet);
        return $aula;
    }

    public function deletaItem(Aula $aula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        $this->sql = "delete from tb_aulas where id_aula=".$aula->getAulaID();
        mysql_query($this->sql, $conn->getConexao());
        $conn->finalizaConexao();
        return $aula;
    }

    public function insereAula(Aula $aula) {
        $conn = new FabricaConexoes("localhost", "root", "");
        $conn->selecionaBaseDados("presencadigitaldb");
        //Se aulaID for igual a ZERO faremos um INSERT senão UPDATE.
        if ($aula->getAulaID()==0) {
            $this->sql = "insert into tb_aulas(id_materia, hora_inicio, hora_fim, data) values('".$aula->getMateriaID()."', '"
            .$aula->getHoraInicio()."', '".$aula->getHoraFim()."', '".$aula->getData()."')";
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        } else {
            $this->sql = "update tb_aulas set id_materia='".$aula->getMateriaID()."', hora_inicio='".$aula->getHoraInicio().
            "', hora_fim='".$aula->getHoraFim()."', data='".$aula->getData()."' where id_aula=".$aula->getAulaID();
            mysql_query($this->sql, $conn->getConexao()) or die ("Erro ao efetuar consulta. Erro = ".mysql_error());
        }
        return $aula;
    }
}

?>
