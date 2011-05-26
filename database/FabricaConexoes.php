<?php

class FabricaConexoes {

	private $conexao;
	private $bancoDados;

	public function getConexao() {
		return $this->conexao;
	}
	
	public function getBancoDados() {
		return $this->bancoDados;
	}
	
	//Construtor do Objeto de Conexao com o Banco de Dados
	public function FabricaConexoes($servidor, $usuario, $senha) {
		$this->conexao = mysql_connect($servidor, $usuario, $senha) or die("Falha ao conectar com o banco.");		
	}
	
	//Selecionando a base de dados do banco
	public function selecionaBaseDados($nome) {
		$this->bancoDados = mysql_select_db($nome, $this->conexao) or die("Base de dados nao disponivel.".$nome);
	}
	
	//Sobrecarga do Métodos finalizaConexao() - Encerrando a conexao com ResultSet
	public function finalizaConexaoResult($resultSet) {
		mysql_free_result($resultSet);
		mysql_close($this->conexao);
	}
	
	//Encerrando a conexao sem resultSet
	public function finalizaConexao() {
		mysql_close($this->conexao);
	}
}

?>
