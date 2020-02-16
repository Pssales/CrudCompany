<?php
require_once("webhook.php");

class Contato extends Banco {

    private $id;
    private $nome;
    private $telefone;
    private $email;

    //Metodos Set

    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    //Metodos Get

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }

    public function getByNome(){
        return $this->getContactFilter($this->getNome());
    }

    public function incluir(){
        return $this->setContact($this->getNome(),$this->getTelefone(),$this->getEmail());
    }

    public function editar(){
        return $this->updateContact($this->getNome(),$this->getTelefone(),$this->getEmail(), $this->getId());
    }

    public function setEmpresa($idEmpresa){
        $this->setContactCompany($this->getId(), $idEmpresa);
    }
}
?>
