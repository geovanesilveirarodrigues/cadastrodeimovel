<?php

include 'connection2.php';

session_start();
$sql = "SELECT usuario,senha,nome FROM usuario";
$resultado=$conn->query($sql);
$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
$conectado=FALSE;
$nome="";
foreach($tabela as $login){
    if($_POST['usuario']==$login['usuario'] &&  
        $_POST['senha']==$login['senha']){
            $conectado=TRUE;
            $nome=$login['nome'];
            break;
        }
}
 if($conectado==TRUE){
    $_SESSION['logado']=TRUE;
    $_SESSION['nome']=$nome;
    header('Location:index.html');
 }else{
    header('Location:senhausuario.html');
 }

?>