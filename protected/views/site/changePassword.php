<?php if(Yii::app()->user->hasFlash('enter')): ?>

<div class="page-error centered">
	<!--<div class="error-symbol">
		<i class="fa-warning"></i>
	</div>-->
	<!-- <img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/> -->
	<?php 
	$message = Yii::app()->user->getFlash('enter'); 
	if (strpos($message,'Error') !== false) {?>
	<h3 class="text-danger">
		<?php echo $message?>
	</h3>
	<a href='<?php echo Yii::app()->createAbsoluteUrl("Site/forgetPassword"); ?>'>
	<button class="btn btn-block btn-warning   btn-flat" ><?= Constants::BACK_MESSAGE?></button></a>
	<?php }else{?>
		<h3 class="text-green"><?php echo $message?></h3>
	<?php }?>

	<div class="info-links text-right">
		<!-- <a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a> -->
	</div>	
</div>

<?php else: ?>

<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'ChangePasswordForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form fade-in-effect in',
			),
		)); ?>


          <h4 class="box-title">Ingresa tu nueva contraseña</h4>
          <div class="form-group has-feedback">
          	<label for="exampleInputEmail1"><?php echo 'Contraseña nueva<br/>' ?></label>
			<?php echo $form->passwordField($model,'password',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu nueva contraseña...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'password'); ?>
          </div>
                 
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-block btn-success  btn-flat">Restablecer mi contraseña</button>
            </div><!-- /.col -->
          </div>
        

        <div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Register/');?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-user"></i>Registrar código de invitación</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->


<?php $this->endWidget(); ?>

<?php endif; ?>

