<?php
class Querys{
	
	const SEARCH_CODE = "SELECT * FROM  codes WHERE  code = ?";
	const SEARCH_CODE_IN_USERS = "SELECT * FROM  users WHERE  codes_idcodes = ?";
	const SEARCH_USER = "SELECT * FROM  users WHERE  email = ?";
	const SEARCH_USER_ACTIVATED = "SELECT * FROM  users WHERE  email = ? && account_active = 1";
	const INSERT_CODE = "INSERT INTO codes (code, createdon, duration) VALUES (:code, :created, :duration)";
	const INSERT_USER = "INSERT INTO users (codes_idcodes, email, name, lastname,password,activation_code, createdon) VALUES (:codeId, :email, :name, :lastname,:password, :activationCode, :createdon)";
	                    
	const VALID_ACTIVATION_CODE = "SELECT * FROM users where activation_code = ? && account_active = 0";
	const VALID_CHANGE_PASSWORD_CODE = "SELECT * FROM users where change_password_code = ? && account_active = 1";
	
	const SET_ACCOUNT_ACTIVATED = "UPDATE users set account_active = :account_active, activation_date = :activation_date where activation_code = :activation_code";
	
	const VALID_USER_AND_PASSWORD = "SELECT codes.*, users.*, DATEDIFF(now(),users.activation_date) as dias FROM codes, users 
		where 1=1
		and users.email = ?
		and users.password = ?
		and codes.idcodes = users.codes_idcodes
		and users.account_active = 1";
	
	const SEARCH_AUTHTOKEN = "SELECT * FROM users where authToken=? && account_active = 1";
	
	
	
	/*Querys para administracion*/
	/*Listado de todos los codigos asignados.*/
	const ALL_CODES = "SELECT codes.*, users.*, DATEDIFF(now(),users.activation_date) as dias FROM codes, users
						where codes.idcodes = users.codes_idcodes
						order by codes.duration";
	
	
	/*Listado de todos los codigos disponibles (no estan asigandos tdavia)*/
	const GET_CODES_AVAILABLE_FOR_SALE = "SELECT *  FROM   codes WHERE  idcodes NOT IN (SELECT codes_idcodes FROM users) and duration = 0";
	
	const GET_CODES_AVAILABLE_FOR_PROMOTION = "SELECT *  FROM   codes WHERE  idcodes NOT IN (SELECT codes_idcodes FROM users) and duration > 0";
	
	//Editar usuarios
	const GET_USER_BY_ID = "SELECT codes.*, users.* FROM codes, users
							 where codes.idcodes = users.codes_idcodes 
                        	and idusers = ?
							order by codes.duration";
	
	
	
	
	
	const PROCESSES_BY_GROUPID= "select processes.id, processes.content,  processes.summary, processes.chapterid,processes.name,processes.name_en, areas.name_area, areas.color from processes ,areas
								where groups_idgroup  = ?
								and areas.idarea = processes.areas_idarea order by id";
	
	
	const GET_PROCESS_INFO = "select * from processes ,areas, groups
								where processes.chapterid = ?
								and areas.`idarea` = processes.`areas_idarea`
								and groups.`idgroup` = processes.`groups_idgroup`";
	
	/*const PROCESS_INPUTS_Or_OUTPUTS_ELIMINAR = "select io.name_io,io.idinput_output as id_io, io.summary_io, resources.url from processes as a, processes_io as rel, `inputs_outputs` as io, resources,
	 inputs_outputs_has_resources as resources_io
	where rel.type = ?
	and a.chapterid = ?
	and a.chapterid = rel.processes_chapterid
	and io.idinput_output = rel.inputs_outputs_idinput_output order by name_io
	and io.idinput_output = resources_io.`inputs_outputs_id`
	and resources_io.`resources_id` = resources.`idresource`";*/
	
	/*Obtener las entradas/SALIDAS de un proceso por id del proceso y ya con sus respectivos documentos*/
	const PROCESS_INPUTS_Or_OUTPUTS = "SELECT *
	FROM processes AS A
	INNER JOIN processes_io AS B
	INNER JOIN inputs_outputs AS C ON A.`chapterid` = B.`processes_chapterid`
	AND A.`chapterid` =  ?
	AND B.type =  ?
	AND C.`idinput_output` = B.`inputs_outputs_idinput_output`
						LEFT JOIN inputs_outputs_has_resources AS D ON D.`inputs_outputs_id` =  `idinput_output`
						LEFT JOIN resources AS E ON D.`resources_id` = E.`idresource` ";
						/** OPcionalmente puedo filtrar por tipo de documento E.type = 'doc'
	
	
	/*const PROCESS_INPUTS_Or_OUTPUTS = "select io.name_io,io.idinput_output as id_io, io.summary_io  from processes as a, processes_io as rel, `inputs_outputs` as io
	where rel.type = ?
	and a.chapterid = ?
	and a.chapterid = rel.processes_chapterid
	and io.idinput_output = rel.inputs_outputs_idinput_output order by name_io";*/
	
	const PROCESS_TOOLS = "select name_tool,name_tool_en, idtool, summary_tool, main_image_tool from processes as a, processes_tools as rel, tools
	where 1=1
	and a.chapterid = ?
	and a.chapterid = rel.processes_chapterid
	and tools.idtool = rel.tools_idtool order by name_tool";
	
	
	const GET_ITEM_DETAIL_io = "select distinct(io.name_io),io.name_io_en,io.idinput_output as id_io, io.summary_io, io.content_io as content
								from processes_io as rel, `inputs_outputs` as io
								where rel.type = ?
								and io.idinput_output = rel.inputs_outputs_idinput_output and io.idinput_output = ?";
	
	
	const GET_ITEM_DETAIL_tool = "select * from tools where idtool = ?";
	
	
	
       /*Trae los procesos relacionados a una entrada, pasando como parametro un id de una entrada
        Si se pasa como parametro un id de una salida, se recuperan los procesos de los que la salida es entrada*/
	        const GET_RELATED_PROCESS_FROM_INPUT_OR_OUTPUT = "SELECT * FROM processes as A, processes_io as B, areas as C
	WHERE B.inputs_outputs_idinput_output = ?
	and B.processes_chapterid = A.chapterid
	and B.type = ?
	and A.areas_idarea = C.`idarea` order by id";
	
}
?>