
<?php if(Yii::app()->user->hasFlash('enter')): ?>

<div class="page-error centered">
	<!--<div class="error-symbol">
		<i class="fa-warning"></i>
	</div>-->
	<!-- <img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/> -->
	<h3 class="text-danger">
		<?php echo Yii::app()->user->getFlash('enter'); ?>
	</h3>
	<a href='<?php echo Yii::app()->createAbsoluteUrl("Site/login"); ?>'>
	<button class="btn btn-block btn-warning  btn-social btn-flat" ><i class="fa fa-arrow-left"></i><?= Constants::BACK_MESSAGE?></button></a>
	<div class="info-links text-right">
		<!-- <a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a> -->
	</div>	
</div>

<?php else: ?>

<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'EnterForm',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'login-form fade-in-effect in',
			),
		)); ?>

		  <h4 class="box-title">Ingresa tus datos para entrar</h4>
          <div class="form-group has-feedback ">
          	<label for="exampleInputEmail1"><?php echo 'Correo electrónico<br/>' ?></label>
			<?php echo $form->textField($model,'email',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu correo electrónico...',"class"=>"form-control")); ?>
			<?php echo $form->error($model,'email'); ?>
          </div>
          
          <div class="form-group has-feedback">
          		<label for="exampleInputEmail1"><?php echo 'Contraseña<br/>' ?></label>
				<?php echo $form->passwordField($model,'password',array('maxlength'=>50,'value'=>'','placeholder'=>'Ingresa tu contraseña...',"class"=>"form-control")); ?>
				<?php echo $form->error($model,'password'); ?>
          </div>
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" class="btn btn-block btn-success btn-social btn-flat"><i class="fa fa-lock"></i>Entrar</button>
            </div><!-- /.col -->
          </div>
        

        <div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Register/');?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-user"></i>Registrar código de invitación</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->

        <a href="<?php echo Yii::app()->createUrl('Site/forgetPassword');?>">¿Olvidaste tu contraseña?</a><br/>

<?php $this->endWidget(); ?>

<?php endif; ?>

