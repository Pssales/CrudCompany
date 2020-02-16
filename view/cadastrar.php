<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

    <div class="container">

        <form method="post" action="../controller/ControllerCadastroEmpresa.php" id="form" name="form" onsubmit="validar(document.form); return false;" class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" id="nome" name="nome" placeholder="Informe o nome" required autofocus>
                    </div>
                </div>
                <!--  col-md-6   -->
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input class="form-control" type="text" id="telefone" name="telefone" placeholder="Informe o Telefone" required>
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>
            <!--  row   -->
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control" type="text" id="email" name="email" placeholder=" Informe o Email" required>
                    </div>
                </div>

                <!--  col-md-6   -->
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input class="form-control" type="text" id="cpf" name="cpf" placeholder="Informe o CPF" required>
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="empresa">Nome da Empresa</label>
                        <input class="form-control" type="text" id="empresa" name="empresa" placeholder="Nome da empresa" required>
                    </div>
                </div>

                <!--  col-md-6   -->
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input class="form-control" type="text" id="cnpj" name="cnpj" placeholder="Informe o CNPJ" required>
                    </div>
                </div>
                <!--  col-md-6   -->
            </div>

            <!--  row   -->
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    
    </div>

<?php include("footer.php"); ?>
