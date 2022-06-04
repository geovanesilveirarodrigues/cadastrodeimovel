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

        <legend>Cadastro de Imóvel</legend>
            <div>

         
        
        <br><input type ="text" placeholder="Cidade" name="cidade"><br>
       
        
             <br><input type ="text" placeholder="Bairro" name="bairro"><br>
              
             
             
            <br> <input type ="text" placeholder="Rua" name="rua"><br>
             
             <br><input type ="number" placeholder="Numero" name="numero"><br>
              
    
    
    
    
            
    <br>
             
            <br><input type ="text" placeholder="Complemento" name="complemento"><br>
            
             
             <br><input type ="text" placeholder="CEP" name="cep"><br>

             <form action="#" method="post">
		<br><select name="cpf_proprietario"><br>
        <option hidden>cpf/proprietario</option>
			<?php
				$sql="select cpf,nome from proprietario";
				$resultado=$conn->query($sql);
				$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach($tabela as $linha){
					echo "<option value='".	$linha['cpf']."'>".$linha['nome']."</option>";
				}
			?>
            </select> 


     </div>
     
        
        </fieldset><br> 
    
    
    <div>
        <br><input type="submit" value="Salvar Imovel" name="salvar"><br> 


    </div>
       
    </form>

    <?php

    if (isset($_POST['salvar'])){
   
  
    $cidade       =$_POST['cidade'];
    $bairro         =$_POST['bairro'];
    $rua     =$_POST['rua'];
    $numero =$_POST['numero'];
    $cpf_proprietario =$_POST['cpf_proprietario'];
    $cep              =$_POST['cep'];
    $complemento              =$_POST['complemento'];
    





    $sql="INSERT INTO imovel(cidade,bairro,rua,numero,cpf_proprietario,cep,complemento)
            VALUE(:cidade, :bairro, :rua,  :numero,  :cpf_proprietario,  :cep,  :complemento)";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':cidade',$cidade,PDO::PARAM_STR)      ;
    $stmt->bindParam(':bairro',$bairro,PDO::PARAM_STR);
    $stmt->bindParam(':rua',$rua,PDO::PARAM_STR);
    $stmt->bindParam(':numero',$numero,PDO::PARAM_INT);
    $stmt->bindParam(':cpf_proprietario',$cpf_proprietario,PDO::PARAM_STR);
    $stmt->bindParam(':cep',$cep,PDO::PARAM_STR);
    $stmt->bindParam(':complemento',$complemento,PDO::PARAM_STR);







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


   

   








        
        
        