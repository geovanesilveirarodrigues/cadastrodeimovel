<html>
<head>
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

        <legend>Corretor</legend>
            <div>


        
              
        <br><input type ="text" placeholder="Nome" name="nome"><br>

        <br><input type = "date" placeholder ="Data de Nascimento" name="dataNascimento"><br>

        <br><input type = "text" placeholder ="CPF" name="cpf"><br>
             
             
            
      
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
    include 'connection2.php';    
  
    $nome       =$_POST['nome'];
    $dataNascimento          =$_POST['dataNascimento'];
    $cpf     =$_POST['cpf'];


    $sql="INSERT INTO corretor(nome,dataNascimento,cpf)
            VALUE(:nome, :dataNascimento, :cpf)";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':nome',$nome,PDO::PARAM_STR)      ;
    $stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
    $stmt->bindParam(':cpf',$cpf,PDO::PARAM_STR);

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