    <!DOCTYPE HTML>
    <html>
    <?php include("head.php") ?>

        <?php require_once("../controller/ControllerEditarEmpresa.php");?>
        <div class="container">
            <form method="post" action="../controller/ControllerEditarEmpresa.php" id="form" name="form" onsubmit="validar(document.form); return false;" class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first">Nome </label>
                            <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $editar->getcontatonome(); ?>" required autofocus>
                        </div>
                    </div>
                    <!--  col-md-6   -->
                    <div class="col-md-6">

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $editar->getTelefone(); ?>" required>
                    </div>
                    </div>
                <!--  col-md-6   -->
                </div>
                <!--  row   -->
                <div class="row">
                    <div class="col-md-6">

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control" type="text" id="email" name="email" value="<?php echo $editar->getEmail(); ?>" required>
                    </div>
                    </div>

                    <!--  col-md-6   -->
                    <div class="col-md-6">

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $editar->getCpf(); ?>" required>
                    </div>
                </div>
                <!--  col-md-6   -->
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="empresa">Nome da Empresa</label>
                            <input class="form-control" type="text" id="empresa" name="empresa" value="<?php echo $editar->getNome(); ?>" required>
                        </div>
                        </div>

                        <!--  col-md-6   -->
                        <div class="col-md-6">

                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input class="form-control" type="text" id="cnpj" name="cnpj" value="<?php echo $editar->getCnpj(); ?>" required>
                        </div>
                    </div>
                <!--  col-md-6   -->
                </div>
                <!--  row   -->
                <div class="form-group">
                <div class="row justify-content-center">
                    <input type="hidden" name="id" value="<?php echo $editar->getid();?>">
                    <input type="hidden" name="contato_id" value="<?php echo $editar->getcontatoid();?>">
                    <button type="submit" class="btn btn-success" id="editar" name="submit" value="editar">Editar</button>
                </div>
                </div>
            </form>
        </div>

        <?php require_once("footer.php");?>
