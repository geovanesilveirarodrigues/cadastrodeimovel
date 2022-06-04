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

        <legend>Cadastro de Imóvel</legend>
            <div>

        <br><input type ="text"placeholder="CPF"name="cpf"><br>
        <br><input type ="text" placeholder="Nome" name="nome"><br>
        <br><input type = "date" placeholder ="Data de Nascimento" name="dataNascimento"><br>
        <br><input type ="text"placeholder="salário"name="salario"><br>
             
    
             
             
             <br><select name="id_imovel" required><br>
                <option hidden>ID/Imovel</option>
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
        $cpf        =$_POST['cpf'];
        $nome       =$_POST['nome'];
        $dataNascimento         =$_POST['dataNascimento'];
        $salario     =$_POST['salario'];
        $id_imovel    =$_POST['id_imovel'];

        $sql="INSERT INTO inquilinio(cpf,nome,dataNascimento,salario,id_imovel)
                VALUE(:cpf, :nome,:dataNascimento,:salario,:id_imovel)";
        $stmt=$conn->prepare($sql);

         $stmt->bindParam(':cpf',$cpf,PDO::PARAM_STR);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
        $stmt->bindParam(':salario',$salario,PDO::PARAM_STR);
        $stmt->bindParam(':id_imovel',$id_imovel,PDO::PARAM_INT);
       
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


   

