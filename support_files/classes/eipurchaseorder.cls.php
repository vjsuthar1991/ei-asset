<?php
class clspurchaseorder
{
	var $orderid;
	var $item;
	var $quantity;
	var $rate_per_item;
	var $amount;
	var $delivered_on;
	var $action;
	function clspurchaseorder()
	{
		$this->orderid = 0;
		$this->item = "";
		$this->quantity = 0;
		$this->rate_per_item = 0;
		$this->amount = 0;
		$this->delivered_on = 0;
		$this->action = "";
	}
	function setpostvars()
	{
		if($_POST["clspurchaseorder_orderid"]) $this->orderid = $_POST["clspurchaseorder_orderid"];
		if($_POST["clspurchaseorder_item"]) $this->item = $_POST["clspurchaseorder_item"];
		if($_POST["clspurchaseorder_quantity"]) $this->quantity = $_POST["clspurchaseorder_quantity"];
		if($_POST["clspurchaseorder_rate"]) $this->rate_per_item = $_POST["clspurchaseorder_rate"];
		if($_POST["clspurchaseorder_amount"]) $this->amount = $_POST["clspurchaseorder_amount"];
		if($_POST["clspurchaseorder_delivered_on"]) $this->delivered_on = $_POST["clspurchaseorder_delivered_on"];
		if($_POST["clspurchaseorder_hdnaction"]) $this->action = $_POST["clspurchaseorder_hdnaction"];
	}
	function setgetvars()
	{
		
	}
	function pageAddPurchaseOrder($bill_id,$name)
	{
		$this->setpostvars();
		if($this->action == 'savedata')
		{
			if($this->validation())	
			{
				$this->savedata($bill_id,$name,$orderid=0);
			}
		}
	}
	function savedata($bill_id,$name)
	{
			for($i = 0 ; $i <= count($this->item)-1;$i ++){
			if($this->orderid[$i] == 0 && $this->item[$i] != "")
			{
				$deleiveredDate = explode('-',$this->delivered_on[$i]);
				$deleiveredDt = $deleiveredDate[2]."-".$deleiveredDate[1]."-".$deleiveredDate[0];
				$query = "INSERT INTO  purchase_order (item,quantity,rate_per_item,amount,".
						 "delivered_on,bill_id,entered_by,entered_dt) VALUES(".	
						 "'".$this->item[$i]."','".$this->quantity[$i]."','".$this->rate_per_item[$i]."','".$this->amount[$i].
						 "','".$deleiveredDt."','".$bill_id."','".$name."',NOW())";
						 
				$result = mysql_query($query) or die(mysql_error());
				
			}
			else 
			{
				if($this->item[$i] != "")
				{
					$deleiveredDate = explode('-',$this->delivered_on[$i]);
					$deleiveredDt = $deleiveredDate[2]."-".$deleiveredDate[1]."-".$deleiveredDate[0];
					$query = "UPDATE purchase_order SET ".
						 "item = '".$this->item[$i]."',".
						 "quantity = '".$this->quantity[$i]."',".
						 "rate_per_item = '".$this->rate_per_item[$i]."',".
						 "amount = '".$this->amount[$i]."',".
						 "delivered_on = '".$deleiveredDt."',".
						 "modified_by = '".$name."',".
						 "modified_dt = NOW() WHERE orderid = '".$this->orderid[$i]."' ";
						 
					$result = mysql_query($query) or die(mysql_error());		 	
				}
				
			}
		}
	}
	function validation()
	{
		if(is_array($this->item) && count($this->item) == 0)
			$this->error["item"] = "Please enter the item for adding the in the bill";
		if(is_array($this->quantity)  && count($this->quantity) == 0)	
			$this->error["quantity"] = "Please enter the quantity of the item in the bill";
			
		if(is_array($this->error) && count($this->error) >0)
			return false;
		else 
			return true;
	}
	function getOrdersBybillId($billid)
	{
		$arrRet = array();
		$query = "SELECT * FROM purchase_order WHERE bill_id = '".$billid."' ";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$deliveredDt = explode('-',$row["delivered_on"]);
			$deliveredDate = $deliveredDt[2]."-".$deliveredDt[1]."-".$deliveredDt[0];
			$arrRet[$row["orderid"]] = array("orderid" => $row["orderid"],
											"item" => $row["item"],
											"quantity" => $row["quantity"],
											"rate_per_item" => $row["rate_per_item"],
											"amount"=>$row["amount"],
											"delivered_on" => $deliveredDate,
											"bill_id" => $row["bill_id"],
											"entered_by" => $row["entered_by"],
											"entered_dt" => $row["entered_dt"]
			);
		}
		return $arrRet;
	}
}
?>