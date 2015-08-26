<div class="page-error centered">
	<!-- <img src="http://pmstudykit.com/kitsgdp/images/nyce_logo.png" alt="" width="170" /><br/> -->
	<?php
	if (strpos($message,'Error') !== false) {?>
		<h3  class="text-danger">
			<?php echo $message?>
		</h3>		
		<a href='<?php echo Yii::app()->createAbsoluteUrl("Register/"); ?>'></a>		
	<?php }else{?>
		<h3 class="text-green"><?php echo $message?></h3>
	<?php }?>
	<div class="social-auth-links text-center">
          <a href="<?php echo Yii::app()->createUrl('Site/login');?>" class="btn btn-block btn-success btn-social  btn-flat"><i class="fa fa-lock"></i>Entrar</a>
          <!--  <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>-->
        </div><!-- /.social-auth-links -->
	<div class="info-links text-right">
				<!-- <a  href="<?= Constants::URL_AVISO_PRIVACIDAD?>" target="_blank">Aviso de Privacidad</a> -->
		</div>
</div>
