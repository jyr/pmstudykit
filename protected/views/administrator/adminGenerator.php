<?php if(Yii::app()->user->hasFlash('enterCodes')): ?>

<div class="page-error centered">
	<!--<div class="error-symbol">
		<i class="fa-warning"></i>
	</div>-->
	<!-- <img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/> -->
	<?php 
	$message = Yii::app()->user->getFlash('enterCodes'); 
	if (strpos($message,'Error') !== false) {?>
	<h3 class="text-danger">
		<?php echo $message?>
	</h3>
	<a href='<?php echo Yii::app()->createAbsoluteUrl("Register/"); ?>'>
	<button class="btn btn-block btn-warning  btn-social btn-flat" ><i class="fa fa-arrow-left"></i><?= Constants::BACK_MESSAGE?></button></a>
	<?php }else{?>
		<h3 class="text-green"><?php echo $message?></h3>
		<div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Administrator/');?>" class="btn btn-block btn-success btn-social  btn-flat"><i class="fa fa-lock"></i>Regresar</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->
	<?php }?>

	<div class="info-links text-right">
		<!-- <a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a> -->
	</div>	
</div>

<?php else: ?>

<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'CodesGeneratorForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form fade-in-effect in',
			),
		)); ?>


        <h4 class="box-title">Ingresa los datos</h4>
          <div class="form-group has-feedback">
				<label for="exampleInputEmail1"><?php echo '¿Cuántos códigos deseas generar?<br/>' ?></label>
				<?php echo $form->textField($model,'numCodes',array('size'=>10,'maxlength'=>3,'value'=>'','placeholder'=>'###',"class"=>"form-control","data-mask"=>"decimal")); ?>
				<?php echo $form->error($model,'numCodes'); ?>
          </div>
          
          <div class="form-group has-feedback">
          		<label for="exampleInputEmail1"><?php echo '¿Cuál es la longitud de los códigos?<br/>' ?></label>
				<?php echo $form->textField($model,'lenCode',array('size'=>10,'maxlength'=>3,'value'=>'','placeholder'=>'###',"class"=>"form-control","data-mask"=>"decimal")); ?>
				<?php echo $form->error($model,'lenCode'); ?>
          </div>
          
           <div class="form-group has-feedback">
          		<label for="exampleInputEmail1"><?php echo 'Si son promocionales indica el número de dias disponibles.<br/>' ?></label>
				<?php echo $form->textField($model,'duration',array('size'=>10,'maxlength'=>3,'value'=>'','placeholder'=>'###',"class"=>"form-control","data-mask"=>"decimal")); ?>
				<?php echo $form->error($model,'duration'); ?>
          </div>
          
          
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-gears"></i>Generar códigos</button>
            </div><!-- /.col -->
          </div>
        

        <div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Administrator/');?>" class="btn btn-block btn-success btn-social  btn-flat"><i class="fa fa-lock"></i>Cancelar</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->


<?php $this->endWidget(); ?>

<?php endif; ?>

