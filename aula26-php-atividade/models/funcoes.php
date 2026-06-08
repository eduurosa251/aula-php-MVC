<?php
// Busca todos os contatos do banco
function obterContatos(PDO $pdo): array {
    $stmt = $pdo->query("SELECT * FROM contatos");
    return $stmt->fetchAll();
}

// Cria a tabela HTML na página
function exibirTabelaContatos(array $contatos): void {
    if (empty($contatos)) {
        echo "<p>Nenhum contato cadastrado.</p>";
        return;
    }

    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr>";

    foreach ($contatos as $c) {
        echo "<tr>";
        echo "<td>" . $c['id'] . "</td>";
        echo "<td>" . $c['nome'] . "</td>";
        echo "<td>" . $c['email'] . "</td>";
        echo "<td>" . $c['telefone'] . "</td>";
        echo "<td>
                <a href='views/editar_contato.php?id=" . $c['id'] . "'>Editar</a> | 
                <a href='views/excluir_contato.php?id=" . $c['id'] . "'>Excluir</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>