<?php

class ProcessController extends Controller
{
	public function actionIndex($chapterid){
		if( UsersDao::getInstance()->validToken() ){
			$this->getDataAndRender($chapterid);
		}else{
			Yii::app()->runController('Site/login');
		}
	}
	
	public function getDataAndRender($chapterid){
		$process = ProcessDao::getInstance()->getProccessByChapterId($chapterid);
		if (count($process) == 0) {
			$this->render('404',array());	
		}else{
			$inputs = ProcessDao::getInstance()->getProcessInputsByChapterIdAndType($chapterid, 'input');
			$tools = ProcessDao::getInstance()->getProcessToolsByChapterId($chapterid);
			$outputs = ProcessDao::getInstance()->getProcessInputsByChapterIdAndType($chapterid, 'output');
			
			$process[0]->setInputs($inputs);
			$process[0]->setTools($tools);
			$process[0]->setOutputs($outputs);
			$this->render('process',array("process" => $process[0]));
		}		
	}

	
	public function actionDetailitem($type,$id)
	{
		if(  UsersDao::getInstance()->validToken() ){
			$this->getDataAndRenderDetail($type,$id);
		}else{
			Yii::app()->runController('Site/login');
		}
	}
	
	public function getDataAndRenderDetail($type,$id){
		$item = ProcessDao::getInstance()->getItem($type,$id);
		$processesUseItAsInput = array();
		$processGenerator = array();
		$tools = array();
		if(strcmp($type,"input") == 0 || strcmp($type,"output") == 0 ){
			$processesUseItAsInput = ProcessDao::getInstance()->getRelatedProcess($id,'input');
		}
		if(strcmp($type,"input") == 0 || strcmp($type,"output") == 0 ){
			$processGenerator = ProcessDao::getInstance()->getRelatedProcess($id,'output');
		}
		//$tools = ProcessDao::getInstance()->getProcessToolsByChapterId($chapterid);
		

		if (count($item) == 0) {
			$this->render('404',array());
		}else{
			$this->render('detailitem',array('itemDetail' => $item
											,'processesUseItAsInput' => $processesUseItAsInput
											,'processGenerator' => $processGenerator
											,'tools' =>$tools
						
						));
				
		}
	}
	
}