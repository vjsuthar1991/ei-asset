<?php
class clstgquesttype
{
	var $code;
	var $instruction;
	
	function clstgquesttype()
	{
		$this->code = 0;
		$this->instruction = "";
	}
	function setpostvars()
	{
		
	}
	function getQuestionType($connid)
	{
		$arrRet = array();
		$query = "SELECT code,instruction,subjectlist FROM tg_questypemaster ";
		$dbquery = new dbquery($query,$connid);
		
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["code"]] = array("code"=>$row["code"],
										  "instruction"=>$row["instruction"],
										  "subjectlist"=>$row["subjectlist"]		
									);
		}
	
		return $arrRet;
	}
}

?>