<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-success card-outline">
            <!-- /.card-header -->
            <div class="card-header">
              <h3 class="card-title">Lista de Jogadores</h3>
            </div>
            <!-- card-body -->             
            <div class="card-body">
               <div class="row">
                  <div class="col">
                      <a href="/gusfoot/admin_jogador/0" class="btn btn-success">Nova</a>
                  </div>
              </div>
              <br>            
              <div class="table-responsive" >
                <table id="tbConsulta" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Time</th>
                    <th>Nome</th>
                    <th>Posição</th>
                    <th>Nascimento</th>
                    <th>Naturalidade</th>
                    <th>Overall</th>
                    <th width="35px">Ação</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach ($list as $time) {

                    echo '<tr>';
                    echo '<td>' . $time["nome_time"] . '</td>';
                    echo '<td>' . $time["nome"] . '</td>';
                    echo '<td>' . $time["id_posicao"] . '</td>';
                    echo '<td>' . $time["nascimento"] . '</td>';
                    echo '<td>' . $time["nome_pais"] . '</td>';
                    echo '<td>' . $time["forca"] . '</td>';
                    echo '<td align="center">';
                    echo '<a href="/gusfoot/admin_jogador/' . $time["id_jogador"] .  '" class="btn-sm btn-success fa fa-edit" class="confirmation" ></a>';
                    echo '</tr>';
                  }
                  ?>
                  </tbody>
                  </table>
                </div>
            </div>
            <!-- /.card-body -->

          </div>
        </div>
      </div>

    </section>
    <!-- Main content -->

  </div>
  <!-- Content Wrapper. Contains page content -->

</div>

<!-- page script -->