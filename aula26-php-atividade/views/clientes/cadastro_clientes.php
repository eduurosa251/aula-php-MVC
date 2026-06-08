<?php
require_once "../config/config.php"; //  puxa da pasta
include "cabecalho.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    if (strlen($cpf) !== 14) {
        echo "<center><p style='color:red;'>O CPF deve ter o formato 000.000.000-00 (14 caracteres).</p></center>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO clientes (nome, cpf, email, endereco) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $cpf, $email, $endereco]);
        
        header("Location: clientes.php");
        exit;
    }
}
?>

<center>
    <h3>Novo Cliente</h3>
    <form method="POST">
        <table border="0" cellpadding="5">
            <tr>
                <td align="right">Nome:</td>
                <td><input type="text" name="nome" required></td>
            </tr>
            <tr>
                <td align="right">CPF:</td>
                <td><input type="text" name="cpf" placeholder="000.000.000-00" required></td>
            </tr>
            <tr>
                <td align="right">E-mail:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td align="right">Endereço:</td>
                <td><input type="text" name="endereco"></td>
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