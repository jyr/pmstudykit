<?php

class SiteController extends Controller
{

	public function actionIndex($summary=0){//*
		if( UsersDao::getInstance()->validToken() ){
			//$this->render('index');
			$this->getDataAndRender($summary);
		}else{
			Yii::app()->runController('Site/login');
		}
	}
	
	/**
	 * Obtiene los datos del home y los muestra
	 */
	private function getDataAndRender($summary=0){
		$inititingProcess = ProcessDao::getInstance()->getProccessByGroupId(Constants::INITIATING_PROCESSES_ID);
		$planningProcess = ProcessDao::getInstance()->getProccessByGroupId(Constants::PLANNING_PROCESSES_ID);
		$executingProcess = ProcessDao::getInstance()->getProccessByGroupId(Constants::EXECUTING_PROCESSES_ID);
		$monitoringProcess = ProcessDao::getInstance()->getProccessByGroupId(Constants::MONITORING_AND_CONTROL_PROCESSES_ID);
		$closeProcess = ProcessDao::getInstance()->getProccessByGroupId(Constants::CLOSE_PROCESSES_ID);
		$this->render('index',array("inititingProcess"=>$inititingProcess
				,"planningProcess"=>$planningProcess
				,"executingProcess"=>$executingProcess
				,"monitoringProcess"=>$monitoringProcess
				,"closeProcess"=>$closeProcess
				,"summary"=>$summary
		));
	}
	
	/**
	 * Muestra la pantalla de login y valida los datos ingresados.
	 */
	public function actionLogin(){//*
		$this->layout = "tplLogin";
	$message ='';
		$model = new EnterForm;
		try{
			if(isset($_POST['EnterForm'])){
				$model->attributes=$_POST['EnterForm'];
				if( $model->validate()  ){
					self::serverValidationEnterForm($model);
					$tokenAndId = UsersDao::getInstance()->validUserAndPasswordAndDuration($model);
					Yii::app()->session['email'] = $model->email;
					Yii::app()->session['id'] = $tokenAndId['id'];
					Yii::app()->session['token'] = $tokenAndId['token'];
					Yii::app()->session['isadmin'] = $tokenAndId['isadmin'];
					Yii::app()->session['name'] = $tokenAndId['name'];
					Yii::app()->session['lastname'] = $tokenAndId['lastname'];
					Yii::app()->session['duration'] = $tokenAndId['duration'];
					$this->redirect('index.php?r=site/index');
				}
			}
		}catch (Exception $e) {
			Yii::app()->user->setFlash('enter',$e->getMessage());
			$this->refresh();
		}
		$this->render('login',array('model'=>$model,"errorSummary"=>$message));
	}
	
	/**
	 * Realiza la validacion de los campos del formulario en el servidor.
	 * Genera una Exception en caso de que los datos no sean correctos.
	 * @param  $model
	 * @throws Exception
	 */
	private function serverValidationEnterForm($model){//*
		//1.-Valida los campos del formulario
		if (strlen(trim($model->email)) <= 0
				|| !UtilsFunctions::validEMail(trim($model->email))
				|| strlen(trim($model->password)) <= 0){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	/**
	 * Valida la información de cambio de password.
	 * Registra un codigo de cambio de password
	 */
	public function actionForgetPassword(){//*
		$this->layout = "tplLogin";
		$message ='';
		$model = new ForgetPasswordForm();
		try{
			if(isset($_POST['ForgetPasswordForm'])){
				$model->attributes=$_POST['ForgetPasswordForm'];
				if( $model->validate()  ){
					self::serverValidationForgetPasswordForm($model);
					$email = strtolower(trim($model->email));
					$changePasswordCode = UsersDao::getInstance()->updateChangePasswordCodeforValidUserActive($email);
					$ulrChangePassword = Constants::URL_CHANGE_PASSWORD_CODE.$changePasswordCode;
					$successMail = UtilsFunctions::sendMail(strtolower($email),Constants::SUBJECT_EMAIL_CHANGE_PASSWORD, Constants::HEAD_TEXT_CHANGE_PASSWORD, $ulrChangePassword ,Constants::FOOTER_TEXT);
					$message = $successMail ? Constants::SUCCESS_MAIL_DELIVERY : Constants::NOT_SUCCESS_MAIL_DELIVERY; ;
					Yii::app()->user->setFlash('enter',$message);
					$this->refresh();
				}
			}
		}catch (Exception $e) {
			Yii::app()->user->setFlash('enter',$e->getMessage());
			$this->refresh();
		}
		$this->render('forgetPassword',array('model'=>$model,"errorSummary"=>$message));
	}
	
	
	
	/**
	 * Realiza la validacion del correo electronico del formulario de olvidar contraseña en el servidor.
	 * Genera una Exception en caso de que los datos no sean correctos.
	 * @param  $model
	 * @throws Exception
	 */
	private function serverValidationForgetPasswordForm($model){//*
		//1.-Valida los campos del formulario
		if (strlen(trim($model->email)) <= 0 || !UtilsFunctions::validEMail(trim($model->email))){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	
	
	public function actionChangePassword($changePasswordCode){
		$this->layout = "tplLogin";
		$message ='';
		$model = new ChangePasswordForm();
		$idusers = 0;
		$aux = 0;
		try{
			$idusers = UsersDao::getInstance()->validChangeCodeInDataBase($changePasswordCode);
			if(isset($_POST['ChangePasswordForm'])){
				$model->attributes=$_POST['ChangePasswordForm'];
				if($model->validate()){
					self::serverValidationChangePasswordForm($model);
					UsersDao::getInstance()->updatePasswordForUser($model->password,$idusers);
					$this->redirect('index.php?r=site/login');
				}
			}
		}catch (Exception $e) {
			//Yii::log("Entre a la expetion: ".$e->getMessage(),"warning");
			Yii::app()->user->setFlash('enter',$e->getMessage());
			//$this->refresh();
		}
		$this->render('changePassword',array('model'=>$model,"errorSummary"=>$message));
	}
	
	
	/**
	 * Realiza la validacion del password del formulario de ingresar nueva contraseña en el servidor.
	 * Genera una Exception en caso de que los datos no sean correctos.
	 * @param unknown $model
	 * @throws Exception
	 */
	private function serverValidationChangePasswordForm($model){//*
		//1.-Valida los campos del formulario
		if (strlen(trim($model->password)) <= 0 ){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	
	/**
	 * Finaliza la sesion de los usuarios al hacer click en Cerrar sesion
	 */
	public function actionClose(){
		$sleep = Yii::app()->session['email'];
		$id = Yii::app()->session['id'];
		//Yii::log("actionProcess estoy en close: ".$sleep,"warning","oscarrrin");
		unset(Yii::app()->session['userid']); # Remove the session
		unset(Yii::app()->session['token']); # Remove the session
		Yii::app()->session->clear();
		Yii::app()->session->destroy();
		UsersDao::cleanAuthTokenForUserWithId($id);
		$this->redirect('index.php?r=site/login');
	}
	
	public function actionBullets(){
		$this->render('bullets',array());
	}
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}