<?php

namespace App\Alura;

class Usuario
{
	private $nome;
	private $sobrenome;
	private $senha;
	private $tratamento;

	function __construct($nome, $senha, $genero)
	{
		$nomeSobrenome = explode(" ", $nome, 2);

		if($nomeSobrenome[0] === "") {
			$this->nome = "Nome inválido";
		} else {
			$this->nome = $nomeSobrenome[0];
		};

		if($nomeSobrenome[1] === null) {
			$this->sobrenome = "Sobrenome inválido";
		} else {
			$this->sobrenome = $nomeSobrenome[1];
		};

		$this->VerficarTamanhoSenha($senha);

		$this->TratamentoGeneroSobrenome($nome, $genero);

	}

	public function getName() :string
	{
		return $this->nome;
	}

	public function getSobrenome() : string
	{
		return $this->sobrenome;
	}

	public function getSenha():string
	{
		return $this->senha;
	}

	public function getTratamento():string
	{
		return $this->tratamento;
	}

	private function TratamentoGeneroSobrenome($nome, $genero)
	{	
		if ($genero === 'M'){
			$this->tratamento = preg_replace('/^(\w+) \b/', 'Sr. ', $nome, 1);
		}

		if ($genero === 'F') {
			$this->tratamento = preg_replace('/^(\w+) \b/', 'Sra. ', $nome, 1);
		}
	}

	private function VerficarTamanhoSenha(string $senha)
	{
		$tamanhoSenha = strlen(trim($senha));

		if($tamanhoSenha > 7){
			$this->senha = $senha;
		} else {
			$this->senha = " Senha inválida";
		}
	}
}

