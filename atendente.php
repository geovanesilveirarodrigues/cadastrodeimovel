<html>
<head>
    <?php include 'connection2.php';?>
    <title>Cadastro de Atendente</title>
    <meta charset="UTF-8">
    <style>
        #imovel{
            float:left;
            height:320px;
            width:50%;
            background-color:#a8fced;
        }

        div{
            float:left;
            width:55%;
        }
    </style>
</head>
<body>
    <form method="post" action="#">
        <fieldset id="imovel">

        <legend>Cadastro de Atendente</legend>
            <div>


        
             
        <br><input type = "date" placeholder ="Data de Atendimento" name="dataatendimento"><br>

       
        <form action="#" method="post">
		<br><select name="cpf_inquilino" required><br>
        <option hidden>cpf/inquilino</option>
			<?php
				$sql="select cpf,nome from inquilino";
				$resultado=$conn->query($sql);
				$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach($tabela as $linha){
					echo "<option value='".	$linha['cpf']."'>".$linha['nome']."</option>";
				}
			?>
            </select> 

            <form action="#" method="post">
		<br><select name="cpf_corretor" required><br>
        <option hidden>cpf/corretor</option>
			<?php
				$sql="select cpf,nome from corretor";
				$resultado=$conn->query($sql);
				$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach($tabela as $linha){
					echo "<option value='".	$linha['cpf']."'>".$linha['nome']."</option>";
				}
			?>

            </slect>
            </form>
        
        
        </fieldset><br> 
    </div> 
    
    <div>
        <br><input type="submit" value="Salvar Fornecedor" name="salvar"><br> 
    </div>
       
    </form>
    <?php

if (isset($_POST['salvar'])){
    

$dataatendimento      =$_POST['dataatendimento'];
$cpf_corretor       =$_POST['cpf_corretor'];
$cpf_inquilino     =$_POST['cpf_inquilino'];







$sql="INSERT INTO atendente(dataatendimento,cpf_corretor,cpf_inquilino)
        VALUE(:dataatendimento,:cpf_corretor,:cpf_inquilino)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':dataatendimento',$dataatendimento,PDO::PARAM_STR) ;     ;
$stmt->bindParam(':cpf_corretor',$cpf_corretor,PDO::PARAM_STR);
$stmt->bindParam(':cpf_inquilino',$cpf_inquilino,PDO::PARAM_STR);





$resultado=$stmt->execute();
if(!$resultado){
    var_dump($stmt->errorInfo());
    exit;
}else{
    echo $stmt->rowCount()." linhas inseridas";
     }
}
?>



    </body>
</html>