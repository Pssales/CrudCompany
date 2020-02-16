<?php
require_once("../model/webhook.php");


class editarController {

    private $editar;
    private $id;
    private $nome;
    private $telefone;
    private $email;


    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $aux = null;
        $row = $this->editar->getContact($id);
        $jsrow = json_decode($row,true);
        if (is_array($jsrow)) {
            foreach ($jsrow as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $subkey => $subvalue) {
                        if (is_array($subvalue)) {
                            $aux = $value;
                        }
                    }
                }
            }
        }
        $auxPhone = $aux['PHONE'];
        $auxEmail = $aux['EMAIL'];
        $this->id         =$aux['ID'];
        $this->nome         =$aux['NAME'];
        $this->second_name        =$aux['SECOND_NAME'];
        $this->last_name   =$aux['LAST_NAME'];
        $this->telefone        =$auxPhone[0]['VALUE'];
        $this->email         =$auxEmail[0]['VALUE'];
    }
    public function editarFormulario($nome,$telefone,$email,$id){
        if($this->editar->updateContact($nome,$telefone,$email,$id) == TRUE){
            echo "<script>alert('Registro editado com sucesso!');document.location='../view/listarContato.php'</script>";
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
    public function getsecond_name(){
        return $this->second_name;
    }
    public function getlast_name(){
        return $this->last_name;
    }
    public function gettelefone(){
        return $this->telefone;
    }
    public function getemail(){
        return $this->email;
    }


}
if($_GET) {
    $id = $_GET['id'];
}
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['nome'],$_POST['telefone'],$_POST['email'],$_POST['id']);
}
?>
