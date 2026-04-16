
<?php
$produto = $_POST['produto'] ?? '';
$marca = $_POST['marca'] ?? '';
$quantidade = $_POST['quantidade'] ?? '';
$valor_compra = $_POST['valor_compra'] ?? '';


if (empty($produto) || empty($marca) || empty($quantidade) || empty($valor_compra)) {
    echo "Preencha todos os campos!";
    exit;
}


if (!is_numeric($quantidade) || !is_numeric($valor_compra)) {
    echo "Quantidade e valor devem ser numéricos!";
    exit;
}


if ($quantidade <= 0 || $valor_compra <= 0) {
    echo "Valores inválidos!";
    exit;
}


$valor_venda = $valor_compra * 1.30;
?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <div class="container mt-5">
        <div class ="card p-4 shadow">
            <h3 class="mb-3">confirme seus dados</h3>

            <p><strong>Produto:</strong> <?php echo $produto ?></p>
            <p><strong>Marca:</strong> <?php echo $marca ?></p>
            <p><strong>quantidade:</strong> <?php echo $quantidade ?></p>
            <p><strong>Valor de compra:</strong>
            R$ <?php echo number_format($valor_compra, 2, ',', '.'); ?>
            </p>
            <p><strong>Valor de Venda (30%):</strong>
            R$ <?php echo number_format($valor_venda, 2, ',', '.'); ?>
            </p>


            <div class="d-flex gap-2 mt-3">
                <form action="salvar.php" method="POST">
                    <input type="hidden" name="produto" value="<?php echo $produto; ?>">
                    <input type="hidden" name="marca" value="<?php echo $marca; ?>">
                    <input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
                    <input type="hidden" name="valor_compra" value="<?php echo $valor_compra; ?>">
                    <input type="hidden" name="valor_venda" value="<?php echo $valor_venda; ?>">
                    <button type="submit" class="btn btn-success">
                        Cadastro no Banco
</button>
</form>

</div>
</div>
</div>
</body>
</html>
