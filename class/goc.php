<?php
require_once "config.php";
// require_once ("config.php"); --index public
// require_once ("../config.php"); --index admin
// file goc.php sẽ thay đổi vị trí liên kết đến file config.php dựa theo vị trí file index.php hiện hành
// do đó muốn tất cả file index.php sử dụng đc thì nên dùng
// $_SERVER['DOCUMENT_ROOT'] trỏ từ file root đến file config.php

class goc {
	protected $db;
	function __construct(){
	   $this->db = new mysqli (DBHOST, DBUSER, DBPASS, DBNAME);
	   $this->db->set_charset("utf8"); 
	} 
	//các method
	
} //class goc
