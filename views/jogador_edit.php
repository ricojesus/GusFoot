
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
                        <h3 class="card-title">Edição de Jogador</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form data-toggle="validator" role="form" class="needs-validation" name="formRoutes" novalidate method="POST" action="/gusfoot/admin_jogador">
                        <input type="hidden" name="txtId" value="<?php echo $jogador->id; ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txtNome">Nome</label>
                                        <input type="text" maxlength="50" class="form-control" id="txtNome" name="txtNome" data-error="Campo Obrigatório" required value="<?php echo $jogador->nome; ?>" >
                                        <div class="help-block with-errors" style="color: red"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txtForca">Força</label>
                                        <input type="number" class="form-control" id="txtForca" name="txtForca" value="<?php echo $jogador->forca; ?>" min="0" max="100" step="1"/>
                                    </div>
                                </div>
                            </div>        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="txtForca">Nascimento</label>
                                        <input type="number" class="form-control" id="txtNascimento" name="txtNascimento" value="<?php echo $jogador->nascimento; ?>" min="1977" max="2020" step="1"/>
                                    </div>
                                </div>
                            </div>        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Posição</label>
                                        <select class="form-control form-control-sm" name="cboPosicao">
                                            <?php
                                            foreach ($lstPosicao as $posicao) {
                                                $checked = ($posicao["id_posicao"] == $jogador->posicao->id)?"selected":"";
                                                echo '<option value="' . $posicao["id_posicao"]  .  '" ' . $checked .  '>' . $posicao["posicao"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Naturalidade</label>
                                        <select class="form-control form-control-sm" name="cboPais">
                                            <?php
                                            foreach ($lstPais as $pais) {
                                                $checked = ($pais["id_pais"] == $jogador->pais->id)?"selected":"";
                                                echo '<option value="' . $pais["id_pais"]  .  '" ' . $checked .  '>' . $pais["nome"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <select class="form-control form-control-sm" name="cboTime">
                                            <?php
                                            foreach ($lstTime as $time) {
                                                $checked = ($time["id_time_base"] == $jogador->time->id)?"selected":"";
                                                echo '<option value="' . $time["id_time_base"]  .  '" ' . $checked .  '>' . $time["nome"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>                                                  
                            <div class="card-footer">
                                <button type="submit" name="btnGravar" class="btn btn-sm btn-success">Gravar</button>
                                <a href="/gusfoot/admin_jogadores" class="btn btn-outline-secondary btn-sm">Voltar</a>
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

