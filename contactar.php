<html>
<head>

<?php
    include 'connection2.php';  
?>
    <title>Cadastro de Fornecedor</title>
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

        <legend>Contactar</legend>
            <div>


        
         
        <br><input type = "date" placeholder ="Data de Contato" name="datacontato"><br>

  
    <br>

    <div>
    
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
            </select> 

            <form action="#" method="post">
		<br><select name="cpf_proprietario" required><br>
        <option hidden>cpf/proprietario</option>
			<?php
				$sql="select cpf,nome from proprietario";
				$resultado=$conn->query($sql);
				$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach($tabela as $linha){
					echo "<option value='".	$linha['cpf']."'>".$linha['nome']."</option>";
				}
			?>

            </slect>

            

         
             


        
        
        </fieldset><br> 
    </div> 
    
    <div>
        <br><input type="submit" value="Salvar Fornecedor" name="salvar"><br> 
    </div>
       
    </form>

    <?php

if (isset($_POST['salvar'])){
 
    $datacontato      =$_POST['datacontato'];
    $cpf_corretor       =$_POST['cpf_corretor'];
    $cpf_proprietario        =$_POST['cpf_proprietario'];
 

    $sql="INSERT INTO contactar(datacontato,cpf_corretor,cpf_proprietario)
            VALUE(:datacontato,:cpf_corretor,:cpf_proprietario)";
    $stmt=$conn->prepare($sql);

     $stmt->bindParam(':datacontato',$datacontato,PDO::PARAM_STR);
    $stmt->bindParam(':cpf_corretor',$cpf_corretor,PDO::PARAM_STR);
    $stmt->bindParam(':cpf_proprietario',$cpf_proprietario,PDO::PARAM_STR);
    
   
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