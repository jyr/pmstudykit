<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Descripci&oacute;n
            <small><?=$itemDetail['name_io_en']?></small>
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="nasda"><i class="fa fa-dashboard"></i>Descripci&oacute;n</a></li>
            <li class="active"><?=$itemDetail['name']?></li>
          </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$itemDetail['name']?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
           <?=$itemDetail['content'] ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div>
          
          <div class="row">
         <div class="col-md-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Se utiliza como entrada en:</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre del proceso</th>
                      <!-- <th>Progress</th> -->
                      <th style="width: 40px">&Aacute;rea de conocimiento</th>
                    </tr>
                    <?php foreach($processesUseItAsInput as $process){?>
                    <tr>
                      <td><?=$process->getChapterId()?></td>
                      <td><a href="<?php echo Yii::app()->createUrl("Process/",array("chapterid"=>$process->getChapterId()))?>"><?=$process->getName()?></a><h5><?=$process->getNameEn()?></h5></td>
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
            
            <div class="col-md-4">
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Herramientas con las que se genera (Pendiente):</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php  foreach($tools as $tool){?>
                    <li class="item">
                      <div class="product-img">
                        <img src="http://placehold.it/50x50/d2d6de/ffffff" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo Yii::app()->createUrl("Process/detailitem",array('type'=>'tool','id'=>$tool['idtool'],"chapterid"=>$process->getChapterId()))?>" class="product-title"><?=$tool['name_tool']?> <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          <?=$tool['summary_tool']?>
                        </span>
                      </div>
                    </li><!-- /.item --> 
                    <?php }?>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            
              </div>
            
            <div class="col-md-4">
              <!-- PRODUCT LIST -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Es el resultado del proceso:</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre del proceso</th>
                      <!-- <th>Progress</th> -->
                      <th style="width: 40px">&Aacute;rea de conocimiento</th>
                    </tr>
                    <?php foreach($processGenerator as $process){?>
                    <tr>
                      <td><?=$process->getChapterId()?></td>
                      <td><a href="<?php echo Yii::app()->createUrl("Process/",array("chapterid"=>$process->getChapterId()))?>"><?=$process->getName()?></a><h5><?=$process->getNameEn()?></h5></td>
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
            
            </div><!-- /.col -->
          </div>
          
        
        <div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'pmstudykit';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
        
        </section><!-- /.content --> 