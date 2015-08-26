<?php
/**
 * 
 * @author osjobu@gmail.com
 *
 */
class ProcessDao{
	/**
	 *
	 * @var ProcessDao
	 * 
	 */
	private static  $instance;
	
	public static function getInstance(){
		if (  !self::$instance instanceof self)
		{
			self::$instance = new self;
		}
		return self::$instance;
	}
 	
 	/**
 	 * 
 	 * @param unknown $groupId
 	 * @return Ambigous <multitype:, multitype:>
 	 */
 	public function getProccessByGroupId($groupId)
 	{
 		$processes = array();
 		$connection=Yii::app()->db;
 		try{
 			$sql = Querys::PROCESSES_BY_GROUPID;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			$command->bindValue(++$index,$groupId,PDO::PARAM_INT);
 			$dataReader = $command->query();
 			$processes = self::createProcessesFromDataReader($dataReader);
 		}catch (Exception $exception){
 			Yii::log("ERROR EN ProcessDao: $exception","warning","ProcessDao->getProccessByGroupId");
 		}
 			
 		$connection->active=false;
 		return $processes;
 	}
 	
 	/**
 	 * 
 	 * @param int $processId
 	 * @return Process
 	 */
 	public function getProccessByChapterId($chapterid)
 	{
 		$process = array();
 		$connection=Yii::app()->db;
 		try{
 			$sql = Querys::GET_PROCESS_INFO;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			$command->bindValue(++$index,$chapterid,PDO::PARAM_STR);
 			$dataReader = $command->query();
 			$process = self::createProcessesFromDataReader($dataReader);
 		}catch (Exception $exception){
 			Yii::log("ERROR EN ProcessDao: $exception","warning","ProcessDao->getProccessByChapterId");
 		}
 	
 		$connection->active=false;
 		return $process;
 	}
 	
 	/**
 	 * 
 	 * @param unknown $processId
 	 * @return array
 	 */
 	public function getProcessInputsByChapterIdAndType($chapterid,$inputsOrOuputs)
 	{
 		$inputs = array();
 		$connection=Yii::app()->db;
 		try{
 			$sql = Querys::PROCESS_INPUTS_Or_OUTPUTS;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			$command->bindValue(++$index,$chapterid,PDO::PARAM_STR);
 			$command->bindValue(++$index,$inputsOrOuputs,PDO::PARAM_STR);
 			$dataReader = $command->query();
 			$inputs = $dataReader;
 		}catch (Exception $exception){
 			Yii::log("ERROR EN ProcessDao: $exception","warning","ProcessDao->getInputsByChapterId");
 		}
 		$connection->active=false;
 		return $inputs;
 	}
 	
 	/**
 	 *
 	 * @param unknown $processId
 	 * @return array
 	 */
 	public function getProcessToolsByChapterId($chapterid)
 	{
 		$tools = array();
 		$connection=Yii::app()->db;
 		try{
 			$sql = Querys::PROCESS_TOOLS;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			$command->bindValue(++$index,$chapterid,PDO::PARAM_STR);
 			$dataReader = $command->query();
 			$tools = $dataReader;
 		}catch (Exception $exception){
 			Yii::log("ERROR EN ProcessDao: $exception","warning","ProcessDao->getProcessToolsByChapterId");
 		}
 		$connection->active=false;
 		return $tools;
 	}
 	
 	
 	
 	
public function getItem($type,$id)
 	{
 		$details = array();
 		$connection=Yii::app()->db;
 		try{
 			$sql = strcmp($type,"input") == 0 || strcmp($type,"output") == 0 ? Querys::GET_ITEM_DETAIL_io : Querys::GET_ITEM_DETAIL_tool;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			
 			if(strcmp($type,"tool") != 0){
 				$command->bindValue(++$index,$type,PDO::PARAM_STR);
 				$command->bindValue(++$index,$id,PDO::PARAM_INT);
 			}else{
 				$command->bindValue(++$index,$id,PDO::PARAM_INT);
 			}
 			$dataReader = $command->query();
 			foreach($dataReader as $row) {
 				$details['name'] = strcmp($type,"input") == 0 || strcmp($type,"output") == 0 ? $row['name_io'] : $row['name_tool'];
				$details['name_io_en'] = strcmp($type,"input") == 0 || strcmp($type,"output") == 0 ? $row['name_io_en'] : $row['name_tool_en'];
 				$details['content'] = strcmp($type,"input") == 0 || strcmp($type,"output") == 0 ? $row['content'] :  $row['content_tool'] ;
 			}
 		}catch (Exception $exception){
 			Yii::log("ERROR EN ProcessDao: $exception","warning","ProcessDao->getItemDetail");
 		}
 			
 		$connection->active=false;
 		
 		return $details;
 	}
 	
 	public function getRelatedProcess($id,$inputOrOutput){
 		$process = array();
 		$connection=Yii::app()->db;
 		try{
 			$sql = Querys::GET_RELATED_PROCESS_FROM_INPUT_OR_OUTPUT;
 			$command = $connection->createCommand($sql);
 			$index = 0;
 			$command->bindValue(++$index,$id,PDO::PARAM_INT);
 			$command->bindValue(++$index,$inputOrOutput,PDO::PARAM_STR);
 			$dataReader = $command->query();
 			$process = self::createProcessesFromDataReader($dataReader);
 		}catch (Exception $exception){
 			Yii::log("ERROR EN ProcessDao: $exception","warning","ProcessDao->getRelatedProcessAsInput");
 		}
 		
 		$connection->active=false;
 		return $process;
 	}
 	
 	/**
 	 * Regresa un array de de notas apartir de un dataReader
 	 * @param DataReader $dataReader
 	 * @return multitype:
 	 */
 	private function createProcessesFromDataReader( $dataReader ){
 		$documents = array();
 		foreach($dataReader as $row) {
 			$process = new Process($row['chapterid'], $row['name']);
 			$process->setColor($row['color']);
 			$process->setAreaName($row['name_area']);
 			$process->setSummary($row['summary']);
 			$process->setContent($row['content']);
			$process->setNameEn($row['name_en']);
 			array_push($documents, $process);
 		}
 		return $documents;
 	}
 	

 	/*private function createInputsFromDataReader( $dataReader ){
 		$documents = array();
 		foreach($dataReader as $row) {
 			$process = new Process($row['chapterid'], $row['name']);
 			$process->setColor($row['color']);
 			$process->setAreaName($row['name_area']);
 			array_push($documents, $process);
 		}
 		return $documents;
 	}*/
 	
}


