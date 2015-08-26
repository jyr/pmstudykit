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
			'id'=>'EditUserForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form fade-in-effect in',
			),
		)); ?>


        <h4 class="box-title">Modifica los datos del usuario:</h4>
        <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Id de usuario' ?></label>
			<?php echo $form->textField($model,'idusers',array('maxlength'=>11,"class"=>"form-control",'disabled'=>true )); ?>
			<?php echo $form->error($model,'idusers'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Id de código asociado' ?></label>
			<?php echo $form->textField($model,'codes_idcodes',array('maxlength'=>11,"class"=>"form-control",'disabled'=>true )); ?>
			<?php echo $form->error($model,'codes_idcodes'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Correo electrónico <span class="required">*</span><br/>' ?></label>
			<?php echo $form->textField($model,'email',array('maxlength'=>50,'placeholder'=>'Ingresa el correo electrónico...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'email'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Nombre <span class="required">*</span><br/>'; ?></label>
			<?php echo $form->textField($model,'name',array('maxlength'=>44,'placeholder'=>'Ingresa el nombre...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'name'); ?>
          </div>
          
           <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Apellido <span class="required">*</span><br/>'; ?></label>
			<?php echo $form->textField($model,'lastname',array('maxlength'=>44,'placeholder'=>'Ingresa el apellido...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'lastname'); ?>
          </div>
          
           <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Contraseña <span class="required">*</span><br/>' ?></label>
			<?php echo $form->passwordField($model,'password',array('maxlength'=>50,'placeholder'=>'Ingresa la contraseña...',"class"=>"form-control", 'disabled'=>true )); ?>
			<?php echo $form->error($model,'password'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Código de activación' ?></label>
			<?php echo $form->textField($model,'activation_code',array('maxlength'=>100,"class"=>"form-control" )); ?>
			<?php echo $form->error($model,'activation_code'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Estado de la cuenta: (Activada=1, Desactivada=0)' ?></label>
			<?php echo $form->textField($model,'account_active',array('maxlength'=>1,"class"=>"form-control" )); ?>
			<?php echo $form->error($model,'account_active'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Fecha de activación' ?></label>
			<?php echo $form->textField($model,'activation_date',array('maxlength'=>20,"class"=>"form-control",'disabled'=>true)); ?>
			<?php echo $form->error($model,'activation_date'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Auth-Token' ?></label>
			<?php echo $form->textField($model,'authToken',array('maxlength'=>100,"class"=>"form-control")); ?>
			<?php echo $form->error($model,'authToken'); ?>
          </div>
          	
          	<div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Código de cambio de password' ?></label>
			<?php echo $form->textField($model,'change_password_code',array('maxlength'=>100,"class"=>"form-control" )); ?>
			<?php echo $form->error($model,'change_password_code'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Fecha de ultimo ingreso' ?></label>
			<?php echo $form->textField($model,'lastlogin',array('maxlength'=>20,"class"=>"form-control",'disabled'=>true)); ?>
			<?php echo $form->error($model,'lastlogin'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Fecha de creación del usuario' ?></label>
			<?php echo $form->textField($model,'createdon',array('maxlength'=>20,"class"=>"form-control",'disabled'=>true)); ?>
			<?php echo $form->error($model,'createdon'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo '¿Es administrador 1=SI 0 = No?' ?></label>
			<?php echo $form->textField($model,'isadmin',array('maxlength'=>1,"class"=>"form-control")); ?>
			<?php echo $form->error($model,'isadmin'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Días de promoción' ?></label>
			<?php echo $form->textField($model,'duration',array('maxlength'=>3,"class"=>"form-control")); ?>
			<?php echo $form->error($model,'duration'); ?>
          </div>

          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-gears"></i>Actualizar datos</button>
            </div><!-- /.col -->
          </div>
        

        <div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Administrator/');?>" class="btn btn-block btn-success btn-social  btn-flat"><i class="fa fa-lock"></i>Cancelar</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->


<?php $this->endWidget(); ?>

<?php endif; ?>

