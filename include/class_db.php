<?php
class Db {
	
	var $link;
	
	__construct($user=false,$pass=false,$host=false,$db=false) {
		global $config;
		if(!$user) $user = $config['db_user'];
		if(!$pass) $pass = $config['db_pass'];
		if(!$host) $host = $config['db_host'];
		if(!$db) $db = $config['db_db'];
		
		$this->link = mysql_connect($host, $user, $pass);
		if (!$this->link) {
			throw(new Exception('Not connected : ' . mysql_error());
		}
		
		if (!mysql_select_db($db, $this->link)) {
			throw(new Exception('Can\'t use foo : ' . mysql_error());
		}
	}
	
	query_read($query) {
		
	}
	
	query_write() {
		
	}
	
	query_first() {
		
	}
	
	fetch_assoc() {
		
	}
	
	addto($data, $table, $where=array()) {
		$qry_set = array();
		foreach($data AS $col => $val) {
			$qry_set[] = "$col='$val'";
		}
		$qry_where = array();
		foreach($where AS $col => $val) {
			$qry_where[] = "$col='$val'";
		}
		if(count($qry_set) == 0) {
			return false;
		}
		
		if(count($qry_where)>0) {
			$query = "UPDATE $table SET ".implode(',',$qry_set)." WHERE ".implode(',',$qry_where).";";
		} else {
			$query = "INSERT INTO $table SET ".implode(',',$qry_set).";";
		}
		return $this->query_write($query);
	}
	
	searchfor($data, $table) {
		
	}
	
}


?>