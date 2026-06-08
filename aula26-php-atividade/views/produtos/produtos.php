<?php
require_once "../config/config.php"; //  puxa da pasta
include "cabecalho.php";


echo "<h3>Lista de Produtos</h3>";
echo "<a href='cadastro_produto.php'>+ Adicionar Novo Produto</a><br><br>";

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll();

if (empty($produtos)) {
    echo "<p>Nenhum produto cadastrado.</p>";
} else {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Imagem</th><th>Produto</th><th>Descrição</th><th>Preço</th><th>Estoque</th></tr>";
    foreach ($produtos as $p) {
        // Se não tiver imagem, usa uma padrão da internet pra não quebrar o layout
        $foto = !empty($p['imagem']) ? 'uploads/' . $p['imagem'] : 'https://via.placeholder.com/50';
        
        echo "<tr>";
        echo "<td><img src='".$foto."' width='50'></td>";
        echo "<td>".$p['nome']."</td>";
        echo "<td>".$p['descricao']."</td>";
        echo "<td>R$ " . number_format($p['preco'], 2, ',', '.') . "</td>"; // Formata preço em R$
        echo "<td>".$p['estoque']." unidades</td>";
        echo "</tr>";
    }
    echo "</table>";
}

include "rodape.php";
?>