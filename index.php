<?php

const FOLDER = 'aula3';

if(isset( $_GET['controller']) && isset($_GET['acao'])){

    $controller = $_GET['controller'];
    $metodo = $_GET["acao"];
    $controller .= "Controller";

    

    require_once $_SERVER["DOCUMENT_ROOT"] . '/' . FOLDER . '/controller/' . $controller . '.php';

    //require_once $_SERVER["DOCUMENT_ROOT"] . '/aula3/controller/ProfessorController.php;

    


    $objeto = new $controller();
    $objeto->$metodo();
    
}else{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/view/home.php';
    
}






































// http://localhost:8081/aula3/?classe=Estudante&acao=listar