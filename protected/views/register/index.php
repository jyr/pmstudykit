<?php if(Yii::app()->user->hasFlash('registerCode')): ?>

<div class="page-error centered">
	<!--<div class="error-symbol">
		<i class="fa-warning"></i>
	</div>-->
	<!-- <img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/> -->
	<?php 
	$message = Yii::app()->user->getFlash('registerCode'); 
	if (strpos($message,'Error') !== false) {?>
	<h3 class="text-danger">
		<?php echo $message?>
	</h3>
	<a href='<?php echo Yii::app()->createAbsoluteUrl("Register/"); ?>'>
	<button class="btn btn-block btn-warning  btn-social btn-flat" ><i class="fa fa-arrow-left"></i><?= Constants::BACK_MESSAGE?></button></a>
	<?php }else{?>
		<h3 class="text-green"><?php echo $message?></h3>
		<div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Site/login');?>" class="btn btn-block btn-success btn-social  btn-flat"><i class="fa fa-lock"></i>Ingresar</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->
	<?php }?>

	<div class="info-links text-right">
		<!-- <a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a> -->
	</div>	
</div>

<?php else: ?>

<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'RegisterCodeForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form fade-in-effect in',
			),
		)); ?>


        <h4 class="box-title">Registra tus datos</h4>
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Nombre <span class="required">*</span><br/>'; ?></label>
			<?php echo $form->textField($model,'name',array('maxlength'=>44,'value'=>'','placeholder'=>'Ingresa tu nombre...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'name'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Apellido <span class="required">*</span><br/>'; ?></label>
			<?php echo $form->textField($model,'lastname',array('maxlength'=>44,'value'=>'','placeholder'=>'Ingresa tu apellido...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'lastname'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Código proporcionado <span class="required">*</span><br/>'; ?></label>
			<?php echo $form->textField($model,'code',array('maxlength'=>12,'value'=>'','placeholder'=>'Ingresa tu código...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'code'); ?>
          </div>
          
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Correo electrónico <span class="required">*</span><br/>' ?></label>
			<?php echo $form->textField($model,'email',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu correo electrónico...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'email'); ?>
          </div>
          
           <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Contraseña <span class="required">*</span><br/>' ?></label>
			<?php echo $form->passwordField($model,'password',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu contraseña...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'password'); ?>
          </div>
          
          
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-user"></i>Registrar mis datos</button>
            </div><!-- /.col -->
          </div>
        

        <div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Site/login');?>" class="btn btn-block btn-success btn-social  btn-flat"><i class="fa fa-lock"></i>Cancelar</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->


<?php $this->endWidget(); ?>

<?php endif; ?>

