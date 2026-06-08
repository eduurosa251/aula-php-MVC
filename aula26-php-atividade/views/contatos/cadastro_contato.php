<?php
require_once "../config/config.php"; //  puxa da pasta
include "cabecalho.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    if (!empty($nome) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $telefone]);
        
        header("Location: index.php");
        exit;
    } else {
        echo "<center><p style='color:red;'>Nome e E-mail são obrigatórios!</p></center>";
    }
}
?>

<center>
    <h3>Novo Contato</h3>
    <form method="POST">
        <table border="0" cellpadding="5">
            <tr>
                <td align="right">Nome:</td>
                <td><input type="text" name="nome" required></td>
            </tr>
            <tr>
                <td align="right">E-mail:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td align="right">Telefone:</td>
                <td><input type="text" name="telefone"></td>
            </tr>
            <tr>
                <td></td>
                <td align="left">
                    <br>
                    <button type="submit">Salvar</button>
                </td>
            </tr>
        </table>
    </form>
</center>

<?php include "rodape.php"; ?>