<?php
require_once("../model/webhook.php");
class deleta {
    private $webhook;

    public function __construct($id){
        $this->webhook = new Banco();

        $contato = $this->webhook->getCompanyContactItems($id);
        $contato = json_decode($contato);
        $idcontato = $contato->result[0]->CONTACT_ID;

        $this->webhook->deleteContactCompany($idcontato,$id);
        $this->webhook->deleteCompanyContact($id,$idcontato);
        $this->webhook->deleteContact($idcontato);

        if($this->webhook->deleteCompany($id)== TRUE){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../view/listar.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');history.back()</script>";
        }
    }
}
new deleta($_GET['id']);
?>
