<?php


class Process {
	
	private $chapterId;
	private $name;
	private $nameEn;
	private $summary;
	private $content;
	private $mainImage;
	private $areaId;
	private $groupId;
	private $areaName;
	private $color;
	private $inputs;
	private $tools;
	private $outputs;

	

   
	/**
	 * @param int $p_id
	 * @param string $p_pagetitle
	 * @param string $p_alias
	 * @param string $p_introtext
	 * @param string $p_content
	 */
	public function Process($p_id,$p_name){
		$this->setChapterId($p_id);
		$this->setName($p_name);
	}
	
	
	public function setChapterId($chapterId){
		$this->chapterId = $chapterId;
	}
	
	public function getChapterId(){
		return $this->chapterId;
	}
	
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setNameEn($nameEn){
		$this->nameEn = $nameEn;
	}
	
	public function getNameEn(){
		return $this->nameEn;
	}	
	
	public function setSummary($summary){
		$this->summary = $summary;
	}
	
	public function getSummary(){
		return $this->summary;
	}
	
	public function setContent($content){
		$this->content = $content;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function setAreaName($areaName){
		$this->areaName = $areaName;
	}
	
	public function getAreaName(){
		return $this->areaName;
	}
	
	public function setColor($color){
		$this->color = $color;
	}
	
	public function getColor(){
		return $this->color;
	}
	
	public function setInputs($inputs){
		$this->inputs = $inputs;
	}
	
	public function getInputs(){
		return $this->inputs;
	}
	
	public function setTools($tools){
		$this->tools = $tools;
	}
	
	public function getTools(){
		return $this->tools;
	}
	
	public function setOutputs($outputs){
		$this->outputs = $outputs;
	}
	
	public function getOutputs(){
		return $this->outputs;
	}
}

?>