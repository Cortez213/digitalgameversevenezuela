<?php

class Conexion{
	private $conexion;
	private $stmt;
	private $close;

	static public function conectar(){

		$link = new PDO("mysql:host=127.0.0.1;dbname=sis_inventario",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}