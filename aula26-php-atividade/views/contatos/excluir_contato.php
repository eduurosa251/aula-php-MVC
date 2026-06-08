<?php
require_once "../config/config.php"; //  puxa da pasta
include "cabecalho.php";


$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("DELETE FROM contatos WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
}
?>

<center>
    <h3>Excluir Contato</h3>
    <p>Deseja deletar este contato?</p>
    <br>
    
    <form method="POST">
        <button type="submit">Deletar</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="index.php"><button type="button">Cancelar</button></a>
    </form>
</center>

<?php include "rodape.php"; ?>