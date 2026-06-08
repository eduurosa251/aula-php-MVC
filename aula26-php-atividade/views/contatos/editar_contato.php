<?php
require_once "../config/config.php"; //  puxa da pasta
include "cabecalho.php";


$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $pdo->prepare("UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $telefone, $id]);

    header("Location: ../index.php");
    exit;
}

// Carrega os dados atuais do contato
$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->execute([$id]);
$contato = $stmt->fetch();
?>

<center>
    <h3>Editar Contato</h3>
    <form method="POST">
        <table border="0" cellpadding="5">
            <tr>
                <td align="right">Nome:</td>
                <td><input type="text" name="nome" value="<?php echo $contato['nome']; ?>" required></td>
            </tr>
            <tr>
                <td align="right">E-mail:</td>
                <td><input type="email" name="email" value="<?php echo $contato['email']; ?>" required></td>
            </tr>
            <tr>
                <td align="right">Telefone:</td>
                <td><input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td align="left">
                    <br>
                    <button type="submit">Atualizar</button>
                </td>
            </tr>
        </table>
    </form>
</center>

<?php include "rodape.php"; ?>