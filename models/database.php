<?php
class database{
	var $_dbh = '';
	var $_sql = '';
	var $_cursor = NULL;
	
	public function database(){
		try{
			$this->_dbh = new PDO('mysql:host=mysql.hostinger.vn; dbname=u419595173_test','u419595173_test','khoviyeu25251325');
        //    $this->_dbh = new PDO('mysql:host=localhost; dbname=ql_nhan_vien','root','');
			$this->_dbh->query('set names "utf8"');
		}
		catch(PDOException $ex)
		{
			die($ex->getMessage());
		}
	}
	public function setQuery($sql){
		$this->_sql = $sql;
	}
	//function execute the query
	public function execute($options=array()) {
		$this->_cursor = $this->_dbh->prepare($this->_sql);
		if($options){
			//if have $options then system will be tranmission parameters
			for($i=0;$i<count($options);$i++){
				$this->_cursor->bindParam($i+1,$options[$i]);
			}
		}
		$this->_cursor->execute();
		return $this->_cursor;
	}
	//function load datas on table
	public function loadAllRows($options=array()){
		if(!$options){
			if(!$result = $this->execute())
				return false;
		}
		else {
			if(!$result = $this->execute($options))
				return false;
		}
		return $result->fetchAll(PDO::FETCH_OBJ);
		
	}
	//function load load 1 data on the table
	public function loadRow($options=array()){
		if(!$options) {
			if(!$result = $this->execute())
				return false;
		}
		else {
			if(!$result = $this->execute($options))
				return false;
		}
		return $result->fetch(PDO::FETCH_OBJ);
		
	}
	// Function count the record on the table
	public function loadRecord($options=array()){
		if(!$options){
			if(!$result = $this->execute())
				return false;
		}
		else {
			if(!$result = $this->execute($options))
				return false;
		}
		return $result->fetch(PDO::FETCH_COLUMN);
		
	}
	public function getLastId(){
		return $this->_dbh->lastInsertId();
	}
	public function disconnect(){
		$this->_dbh = NULL;
	}
}
?>