<?php

/*
V5.11 5 May 2010   (c) 2000-2010 John Lim (jlim#natsoft.com). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.
  Set tabs to 8.
  
  MySQL code that supports transactions. For MySQL 3.23 or later.
  Code from James Poon <jpoon88@yahoo.com>
  
  Requires mysql client. Works on Windows and Unix.
*/

// security - hide paths
if (!defined('ADODB_DIR')) die();

include_once(ADODB_DIR."/drivers/adodb-mysql.inc.php");


class ADODB_mysqlt extends ADODB_mysql {
	var $databaseType = 'mysqlt';
	var $ansiOuter = true; // for Version 3.23.17 or later
	var $hasTransactions = true;
	var $autoRollback = true; // apparently mysql does not autorollback properly 
	
	function __construct() 
	{			
	global $ADODB_EXTENSION; if ($ADODB_EXTENSION) $this->rsPrefix .= 'ext_';
	}
	
	/* set transaction mode
	
	SET [GLOBAL | SESSION] TRANSACTION ISOLATION LEVEL
{ READ UNCOMMITTED | READ COMMITTED | REPEATABLE READ | SERIALIZABLE }

	*/
	function SetTransactionMode( $transaction_mode ) 
	{
		$this->_transmode  = $transaction_mode;
		if (empty($transaction_mode)) {
			$this->Execute('SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ');
			return;
		}
		if (!stristr($transaction_mode,'isolation')) $transaction_mode = 'ISOLATION LEVEL '.$transaction_mode;
		$this->Execute("SET SESSION TRANSACTION ".$transaction_mode);
	}
	
	function BeginTrans()
	{	  
		if ($this->transOff) return true;
		$this->transCnt += 1;
		$this->Execute('SET AUTOCOMMIT=0');
		$this->Execute('BEGIN');
		return true;
	}
	
	function CommitTrans($ok=true) 
	{
		if ($this->transOff) return true; 
		if (!$ok) return $this->RollbackTrans();
		
		if ($this->transCnt) $this->transCnt -= 1;
		$ok = $this->Execute('COMMIT');
		$this->Execute('SET AUTOCOMMIT=1');
		return $ok ? true : false;
	}
	
	function RollbackTrans()
	{
		if ($this->transOff) return true;
		if ($this->transCnt) $this->transCnt -= 1;
		$ok = $this->Execute('ROLLBACK');
		$this->Execute('SET AUTOCOMMIT=1');
		return $ok ? true : false;
	}
	
	function RowLock($tables,$where='',$col='1 as adodbignore') 
	{
		if ($this->transCnt==0) $this->BeginTrans();
		if ($where) $where = ' where '.$where;
		$rs = $this->Execute("select $col from $tables $where for update");
		return !empty($rs); 
	}
	
}

class ADORecordSet_mysqlt extends ADORecordSet_mysql{	
	var $databaseType = "mysqlt";
	
	function __construct($queryID,$mode=false) 
	{
		if ($mode === false) { 
			global $ADODB_FETCH_MODE;
			$mode = $ADODB_FETCH_MODE;
		}
		
		switch ($mode)
		{
		case ADODB_FETCH_NUM: $this->fetchMode = mysqli_NUM; break;
		case ADODB_FETCH_ASSOC:$this->fetchMode = MYSQLI_ASSOC; break;
		
		case ADODB_FETCH_DEFAULT:
		case ADODB_FETCH_BOTH:
		default: $this->fetchMode = mysqli_BOTH; break;
		}
	
		$this->adodbFetchMode = $mode;
		$this->ADORecordSet($queryID);	
	}
	
	function MoveNext()
	{
		if (@$this->fields = mysqli_fetch_array($this->_queryID,$this->fetchMode)) {
			$this->_currentRow += 1;
			return true;
		}
		if (!$this->EOF) {
			$this->_currentRow += 1;
			$this->EOF = true;
		}
		return false;
	}
}

class ADORecordSet_ext_mysqlt extends ADORecordSet_mysqlt {	

	function __construct($queryID,$mode=false) 
	{
		if ($mode === false) { 
			global $ADODB_FETCH_MODE;
			$mode = $ADODB_FETCH_MODE;
		}
		switch ($mode)
		{
		case ADODB_FETCH_NUM: $this->fetchMode = mysqli_NUM; break;
		case ADODB_FETCH_ASSOC:$this->fetchMode = MYSQLI_ASSOC; break;
		
		case ADODB_FETCH_DEFAULT:
		case ADODB_FETCH_BOTH:
		default: 
			$this->fetchMode = mysqli_BOTH; break;
		}
		$this->adodbFetchMode = $mode;
		$this->ADORecordSet($queryID);	
	}
	
	function MoveNext()
	{
		return adodb_movenext($this);
	}
}

?>