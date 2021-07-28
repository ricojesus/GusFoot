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
              <h3 class="card-title">Consulta de Times</h3>
            </div>
            <!-- card-body -->             
            <div class="card-body">
               <div class="row">
                  <div class="col">
                      <a href="/gusfoot/time/0" class="btn btn-success">Nova</a>
                  </div>
              </div>
              <br>            
              <div class="table-responsive" >
                <table id="tbConsulta" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sigla</th>
                    <th>Nome</th>
                    <th>Pais</th>
                    <th width="35px">Ação</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach ($list as $time) {

                    echo '<tr>';
                    echo '<td>' . $time["sigla"] . '</td>';
                    echo '<td>' . $time["nome"] . '</td>';
                    echo '<td>' . $time["nome_pais"] . '</td>';
                    echo '<td align="center">';
                    echo '<a href="/gusfoot/admin_time/' . $time["id_time_base"] .  '" class="btn-sm btn-success fa fa-edit" class="confirmation" ></a>';
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