<?php
/**
 *
 * @author Oscar Gascon
 *
 */
class AdministratorController extends Controller{
	
	public function actionIndex(){
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
			$allCodesAsigned = self::allCodesAsigned();
			$codesAvailableForSale = self::getCodesAvailableForSaleOrPromotion(true);
			$codesAvailableForPromotion = self::getCodesAvailableForSaleOrPromotion(false);
		
			$this->render('responsiveTable',
					 	array("allCodesAsigned"=>$allCodesAsigned
						   ,"codesAvailableForSale"=>$codesAvailableForSale
							,"codesAvailableForPromotion"=>$codesAvailableForPromotion)
				     );
		}else{
			//Yii::log("Entro a login y fue false","warning");
			//Yii::app()->runController('Site/login');
			UtilsFunctions::destroySession();
		}	
	}
	
	private function allCodesAsigned(){
		$allCodesAsigned = array();
		$connection=Yii::app()->db;
		$sql = Querys::ALL_CODES;
		$command = $connection->createCommand($sql);
		$allCodesAsigned = $command->query();
		/*foreach($data as $row) {
			array_push($allCodesAsigned, $row);
		}*/
		$connection->active=false;
		return $allCodesAsigned;
	}
	
	private function getCodesAvailableForSaleOrPromotion($forSale){
		$codes = array();
		$connection=Yii::app()->db;
		$sql = $forSale == true ? Querys::GET_CODES_AVAILABLE_FOR_SALE : Querys::GET_CODES_AVAILABLE_FOR_PROMOTION;
		$command = $connection->createCommand($sql);
		$codes = $command->query();
		/*foreach($data as $row) {
		 array_push($allCodesAsigned, $row);
		}*/
		$connection->active=false;
		return $codes;
	}
	
	
	public function actionAdminGenerator(){
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin'] ){
			$this->layout = "tplLogin";
			$message ='';
			$model = new CodesGeneratorForm;
			try{
				if(isset($_POST['CodesGeneratorForm'])){
					$model->attributes=$_POST['CodesGeneratorForm'];
					if( $model->validate()){
						self::serverValidationCodesGeneratorForm($model);
						self::generator($model->numCodes,$model->lenCode,$model->duration);
						Yii::app()->user->setFlash('enterCodes',Constants::SUCCESS_GENERATION_CODES);
						$this->refresh();
					}
				}
			}catch (Exception $e) {
				Yii::app()->user->setFlash('enterCodes',$e->getMessage());
				$this->refresh();
			}
	
			$this->render('adminGenerator',array('model'=>$model,"errorSummary"=>$message));
	
		}else{
			UtilsFunctions::destroySession();
		}
	}
	
	/**
	 * 
	 * @param CodesGeneratorForm $model
	 * @throws Exception
	 */
	private function serverValidationCodesGeneratorForm($model){//Ya esta optimizado		
		//1.-Valida los campos del formulario
		if (         !!filter_var($model->numCodes, FILTER_VALIDATE_INT) === false
				||   !!filter_var($model->lenCode, FILTER_VALIDATE_INT) === false ){
			throw new Exception(Constants::ERROR_DATA_FORM);
		}
	}
	
	/**
	 * Esta funcion genera los codigos para vender y para usar como promocion por un numero determinado de dias
	 * Por defautl se generan 1 codigos de longitud 8 con duracion 1, lo que significa que nos de venta (duracion = 0 son de venta)
	 * @param number $numCodes
	 * @param number $lenCode
	 * @param number $duration
	 */
	public function generator($numCodes=1,$lenCode=8,$duration=1){
		/*Parametros para enviar por url*/
		/*$numCodes = 50;  $lenCode = 8; $duration = 3;*/
		$codes = array();
		for($index = 0; $index < $numCodes; $index++ ){
			$code = CodeGenerator::generatorCode($lenCode,$duration);
			if(strlen( $code) > 0 ){
				Yii::log("Se ha creado el codigo: $code");
				array_push($codes, $code);
			}else{
				Yii::log("Ocurrio un problema al generar un codigo");
			}
		}
		return $codes;
	}	

	
	
	
	//Editar usuarios
	public function actionEditUser($iduser){
		if( UsersDao::getInstance()->validToken() && Yii::app()->session['isadmin']){
			$this->layout = "tplLogin";
			$message ='';
			$model = new EditUserForm();
			try{
				$userData = UsersDao::getInstance()->getUserDataById($iduser);
				$model->email = $userData['email'];
				$model->idusers = $userData['idusers'];
				$model->codes_idcodes = $userData['codes_idcodes'];
				$model->name = $userData['name'];
				$model->lastname = $userData['lastname'];
				$model->password = $userData['password'];
				$model->activation_code = $userData['activation_code'];
				$model->account_active = $userData['account_active'];
				$model->activation_date = $userData['activation_date'];
				$model->authToken = $userData['authToken'];
				$model->change_password_code = $userData['change_password_code'];
				$model->lastlogin = $userData['lastlogin'];
				$model->createdon = $userData['createdon'];
				$model->isadmin	= $userData['isadmin'];
				$model->duration	= $userData['duration'];
				
				if(isset($_POST['EditUserForm'])){
					$model->attributes=$_POST['EditUserForm'];
					if( $model->validate()){
						UsersDao::getInstance()->updateUserData($model);
						Yii::app()->user->setFlash('enterCodes',Constants::SUCCESS_USER_DATA_UPDATE);
						$this->refresh();
					}
				}
			}catch (Exception $e) {
				Yii::app()->user->setFlash('enterCodes',$e->getMessage());
				$this->refresh();
			}
			
			$this->render('editUser',array('model'=>$model,"errorSummary"=>$message));
		}else{
			//Yii::log("Entro a login y fue false","warning");
			//Yii::app()->runController('Site/login');
			UtilsFunctions::destroySession();
		}
	}
		
}