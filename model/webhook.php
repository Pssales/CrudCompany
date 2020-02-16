<?php

require_once("utils/UtilSession.php");

class Banco{

    public function setCompany($nome,$cpf,$cnpj,$telefone,$email){
            $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.add.json';
            $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => $nome,
                "UF_CRM_1581620881" => $cpf,
                "UF_CRM_1581620903" => $cnpj,
                "PHONE" => array(array("VALUE" => $telefone, "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $email, "VALUE_TYPE" => "WORK" )),
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
            ));

            $result = UtilSession::session($queryUrl,$queryData);
            if($result)
                return true;
    }

    public function setContact($nome,$telefone,$email){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.add.json';
        $queryData = http_build_query(array(
            'fields' => array(
                "NAME" => $nome,
                "PHONE" => array(array("VALUE" => $telefone, "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $email, "VALUE_TYPE" => "WORK" )),
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        if($result)
            return true;

    }

    public function setCompanyContact($id,$contact_id){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.contact.add.json';
        $queryData = http_build_query(array(
            'id' => $id,
            'fields' => array(
                "CONTACT_ID" => $contact_id,
            )
        ));

        $result = UtilSession::session($queryUrl,$queryData);
            if($result)
                return true;

    }

    public function setContactCompany($contact_id,$company_id){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.company.add.json';
        $queryData = http_build_query(array(
            'id' => $contact_id,
            'fields' => array(
                "COMPANY_ID" => $company_id,
            )
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        if($result)
            return true;

    }

    public function getCompanyContactItems($id){

        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.contact.items.get.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    }

    public function getContactCompanyItems($idEmpresa){

        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.company.items.get.json';
        $queryData = http_build_query(array(
            "ID" => $idEmpresa,
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    }

    public function getCompanyList(){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.list.json';
        $queryData = http_build_query(array(
                'order' => array("DATE_CREATE" => "ASC"),
                'select' => array("ID", "TITLE", "UF_CRM_1581620881" , "UF_CRM_1581620903", "PHONE", "EMAIL"),
            )
        ); 

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;
    }

    public function getContactList()
    {
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.list.json';
        $queryData = http_build_query(array(
            'order' => array("DATE_CREATE" => "ASC"),
            'select' => array("ID", "NAME","SECOND_NAME","LAST_NAME", "PHONE", "EMAIL"),
            )
        );

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;
    }

    public function getCompany($id){

        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.get.json';
        $queryData = http_build_query(array(
            "ID" => $id,
            'select' => array("ID", "NAME","SECOND_NAME","LAST_NAME", "PHONE", "EMAIL"),
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    }

    public function getCompanyFilter($cpf,$cnpj){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.list';
        $queryData = http_build_query(array(
            'filter' => array("UF_CRM_1581620881" => $cpf, "UF_CRM_1581620903" => $cnpj),
            'select' => array("ID", "TITLE", "UF_CRM_1581620881" , "UF_CRM_1581620903", "PHONE", "EMAIL")
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    }

    public function getContact($id){

        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.get.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    }

    public function getContactFilter($nome){

        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.list.json';
        $queryData = http_build_query(array(
            'filter' => array("NAME" => $nome),
            'select' => array("ID", "NAME", "PHONE", "EMAIL"),
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    } 

    public function deleteCompanyContact($id,$contact_id){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.contact.delete.json';
        $queryData = http_build_query(array(
            'id' => $id,
            'fields' => array(
                "CONTACT_ID" => $contact_id,
            )
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        if($result)
            return true;
    }

    public function deleteContactCompany($idContact,$oldIdCompany){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.company.delete.json';
        $queryData = http_build_query(array(
            'id' => $idContact,
            'fields' => array(
                "COMPANY_ID" => $oldIdCompany,
            )
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        if($result)
            return true;

    }

    public function deleteCompany($id){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    }

    public function deleteContact($id){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.delete.json';
        $queryData = http_build_query(array(
            "ID" => $id,
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        return $result;

    }

    public function updateCompany($nome,$cpf,$cnpj,$telefone,$email,$id){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.company.update.json';
        $queryData = http_build_query(array(
            'id' => $id,
            'fields' => array(
                "TITLE" => $nome,
                "UF_CRM_1581620881" => $cpf,
                "UF_CRM_1581620903" => $cnpj,
                "PHONE" => array(array("VALUE" => $telefone, "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $email, "VALUE_TYPE" => "WORK" )),
            )
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        if($result)
            return true;
    }

    public function updateContact($nome,$telefone,$email,$id){
        $queryUrl = 'https://b24-d73vdv.bitrix24.com.br/rest/1/4f4g9izaktsdmyye/crm.contact.update.json';
        $queryData = http_build_query(array(
            'id' => $id,
            'fields' => array(
                "NAME" => $nome,
                "PHONE" => array(array("VALUE" => $telefone, "VALUE_TYPE" => "WORK" )),
                "EMAIL" => array(array("VALUE" => $email, "VALUE_TYPE" => "WORK" )),
            )
        ));

        $result = UtilSession::session($queryUrl,$queryData);
        if($result)
            return true;
    }
}
?>
