 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            5 Procesos de la Dirección de Proyectos
            <small>Version 1.0</small>
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
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="http://www.ricardo-vargas.com/playlists/details/8/" target="_blank">
                <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Podcasts</span>
                  <span class="info-box-number">Conceptos</span>
                  <span class="progress-description">
                    iniciales de la administración de proyectos.
                  </span>
                </div><!-- /.info-box-content -->
              </div>
              </a><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="http://edward-designer.com/web/pmp-certification-guide/" target="_blank">
                <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Artículos</span>
                  <span class="info-box-number">PMP</span>
                  <span class="progress-description">
                    Certification Study Guide (for PMBOK 5).
                  </span>
                </div><!-- /.info-box-content -->
              </div>
              </a><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="http://pmstudycircle.com/study-notes/" target="_blank">
                <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Artículos</span>
                  <span class="info-box-number">Certification</span>
                  <span class="progress-description">
                    Study Notes.
                  </span>
                </div><!-- /.info-box-content -->
              </div>
              </a><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="http://www.ricardo-vargas.com/pmbok5-processes-flow/" target="_blank">
                <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Videos</span>
                  <span class="info-box-number">PMBOK® </span>
                  <span class="progress-description">
                     5th Edition Processes Flow
                  </span>
                </div><!-- /.info-box-content -->
              </div>
              </a><!-- /.info-box -->
            </div><!-- /.col -->
          </div>
          
          <div class="row">
            <div class="col-md-12">
                <ul class="timeline">
                    <li class="time-label">
                        <span class="bg-gray">
                    Objetivo: Aplicar conocimientos, métodos, habilidades, herramientas, técnicas para administrar, evaluar riesgos y tomar decisiones con una actitud fuertemente orientada hacia resultados, objetivos claros, actividades programadas y trabajo en equipo de un proyecto en particular.</div>
                  </span>
                  </li>
                </ul>
                
            <div class="col-md-6">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">1.- INICIO</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre del proceso</th>
                      <!-- <th>Progress</th> -->
                      <th style="width: 40px">Área de conocimiento</th>
                    </tr>
                    <?php foreach($inititingProcess as $process){?>
                    <tr>
                      <td><?=$process->getChapterId()?></td>
                      <td><a href="<?php echo Yii::app()->createUrl("Process/",array("chapterid"=>$process->getChapterId()))?>"><?=$process->getName()?></a><h6><?=$process->getNameEn()?></h6><?php if($summary==1) echo $process->getSummary();?></td>
                      <!--  <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>-->
                      <td><span class="badge bg-<?=$process->getColor()?>"><?=$process->getAreaName()?></span></td>
                    </tr>
                    <?php }?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
              
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">2.- PLANEACIÓN</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre del proceso</th>
                      <!-- <th>Progress</th> -->
                      <th style="width: 40px">Área de conocimiento</th>
                    </tr>
                    <?php foreach($planningProcess as $process){?>
                    <tr>
                      <td><?=$process->getChapterId()?></td>
                      <td><a href="<?php echo Yii::app()->createUrl("Process/",array("chapterid"=>$process->getChapterId()))?>"><?=$process->getName()?></a><h6><?=$process->getNameEn()?></h6><?php if($summary==1) echo $process->getSummary();?></td>
                      <!--  <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>-->
                      <td><span class="badge bg-<?=$process->getColor()?>"><?=$process->getAreaName()?></span></td>
                    </tr>
                    <?php }?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
              

            </div>
            
            <div class="col-md-6">
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">3.- EJECUCIÓN</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre del proceso</th>
                      <!-- <th>Progress</th> -->
                      <th style="width: 40px">Área de conocimiento</th>
                    </tr>
                    <?php foreach($executingProcess as $process){?>
                    <tr>
                      <td><?=$process->getChapterId()?></td>
                      <td><a href="<?php echo Yii::app()->createUrl("Process/",array("chapterid"=>$process->getChapterId()))?>"><?=$process->getName()?></a><h6><?=$process->getNameEn()?></h6><?php if($summary==1) echo $process->getSummary();?></td>
                      <!--  <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>-->
                      <td><span class="badge bg-<?=$process->getColor()?>"><?=$process->getAreaName()?></span></td>
                    </tr>
                    <?php }?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">4.- MONITOREO Y CONTROL</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre del proceso</th>
                      <!-- <th>Progress</th> -->
                      <th style="width: 40px">Área de conocimiento</th>
                    </tr>
                    <?php foreach($monitoringProcess as $process){?>
                    <tr>
                      <td><?=$process->getChapterId()?></td>
                      <td><a href="<?php echo Yii::app()->createUrl("Process/",array("chapterid"=>$process->getChapterId()))?>"><?=$process->getName()?></a><h6><?=$process->getNameEn()?></h6><?php if($summary==1) echo $process->getSummary();?></td>
                      <!--  <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>-->
                      <td><span class="badge bg-<?=$process->getColor()?>"><?=$process->getAreaName()?></span></td>
                    </tr>
                    <?php }?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
              
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">5.- CIERRE</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre del proceso</th>
                      <!-- <th>Progress</th> -->
                      <th style="width: 40px">Área de conocimiento</th>
                    </tr>
                    <?php foreach($closeProcess as $process){?>
                    <tr>
                      <td><?=$process->getChapterId()?></td>
                      <td><a href="<?php echo Yii::app()->createUrl("Process/",array("chapterid"=>$process->getChapterId()))?>"><?=$process->getName()?></a><h6><?=$process->getNameEn()?></h6><?php if($summary==1) echo $process->getSummary();?></td>
                      <!--  <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>-->
                      <td><span class="badge bg-<?=$process->getColor()?>"><?=$process->getAreaName()?></span></td>
                    </tr>
                    <?php }?>
                  </tbody></table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div>
            
          </div><!-- /.row -->
          
        </section><!-- /.content -->