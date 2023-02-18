<?php
class conexion{

    /*

    private $ip = "sql102.0hi.me";//tambien 127.0.0.1 al ser servidor local phpmyadmin
    private $bd = "0hi_32695437_bdmma";//nombre de la base de datos
    private $usuario = "0hi_32695437";
    private $contrasena = "mma2022";

    */
    private $ip = "localhost";
    private $bd = "proyecto";
    private $usuario = "root";
    private $contrasena = "";

    //metodo para conectar la base de datos
    protected function conecta(){
    	
    	$pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd."",$this->usuario,$this->contrasena); //la variable $pdo es una instancia de la clase PDO

    	$pdo->exec("set names utf8");
        return $pdo;
    }
}