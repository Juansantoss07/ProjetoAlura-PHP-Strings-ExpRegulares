<?php

namespace App\Alura;
 
class Contato
{

	private $email;
	private $usuario;
	private $endereco;
	private $cep;
	private $telefone;
	
	function __construct(string $email, string $endereco, string $cep, string $telefone)
	{
		$this->email = $email;

		$arroba = strpos($this->email, '@');

		$this->usuario = substr($this->email, 0, $arroba);

		$this->endereco = $endereco;
		$this->cep = $cep;
		$this->telefone = $telefone;

	}

	public function getUsuario():string
	{
		if($this->email === "" or $this->email === null) {
			return "E-mail inválido";
		} else {
			return $this->usuario;
		}
	}

	public function getEmail():string
	{
		return $this->email;	
	}

	public function getEnderecoCep():string
	{
		$enderecoEcep = [$this->endereco, $this->cep];
		return implode(" - ", $enderecoEcep);
	}

	public function getTelefone():string
	{
		return $this->telefone;
	}
}
