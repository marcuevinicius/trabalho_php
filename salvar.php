

<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acesso inválido.");
}

$produto = trim($_POST['produto'] ?? '');
$marca = trim($_POST['marca'] ?? '');
$quantidade = trim($_POST['quantidade'] ?? '');
$valor_compra = trim($_POST['valor_compra'] ?? '');

// 
if ($produto === '' || $marca === '' || $quantidade === '' || $valor_compra === '') {
    die("Preencha todos os campos.");
}

// 
if (!is_numeric($quantidade) || !is_numeric($valor_compra)) {
    die("Quantidade e valor devem ser numéricos.");
}

// 
if ($quantidade <= 0 || $valor_compra <= 0) {
    die("Valores devem ser maiores que zero.");
}

// 💰 calcula valor de venda (30%)
$valor_venda = $valor_compra * 1.30;

try {
    $sql = "INSERT INTO cadastro 
            (produto, marca, quantidade, valorcompra, valorvenda)
            VALUES 
            (:produto, :marca, :quantidade, :valorcompra, :valorvenda)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':produto' => $produto,
        ':marca' => $marca,
        ':quantidade' => $quantidade,
        ':valorcompra' => $valor_compra,
        ':valorvenda' => $valor_venda
    ]);

    $sucesso = true;

} catch (PDOException $e) {
    $sucesso = false;
    $erro = $e->getMessage(); // útil para debug
}
?>


<!doctype html>
<html lang="pt-br">
 
  <head>
    <meta charset="utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-light">
 
<div class="container mt-5">
    <div class="card p-4 shpdow text-center">
 
    <?php if($sucesso):?>
        <div class="alert alert-success">
            Cadastro realizado com sucesso!
        </div>
    <?php else:?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($erro); ?>
    </div>
    <?php endif; ?>

    <a href="index.php" class="btn btn-primary mt-3">Voltar</a>

    </div>
    </div>
    </body>
    </html>