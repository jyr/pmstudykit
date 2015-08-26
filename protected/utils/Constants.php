<?php
/**
 *
 * @author Oscar Gascon
 *
 */
class Constants{
	const PREFIX_PROMO_CODE = "pmstudykit_";
	const DOMINIO_NYCE = "http://www.pmstudykit.com/";
	const URL_REGISTER_CONFIRMATION_CODE = "http://pmstudykit.com/home/index.php?r=register/confirmation&activationCode=";
	const URL_CHANGE_PASSWORD_CODE = "http://pmstudykit.com/home/index.php?r=site/ChangePassword&changePasswordCode=";
	const URL_AVISO_PRIVACIDAD = "";
	const TAG_TITLE = "pm study kit";
	
	const DOMAIN = "http://www.pmstudykit.com/";
	const INITIATING_PROCESSES_ID = "1";
	const PLANNING_PROCESSES_ID = "2";
	const EXECUTING_PROCESSES_ID = "3";
	const MONITORING_AND_CONTROL_PROCESSES_ID = "4";
	const CLOSE_PROCESSES_ID = "5";
	
	

	
	//Email
	const ADMIN_EMAILS_FROM = "soporte@pmstudykit.com";
	const SUBJECT_EMAIL = "Confirmación de registro pmstudykit.com";
	const SUBJECT_EMAIL_CHANGE_PASSWORD = "Solicitud de cambio de contraseña pmstudykit.com";
	const HEAD_TEXT = "Para completar el registro al pmstudykit.com, por favor visite la siguiente URL.<br/><b>Nota</b>: Asegúrese de no agregar espacios adicionales:";
	const HEAD_TEXT_CHANGE_PASSWORD = "Para cambiar tu contraseña para pmstudykit.com, por favor visita la siguiente URL.<br/><b>Nota</b>: Asegúrese de no agregar espacios adicionales:";
	const FOOTER_TEXT = "<br/>Si tiene algún problema por favor póngase en contacto con un miembro de nuestro personal de apoyo soporte@pmstudykit.com.";
	
	
	//Mensajes para los campos de texto en los formularios
	const EMAIL_FIELD_EMPTY = 'Ingresa tu correo electrónico';
	const EMAIL_FIELD_WRONG_FORMAT = 'El formato del correo es incorrecto';
	const PASSWORD_FIELD_EMPTY= 'Ingresa tu contraseña';
	const PASSWORD_TOOSHORT = "La contraseña debe tener por lo menos 5 caracteres";
	const NAME_FIELD_EMPTY = 'Ingresa tu nombre';
	const LASTNAME_FIELD_EMPTY = 'Ingresa tu apellido';
	const CODE_FIELD_EMPTY = 'Ingresa tu código';
	
	
	
	//Mensajes para el usuario
	const BACK_MESSAGE = "Regresar y modificar la información.";
	const ERROR_DATA_FORM = "Error: Tus datos no son correctos.";
	const ERROR_NOT_FOUND_CODE = "Error: El código ingresado no es válido.";
	const ERROR_USER_DURATION = "Error: El tiempo para este usuario se ha terminado.";
	const SUCCESS_DATA_FORM = "Los datos son correctos, se ha enviado un correo electrónico para confirmación.";
	const ERROR_REGISTER_CODE = "Error: El código ingresado no es válido, favor de verificarlo.";
	const SUCCESS_USER_REGISTER = "Se ha registrado tu codigo correctamente.";
	const SUCCESS_MAIL_DELIVERY = " <br/>Se ha enviado un correo electrónico para confirmación.";
	const NOT_SUCCESS_MAIL_DELIVERY = " <br/>Pero ocurrio un error al enviar el correo electrónico para confirmación. Favor de contactar al administrador.";
	const ERROR_USER_REGISTER = "Error al registrar al nuevo usuario, contactar al administrador.";
	const USER_ALREDY_REGISTER = "Error: El correo electrónico ingresado ya ha sido registrado.";
	const ACCOUNT_ACTIVE = "Tu cuenta ha sido activada exitosamente.";
	const URL_NOT_VALID_ACCOUNT_ACTIVE = "Error: La url de activación no es válida.";
	const URL_NOT_VALID_CHANGE_PASSWORD = "Error: La url de proporcionada no es válida.";
	const ERROR_TOKEN = "Error: El token no es valido para la sesión.";
	
	const SUCCESS_GENERATION_CODES = "Los códigos se generaron exitosamente.";
	
	
	//Editar usuairos
	//Mensajes para los campos de administracion 
	const NAME_FIELD_EMPTY_ADMIN = 'Ingresa el nombre';
	const LASTNAME_FIELD_EMPTY_ADMIN = 'Ingresa el apellido';
	const ACTIVATE_CODE_FIELD_EMPTY_ADMIN = 'Ingresa el código de activación';
	
	const NOT_FOUND_USER = "Error: No se encontro usuario solicitado";
	const SUCCESS_USER_DATA_UPDATE = "Los datos se actualizaron correctamente";
}
?>
