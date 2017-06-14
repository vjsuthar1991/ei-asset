<?php

interface connectData{
	const host          = '192.168.0.7';
	const user          = 'root';
	const pass          = '';
	const dbname        = 'educatio_educat';
}

class dbconnect
{
	var $connid;
	var $insertid;
	var $numrows;

	function dbconnect($connlocation,$databasename='educatio_educat')
	{
		if($connlocation == 0)
		{
			//$host = "localhost";
			$host = "192.168.0.7";
			$user = "root";
			$pass = "";
			$database = $databasename;
			$this->connid =	mysql_connect($host,$user,$pass,true) or die("Can't Connect To MySQL Server");
			mysql_select_db($database,$this->connid);
		}
		elseif ($connlocation == 1)
		{
			$host = "192.168.0.7";
			$user = "root";
			$pass = "";
			$database = $databasename;
			$this->connid =	mysql_connect($host,$user,$pass,true) or die("Can't Connect To MySQL Server");
			mysql_select_db($database,$this->connid);
		}
		elseif ($connlocation == 2)
		{
			$host = "122.248.246.221";
			$user = "ms_analysis";
			$pass = "sl@vedb@e!";
			$database = $databasename;
			$this->connid =	mysql_connect($host,$user,$pass,true) or die("Can't Connect To MySQL Server");
			mysql_select_db($database,$this->connid);
		}
		elseif ($connlocation == 5)
		{
			$host = "192.168.0.40";
			$user = "root";
			$pass = "";
			$database = $databasename;
			$this->connid =	mysql_connect($host,$user,$pass,true) or die("Can't Connect To MySQL Server");
			mysql_select_db($database,$this->connid);
		}
		elseif($connlocation == 10)
		{
			//$host = "localhost";
			$host = "192.168.0.61";
			$user = "root";
			$pass = "";
			$database = $databasename;
			$this->connid =	mysql_connect($host,$user,$pass,true) or die("Can't Connect To MySQL Server");
			mysql_select_db($database,$this->connid);
		}
	}
}

class dbquery
{
    var $connid;
    var $sqlresult;
    function dbquery($sqlquery="",$connid="")
    {
        $this->connid = $connid;
        if ((!empty($sqlquery)) AND (!empty($connid)))
        {
            //echo $sqlquery;
            $this->sqlresult =  mysql_query($sqlquery,$connid) or die($sqlquery."<br><br>Mysql Error:From class".mysql_error());
            $this->insertid =   mysql_insert_id($connid);
            return $this->sqlresult;
        }
    }

    function executequery($query){
        try{
            $this->sqlresult = mysql_query($query,$this->connid);
            $this->insertid = mysql_insert_id($this->connid);
        }catch(Exception $e){
            error_log('Exception in executing mysql query '. mysql_error());
        }
        return $this;
    }


	function numrows()
	{
		Return mysql_num_rows($this->sqlresult);
	}

	function affectedrows()
	{
		Return	mysql_affected_rows();
	}

	function error()
	{
		if (mysql_errno()!= 0)
			Return TRUE;
		else
			Return FALSE;
	}
	function errortext()
	{
		Return mysql_errno();
	}
	function getrow()
	{
		Return mysql_fetch_row($this->sqlresult);
	}
	function getrowarray()
	{
		Return mysql_fetch_array($this->sqlresult);
	}
	function getrowassocarray()
	{
		Return mysql_fetch_assoc($this->sqlresult);
	}
	function setrow	($rowno)
	{
		Return mysql_data_seek($this->sqlresult,$rowno);
	}
}
?>
