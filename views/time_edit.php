
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <!-- Main content -->
        <section class="content">
            <?php if (!empty($mensagem)) {
            echo '<div class="alert alert-' . $mensagem["TYPE"] . ' alert-dismissible">';
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $mensagem["MESSAGE"]; ?>
    </div>
    <?php } ?>

    <br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card card-success card-outline">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Edição de Times</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form data-toggle="validator" role="form" class="needs-validation" name="formRoutes" novalidate method="POST" action="/gusfoot/admin_time">
                        <input type="hidden" name="txtId" value="<?php echo $time->id; ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txtSigla">Sigla</label>
                                        <input type="text" maxlength="6" class="form-control" id="txtSigla" name="txtSigla" data-error="Campo Obrigatório" required value="<?php echo $time->sigla; ?>" >
                                        <div class="help-block with-errors" style="color: red"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txtNome">Nome</label>
                                        <input type="text" maxlength="6" class="form-control" id="txtNome" name="txtNome" data-error="Campo Obrigatório" required value="<?php echo $time->nome; ?>" >
                                        <div class="help-block with-errors" style="color: red"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btnGravar" class="btn btn-sm btn-success">Gravar</button>
                                <a href="/gusfoot/admin_times" class="btn btn-outline-secondary btn-sm">Voltar</a>
                            </div>
                    </form>
                </div>
                <!-- /.Form end -->
            </div>
        </div>
</div>
</section>
<!-- Main content -->
</div>
<!-- Content Wrapper. Contains page content -->
</div>

