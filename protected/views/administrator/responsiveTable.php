 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administración de códigos y usuarios
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active">5 Procesos de la Dirección de Proyectos</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          	
          	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Usuarios registrados con su código</h3>
                  <div class="box-tools">
                    <div class="input-group">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Nombre/Code</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>ültimo login</th>
                      <th>Registrado</th>
                      <th>Activación</th>
                      <th>Duración</th>
                      <th>Días</th>
                    </tr>
                    <?php 
									$activeCodes = 0;
									$inactiveCodes = 0;
									foreach($allCodesAsigned as $row) {
										$row['account_active'] == 1 ? $activeCodes+=1  : $inactiveCodes+=1;
										?>
										<tr>
											<td><a href="<?php echo Yii::app()->createAbsoluteUrl("Administrator/editUser&iduser=".$row['idusers']); ?>"><?= $row['name']?> <?= $row['lastname']?> (<?= $row['code']?>)</a></td>
											<td><?= $row['email']?></td>
											<td><?= $row['account_active'] == 1 ? "<span class='label label-success'>ACTIVO</span>" :"<span class='label label-warning'>DESACTIVADO</span>" ?></td>
											<td><?= $row['lastlogin']?></td>
											<td><?= $row['createdon']?></td>
											<td><?= $row['activation_date']?></td>
											<td><?= $row['duration'] == 0  ? $row['isadmin']== 1 ? 'ADMIN' : 'VENDIDO' : $row['duration'] ?></td>
											<td><?= $row['dias']?></td>
										</tr>	
									<?php } ?>	
                    
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
          
          
          
          <div class="row">
           
            <div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Códigos disponibles para venta</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody><tr>
                      <th style="width: 10px">id</th>
                      <th>Code</th>
                      <th>Creado</th>
                      <th style="width: 40px">Duración</th>
                    </tr>
                   <?php foreach($codesAvailableForSale as $row) {?>
								<tr>
									<td><?= $row['idcodes'] ?></td>
									<td><?= $row['code'] ?></td>
									<td><?= $row['createdon'] ?></td>
									<td><?= $row['duration'] ?></td> 
								</tr>
					<?php }?>	
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
            <div class="col-md-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Códigos disponibles para promoción</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody><tr>
                      <th style="width: 10px">id</th>
                      <th>Code</th>
                      <th>Creado</th>
                      <th style="width: 40px">Duración</th>
                    </tr>
                   <?php foreach($codesAvailableForPromotion as $row) {?>
								<tr>
									<td><?= $row['idcodes'] ?></td>
									<td><?= $row['code'] ?></td>
									<td><?= $row['createdon'] ?></td>
									<td><?= $row['duration'] ?></td> 
								</tr>
					<?php }?>	
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
            
          </div>
   		
 
          
        </section><!-- /.content -->