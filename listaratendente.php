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

    <h1> Listar Atendente</h1>

    <table border = "1">

    <tr>
        <th>inquilino</th><th>corretor</th><th>Data de Atendimento</th>



</tr>

<?php
$sql = "SELECT cpf_inquilino,cpf_corretor,dataatendimento  FROM atendente";
$resultado= $conn->query($sql);
$tabela = $resultado -> fetchAll(PDO::FETCH_ASSOC);

foreach ($tabela as $linha){

    echo "<tr>";

    foreach ($linha as $coluna){
        echo "<td>" .$coluna. "</td>";
    }
    echo "</tr>";

}
?>

</table>
</div>
</body>
</html>
