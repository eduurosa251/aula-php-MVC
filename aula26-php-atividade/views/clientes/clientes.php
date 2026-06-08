<?php
require_once "../config/config.php"; //  puxa da pasta
include "cabecalho.php";


echo "<h3>Lista de Clientes</h3>";
echo "<a href='views/cadastro_cliente.php'>+ Adicionar Novo Cliente</a><br><br>";

$stmt = $pdo->query("SELECT * FROM clientes");
$clientes = $stmt->fetchAll();

if (empty($clientes)) {
    echo "<p>Nenhum cliente cadastrado.</p>";
} else {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Nome</th><th>CPF</th><th>E-mail</th><th>Endereço</th></tr>";
    foreach ($clientes as $c) {
        echo "<tr>";
        echo "<td>".$c['nome']."</td>";
        echo "<td>".$c['cpf']."</td>";
        echo "<td>".$c['email']."</td>";
        echo "<td>".$c['endereco']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

include "rodape.php";
?>