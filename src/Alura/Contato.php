<?php

namespace App\Alura;
 
class Contato
{

	private $email;
	private $usuario;
	private $endereco;
	private $cep;
	
	function __construct(string $email, string $endereco, string $cep)
	{
		$this->email = $email;

		$arroba = strpos($this->email, '@');

		$this->usuario = substr($this->email, 0, $arroba);

		$this->endereco = $endereco;
		$this->cep = $cep;

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
}
