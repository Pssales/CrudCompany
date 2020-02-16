<?php
require_once("../model/ModelEmpresa.php");
require_once("ControllerCadastroContato.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->empresa = new Empresa();
        $this->incluir();
    }

    private function incluir(){
        $this->empresa->setNome($_POST['empresa']);
        $this->empresa->setCpf($_POST['cpf']);
        $this->empresa->setCnpj($_POST['cnpj']);
        $this->empresa->setTelefone($_POST['telefone']);
        $this->empresa->setEmail($_POST['email']);

        $dados = json_decode($this->empresa->getByCpfCnpj());
        $mensagem = "incluido";
        
        if(!empty($dados->result[0])){
            $this->empresa->setId($dados->result[0]->ID);
            $result = $this->empresa->editar();

            $mensagem = "alterado";
        }else{
            $result = $this->empresa->incluir();
            
            $dados = json_decode($this->empresa->getByCpfCnpj());            
            if(!empty($dados->result[0])){
                $this->empresa->setId($dados->result[0]->ID);
            }
        }
        $contato = new cadastroContatoController($this->empresa->getId());
        $idcontato = $contato->incluir($this->empresa->getId());

        $this->empresa->setContato($idcontato);
        
        if($result >= 1){
            echo "<script>alert('Registro ".$mensagem." com sucesso!');document.location='../view/listar.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se o livro não está duplicado');history.back()</script>";
        }
    }
}
new cadastroController();
