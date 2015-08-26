<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <!-- <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Oscar Busio</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>-->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">SECCIONES</li>
            
            
            <?php if(Yii::app()->session['isadmin']){?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i><span>Preferencias</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo Yii::app()->createAbsoluteUrl("Administrator/"); ?>">Usuarios</a></li>
                <li><a href="<?php echo Yii::app()->createAbsoluteUrl("Administrator/adminGenerator"); ?>">Generador de códigos</a></li>
				 </ul>
            </li>
            <?php }?>
            
            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i><span>INICIO</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=4.1"?>>	4.1	Desarrollar el acta del proyecto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=13.1"?>>	13.1 Identificar a los interesados	</a></li>
				 </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
              <i class="fa fa-calendar"></i>
                <span>PLANEACIÓN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=4.2"?>>	4.2	Desarrollar el plan de dirección del proyecto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=5.1"?>>	5.1	Planificar la Gestión del Alcance	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=5.2"?>>	5.2	Recopilar los requisitos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=5.3"?>>	5.3	Definir el Alcance	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=5.4"?>>	5.4	Crear la EDT/WBS	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=6.1"?>>	6.1	Planificar la Gestión del Cronograma	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=6.2"?>>	6.2	Definir las Actividades	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=6.3"?>>	6.3	Secuenciar las Actividades	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=6.4"?>>	6.4	Estimar los Recursos de las Actividades	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=6.5"?>>	6.5	Estimar la Duración de las Actividades	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=6.6"?>>	6.6	Desarrollar el Cronograma	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=7.1"?>>	7.1	Planificar la Gestión de los Costos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=7.2"?>>	7.2	Estimar los Costos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=7.3"?>>	7.3	Determinar el Presupuesto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=8.1"?>>	8.1	Planificar la Gestión de la Calidad	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=9.1"?>>	9.1	Planificar la Gestión de los Recursos Humanos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=10.1"?>>	10.1 Planificar la Gestión de las Comunicaciones	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=11.1"?>>	11.1 Planificar la Gestión de los Riesgos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=11.2"?>>	11.2 Identificar los Riesgos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=11.3"?>>	11.3 Realizar el Análisis Cualitativo de Riesgos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=11.4"?>>	11.4 Realizar el Análisis Cuantitativo de Riesgos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=11.5"?>>	11.5 Planificar la Respuesta a los Riesgos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=12.1"?>>	12.1 Planificar la Gestión de las Adquisiciones	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=13.2"?>>	13.2 Planificar la Gestión de los Interesados	</a></li>
			  </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>EJECUCIÓN</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=4.3"?>>	4.3	Dirigir y Gestionar el Trabajo del Proyecto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=8.2"?>>	8.2	Realizar el Aseguramiento de la Calidad	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=9.2"?>>	9.2	Adquirir el Equipo del Proyecto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=9.3"?>>	9.3	Desarrollar el Equipo del Proyecto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=9.4"?>>	9.4	Dirigir el Equipo del Proyecto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=10.2"?>>	10.2 Gestionar las Comunicaciones	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=13.3"?>>	13.3 Gestionar la Participación de los Interesados	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=12.2"?>>	12.2 Efectuar las Adquisiciones	</a></li>
			</ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i> <span>MONITOR Y CONTROL</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=4.4"?>>	4.4	Monitorear y Controlar el Trabajo del Proyecto	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=4.5"?>>	4.5	Realizar el Control Integrado de Cambios	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=5.5"?>>	5.5	Validar el Alcance	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=5.6"?>>	5.6	Controlar el Alcance	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=6.7"?>>	6.7	Controlar el Cronograma	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=7.4"?>>	7.4	Controlar los Costos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=8.3"?>>	8.3	Controlar la Calidad	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=10.3"?>>	10.3	Controlar las Comunicaciones	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=11.6"?>>	11.6	Controlar los Riesgos	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=12.3"?>>	12.3	Controlar las Adquisiciones	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=13.4"?>>	13.4	Controlar la Participación de los interesados	</a></li>
			</ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>CIERRE</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=4.6"?>>	4.6	Cerrar el Proyecto o Fase	</a></li>
				<li><a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Process&amp;chapterid=12.4"?>>	12.4	Cerrar las Adquisiciones	</a></li>
			</ul>
            </li>
            
            <li class="header">Otros recursos</li>
            <li>
              <a href=<?=Yii::app()->getBaseUrl()."/index.php?r=Site/bullets"?>>
                <i class="fa fa-th"></i> <span>Resumen (en)</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->