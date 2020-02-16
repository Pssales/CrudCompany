<?php
require_once("webhook.php");

class Empresa extends Banco {

    private $id;
    private $nome;
    private $cpf;
    private $cnpj;
    private $telefone;
    private $email;
    private $contato;


    //Metodos Set
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setCNPJ($cnpj){
        $this->cnpj = $cnpj;
    }



    //Metodos Get
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }

    public function getByCpfCnpj(){
        return $this->getCompanyFilter($this->cpf, $this->cnpj);
    }

    public function incluir(){
        return $this->setCompany($this->getNome(),$this->getCpf(),$this->getCnpj(),$this->getTelefone(),$this->getEmail());
    }

    public function editar(){
       return $this->updateCompany($this->getNome(),$this->getCpf(),$this->getCnpj(),$this->getTelefone(),$this->getEmail(),$this->getId());
    }

    public function setContato($idContato){
        $this->setCompanyContact($this->getId(),$idContato);
    }

    public function getContato(){
        $this->getCompanyContactItems($this->getId());
    }
}
?>
