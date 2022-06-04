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

    <h1> Listar Imovel</h1>

	<table border=1>
	<tr>
	<th>cep</th><th>cidade</th><th>bairro</th><th>rua</th><th>numero</th><th>complemento</th><th>cpf_proprietario</th>
	<th>Alterar</th><th>Excluir</th>
</tr>
	<?php
		$sql="select cep,cidade,bairro,rua,numero,complemento,cpf_proprietario from imovel";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<tr>";
			foreach($linha as $coluna){
				echo "<td>".$coluna."</td>";
			}
			echo "<td>";
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cep' value=".$linha['cep'].">";
			echo "<input type='submit' name='alterar' value='Alterar'>";
			echo "</form>";
			echo "</td>";

			echo "<td>";
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cep' value=".$linha['cep'].">";
			echo "<input type='submit' name='excluir' value='Excluir'>";
			echo "</form>";
			echo "</td>";

			
			
		}
	
	?>	

</table>
<?php
	if(isset($_POST['alterar'])){
		$cep=$_POST['cep'];
		$sql="select cep,cidade,bairro,rua,numero,complemento,cpf_proprietario 
			from imovel where cep='".$cep."'";
		$resultado=$conn->query($sql);
		$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($tabela as $linha){
			echo "<form action='#' method='post'>";
			echo "<input hidden type='text' name='cep' value=".$linha['cep'].">";
			echo "<br>cidade:<input type='text' name='cidade' value=".$linha['cidade'].">";
			echo "<br>bairro:<input type='text' name='bairro' value=".$linha['bairro'].">";
			

			echo "<br>rua:<input  type='text' name='rua' value=".$linha['rua'].">";
			echo "<br>numero:<input  type='text' name='numero' value=".$linha['numero'].">";
			echo "<br>complemento:<input  type='text' name='complemento' value=".$linha['complemento'].">";
			echo "<br>cpf_proprietario:<input  type='text' name='cpf_proprietario' value=".$linha['cpf_proprietario'].">";
	

			echo "<input type='submit' name='confirmar' value='Confirmar'>";
			echo "</form>";
		}
		
		}
		
		
		if(isset($_POST['excluir'])){
			$cep=$_POST['cep'];
			$sql="delete from imovel where cep=:cep";
			$stm=$conn->prepare($sql);
			$stm->bindParam(':cep',$cep);
			$resultado=$stm->execute();
			if(!$resultado){
				var_dump($stm->errorInfo());
			}else{
				header('Location:listarimovel.php');
			}
	
		}
		if(isset($_POST['confirmar'])){
			$cep=$_POST['cep'];
			$cidade=$_POST['cidade'];
			$bairro=$_POST['bairro'];
			$rua=$_POST['rua'];
			$numero=$_POST['numero'];
			$complemento=$_POST['complemento'];
			$cpf_proprietario=$_POST['cpf_proprietario'];

			$sql="update imovel set cpf_proprietario=:cpf_proprietario,
			complemento=:complemento,numero=:numero,rua=:rua,cidade=:cidade,bairro=:bairro where cep='".$cep."'";
			$stmt=$conn->prepare($sql);
			$stmt->bindParam(':cidade',$cidade,PDO::PARAM_STR);
			$stmt->bindParam(':bairro',$bairro,PDO::PARAM_STR);
			$stmt->bindParam(':rua',$rua,PDO::PARAM_STR);
			$stmt->bindParam(':numero',$numero,PDO::PARAM_STR);
			$stmt->bindParam(':complemento',$complemento,PDO::PARAM_STR);
			$stmt->bindParam(':cpf_proprietario',$cpf_proprietario,PDO::PARAM_STR);

			$resultado=$stmt->execute();
			if(!$resultado){
				var_dump($stmt->errorInfo());
			}else{
				header('Location:listarimovel.php');
			}
		}
?>

	
</body>
</html>