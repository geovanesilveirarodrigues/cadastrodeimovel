<html lang="en">
    <head>
        <?php include 'connection2.php';?>
            <meta charset="utf8">
            <title>cadastro de vender</title>
        <link rel="stylesheet"href="style.css">
            <meta http-equiv="X-UA-complatible"content="IE=edge">
            <meta name="viewport"content="width=device-width,initial-scale=1.0">
    </head>
     
    <body>
        <div class="conteiner">

    <h1> Listar Inquilino</h1>

	<table border=1>
<tr>
	<th>cpf</th><th>nome</th><th>DataNascimento</th><th>salario</th><th>id_imovel</th>
	<th>Alterar</th><th>Excluir</th>
</tr>
	<?php
		$sql="select cpf,nome,dataNascimento,salario,id_imovel from inquilino";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<tr>";
			foreach($linha as $coluna){
				echo "<td>".$coluna."</td>";
			}
			echo "<td>";
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cpf' value=".$linha['cpf'].">";
			echo "<input type='submit' name='alterar' value='Alterar'>";
			echo "</form>";
			echo "</td>";

			echo "<td>";
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cpf' value=".$linha['cpf'].">";
			echo "<input type='submit' name='excluir' value='Excluir'>";
			echo "</form>";
			echo "</td>";

			
			
		}
	
	?>	

</table>
<?php
	if(isset($_POST['alterar'])){
		$cpf=$_POST['cpf'];
		$sql="select cpf,nome,dataNascimento,salario,id_imovel 
			from inquilino where cpf='".$cpf."'";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<form action='#' method='post'>";
			echo "<br>nome:<input type='text' name='nome' value=".$linha['nome'].">";
			echo "<br>dataNascimento:<dataNascimento><input type='date' name='dataNascimento' value=".$linha['dataNascimento'].">";
			echo "<br>cpf:<input hidden type='text' name='cpf' value=".$linha['cpf'].">";
			echo "<br>salario:<input  type='text' name='salario' value=".$linha['salario'].">";
			echo "<br>id_imovel<input  type='text' name='id_imovel' value=".$linha['id_imovel'].">";
			
			

			echo "<input type='submit' name='confirmar' value='Confirmar'>";
			echo "</form>";
		}
		
		}
		
		
		if(isset($_POST['excluir'])){
			$cpf=$_POST['cpf'];
			$sql="delete from inquilino where cpf=:cpf";
			$stm=$conn->prepare($sql);
			$stm->bindParam(':cpf',$cpf);
			$resultado=$stm->execute();
			if(!$resultado){
				var_dump($stm->errorInfo());
			}else{
				header('Location:listarinquilino.php');
			}
	
		}
		if(isset($_POST['confirmar'])){
			$cpf=$_POST['cpf'];
			$nome=$_POST['nome'];
			$salario=$_POST['salario'];
			$dataNascimento=$_POST['dataNascimento'];
			$sql="update inquilino set nome=:nome,
			dataNascimento=:dataNascimento,salario=:salario,id_imovel=:id_imovel where cpf='".$cpf."'";
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
			$stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
			$stmt->bindParam(':salario',$salario,PDO::PARAM_STR);
			$stmt->bindParam(':id_imovel',$id_imovel,PDO::PARAM_STR);



			$resultado=$stmt->execute();
			if(!$resultado){
				var_dump($stmt->errorInfo());
			}else{
				header('Location:listarinquilino.php');
			}
		}
?>

	
</body>
</html>