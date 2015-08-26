<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Descripción del proceso
            <small><?=$process->getNameEn()?></small>
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$process->getName()?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <?= $process->getContent()?>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div>
          <div class="row">
            <div class="col-md-4">
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Entradas (<?= count($process->getInputs()) ?>)</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php  foreach($process->getInputs() as $input){?>
                    <li class="item">
                      <div class="product-img">
                        <img src="<?=Yii::app()->request->baseUrl?><?="/icons/".$input['main_image_io']?>" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo Yii::app()->createUrl("Process/detailitem",array('type'=>'input','id'=>$input['idinput_output']))?>" class="product-title"><?=$input['name_io']?><h5><?=$input['name_io_en']?></h5>
                        <?php
                        if ( strlen(trim($input['url']))>0 ){
							?>
							</a><span class="label label-warning pull-right"><a target="_blank" href="<?=$input['url']?>">Descargar</a></span>
							
						<?php
						} else{
							echo "</a>";
						}
                        ?> 
                        <span class="product-description">
                          <?=$input['summary_io']?>
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
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Herramientas (<?= count($process->getTools())?>)</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php  foreach($process->getTools() as $tool){?>
                    <li class="item">
                      <div class="product-img">
                        <img src="<?=Yii::app()->request->baseUrl?><?="/icons/".$tool['main_image_tool']?>" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo Yii::app()->createUrl("Process/detailitem",array('type'=>'tool','id'=>$tool['idtool']))?>" class="product-title"><?=$tool['name_tool']?> </a><h5><?=$tool['name_tool_en']?></h5>
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
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Salidas (<?= count($process->getOutputs())?>)</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php  foreach($process->getOutputs() as $output){?>
                    <li class="item">
                      <div class="product-img">
                        <img src="<?=Yii::app()->request->baseUrl?><?="/icons/".$output['main_image_io']?>" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="<?php echo Yii::app()->createUrl("Process/detailitem",array('type'=>'output','id'=>$output['idinput_output']))?>" class="product-title"><?=$output['name_io']?> <h5><?=$output['name_io_en']?></h5>
                        <?php
                        if ( strlen(trim($output['url']))>0 ){
							?>
							</a><span class="label label-warning pull-right"><a target="_blank" href="<?=$output['url']?>">Descargar</a></span>
							
						<?php
						} else{
							echo "</a>";
						}
                        ?>
                        <span class="product-description">
                         <?=$output['summary_io']?>
                        </span>
                      </div>
                    </li><!-- /.item --> 
                    <?php }?>
                  </ul>
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