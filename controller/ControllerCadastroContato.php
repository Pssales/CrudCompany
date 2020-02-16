<?php
require_once("../model/webhook.php");
require_once("../model/ModelContato.php");
class cadastroContatoController{

    private $contato;
    private $banco;

    public function __construct($idEmpresa){
        $this->contato = new Contato();
        $this->banco = new Banco();
    }


    public function incluir($idEmpresa){
        $this->contato->setNome($_POST['nome']);
        $this->contato->setTelefone($_POST['telefone']);
        $this->contato->setEmail($_POST['email']);
        
        $dados = json_decode($this->contato->getByNome());
        

        if(!empty($dados->result[0])){
            $this->contato->setId($dados->result[0]->ID);
            $result = $this->contato->editar();
        }else{
            $result = $this->contato->incluir();
            
            $dados = json_decode($this->contato->getByNome()); 
            
            if(!empty($dados->result[0])){
                $this->contato->setId($dados->result[0]->ID);
            }
            $this->contato->setEmpresa($this->contato->getId(), $idEmpresa);
        }
        return $this->contato->getId();

        if(!$result){
            echo "<script>alert('Erro ao gravar registro!, verifique se o registro não está duplicado');history.back()</script>";
        }
        
    }
}
