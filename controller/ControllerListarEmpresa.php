<?php include("../view/head.php") ?>
<div class="container">


<table width="80%" class="table table-bordered">
    <th width="5%">Nome</th>
    <th width="5%">CPF</th>
    <th width="5%">CNP</th>
    <th width="5%">Telefone</th>
    <th width="5%">Email</th>
    <th width="10%">Ações</th>

<?php
require_once("../model/webhook.php");
class ListarController{

    public function __construct()
    {
        $this->editar = new Banco();
        $this->getValues();
    }

    public function getValues(){
    $companies = json_decode($this->editar->getCompanyList(), true);

        if (is_array($companies)) {
            foreach ($companies as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $subkey => $subvalue) {
                        
                        if (is_array($subvalue)) {
                            $auxPhone = $subvalue['PHONE'];
                            $auxEmail = $subvalue['EMAIL'];
                            echo "<tr>";
                            echo "<td width=\"5%\">" . $subvalue["TITLE"] . "</td>";
                            echo "<td width=\"5%\">" . $subvalue["UF_CRM_1581620881"] . "</td>";
                            echo "<td width=\"5%\">" . $subvalue["UF_CRM_1581620903"] . "</td>";
                            echo "<td width=\"5%\">" . $auxPhone[0]['VALUE'] . "</td>";
                            echo "<td width=\"5%\">" . $auxEmail[0]['VALUE'] . "</td>";
                            echo "<td width=\"10%\"><a class=\"edit\" title=\"Edit\" data-toggle=\"tooltip\" href='editarEmpresa.php?id=" . $subvalue["ID"] . "'><i class=\"material-icons\">&#xE254;</i></a> <a class=\"delete\" title=\"Delete\" data-toggle=\"tooltip\" href='../controller/ControllerDeletarEmpresa.php?id=" . $subvalue["ID"] . "'><i class=\"material-icons\">&#xE872;</i></a></td>";
                            echo "</tr>";
                        }
                    }
                }
            }
        }
?>
</table>
</div>

<?php
}
}
$listas = new ListarController();
?>


