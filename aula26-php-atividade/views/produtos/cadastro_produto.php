<?php
require_once "../config/config.php"; //  puxa da pasta
include "cabecalho.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = floatval($_POST['preco']);
    $estoque = intval($_POST['estoque']);
    $nome_foto = null;

    if ($preco <= 0) {
        echo "<center><p style='color:red;'>O preço precisa ser maior que zero!</p></center>";
    } elseif ($estoque < 0) {
        echo "<center><p style='color:red;'>O estoque não pode ser negativo!</p></center>";
    } else {
        if (!empty($_FILES['imagem']['name'])) {
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $nome_foto = uniqid() . "." . $extensao;
            move_uploaded_file($_FILES['imagem']['tmp_name'], "uploads/" . $nome_foto);
        }

        $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque, imagem) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $preco, $estoque, $nome_foto]);

        header("Location: produtos.php");
        exit;
    }
}
?>

<center>
    <h3>Novo Produto</h3>
    <form method="POST" enctype="multipart/form-data">
        <table border="0" cellpadding="5">
            <tr>
                <td align="right">Nome do Produto:</td>
                <td><input type="text" name="nome" required></td>
            </tr>
            <tr>
                <td align="right" valign="top">Descrição:</td>
                <td><textarea name="descricao" rows="3" cols="22"></textarea></td>
            </tr>
            <tr>
                <td align="right">Preço:</td>
                <td><input type="number" name="preco" step="0.01" required></td>
            </tr>
            <tr>
                <td align="right">Estoque:</td>
                <td><input type="number" name="estoque" required></td>
            </tr>
            <tr>
                <td align="right">Foto do Produto:</td>
                <td><input type="file" name="imagem"></td>
            </tr>
            <tr>
                <td></td>
                <td align="left">
                    <br>
                    <button type="submit">Salvar Produto</button>
                </td>
            </tr>
        </table>
    </form>
</center>

<?php include "rodape.php"; ?>