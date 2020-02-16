<?php
require_once("../model/webhook.php");
// require_once("../model/ModelEmpresa.php");
// require_once("../model/ModelContato.php");


class editarController {

    private $editar;
    private $id;
    private $nome;
    private $cpf;
    private $cnpj;
    private $telefone;
    private $email;
    private $contato_id;
    private $contato_nome;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $aux = null;
        $dados = $this->editar->getCompany($id);
        $contato = $this->editar->getCompanyContactItems($id);
    
        $dados = json_decode($dados);
        $contato = json_decode($contato);
        $idcontato = $contato->result[0]->CONTACT_ID;
        
        $contato = $this->editar->getContact($idcontato);
        $contato = json_decode($contato);

        $this->id = $dados->result->ID;
        $this->nome = $dados->result->TITLE;
        $this->cpf = $dados->result->UF_CRM_1581620881;
        $this->cnpj = $dados->result->UF_CRM_1581620903;
        $this->telefone = $dados->result->PHONE[0]->VALUE;
        $this->email = $dados->result->EMAIL[0]->VALUE;
        $this->contato_nome = $contato->result->NAME;
        $this->contato_id = $contato->result->ID;
    }
    public function editarFormulario($nome,$cpf,$cnpj,$telefone,$email,$id,$contato_id,$contato_nome){
        if($this->editar->updateCompany($nome,$cpf,$cnpj,$telefone,$email,$id) == TRUE){
            $this->editar->updateContact($contato_nome,$telefone,$email,$contato_id);
            echo "<script>alert('Registro editado com sucesso!');document.location='../view/listar.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function getid(){
        return $this->id;
    }
    public function getnome(){
        return $this->nome;
    }
    public function getcpf(){
        return $this->cpf;
    }
    public function getcnpj(){
        return $this->cnpj;
    }
    public function gettelefone(){
        return $this->telefone;
    }
    public function getemail(){
        return $this->email;
    }

    public function getcontatonome(){
        return $this->contato_nome;
    }

    public function getcontatoid(){
        return $this->contato_id;
    }

   
}


if($_GET) {
    $id = $_GET['id'];
}
if($_POST) {
    $id = $_POST['id'];
}

$editar = new editarController($id);

if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['empresa'],$_POST['cpf'],$_POST['cnpj'],$_POST['telefone'],$_POST['email'],$_POST['id'], $_POST['contato_id'],$_POST['nome']);
}
?>
