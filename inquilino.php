<html>
<head>
    <?php include 'connection2.php'; ?>
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

        <legend>Cadastro de Inquilinio</legend>
            <div>

        <br><input type ="text"placeholder="CPF"name="cpf"><br>
        <br><input type ="text" placeholder="Nome" name="nome"><br>
        <br><input type = "date" placeholder ="Data de Nascimento" name="dataNascimento"><br>
        <br><input type ="text"placeholder="salário"name="salario"><br>
             
    
             
             
        <form action="#" method="post">
		<br><select name="id"><br>
        <option hidden>cpf/imovel</option>
			<?php
				$sql="select id from imovel";
				$resultado=$conn->query($sql);
				$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach($tabela as $linha){
					echo "<option value='".$linha['id']."'>".$linha['id']."</option>";

                    
				}
			?>
            </select> 

    
    <br>
             
         


        
        
        </fieldset><br> 
    </div> 
    
    <div>
        <br><input type="submit" value="Salvar Fornecedor" name="salvar"><br> 
    </div>
       
    </form>
    <?php

    if (isset($_POST['salvar'])){
          
        $cpf        =$_POST['cpf'];
        $nome       =$_POST['nome'];
        $dataNascimento         =$_POST['dataNascimento'];
        $salario     =$_POST['salario'];
        

        $sql="INSERT INTO inquilino(cpf,nome,dataNascimento,salario)
                VALUE(:cpf, :nome,:dataNascimento,:salario)";
        $stmt=$conn->prepare($sql);

         $stmt->bindParam(':cpf',$cpf,PDO::PARAM_STR);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
        $stmt->bindParam(':salario',$salario,PDO::PARAM_STR);
        
       
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

   

