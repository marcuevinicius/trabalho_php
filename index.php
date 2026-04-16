<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastro de Produtos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
 
<body class="bg-light">
    <?php
    $produto = $_POST['produto'] ?? '';
    $marca = $_POST['marca'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $valor_compra = $_POST['valor_compra'] ?? '';

    if($valor_compra !== ''){
        $valor_venda = $valor_compra * 1.4;
    }
    ?>
 
<div class="container mt-5">
<div class="card p-4 shadow">
<h3 class="mb-3">Cadastro de Produto</h3>
 
<form action="validar.php" method="POST">
``
 
<div class="mb-3">
<label>Produto:</label>
<input type="text" name="produto" class="form-control" value="<?php echo $produto ?>" required>
</div>
 
<div class="mb-3">
<label>Marca:</label>
<input type="text" name="marca"  class="form-control" value="<?php echo $marca ?>" required>
</div>
 
<div class="mb-3">
<label>Quantidade:</label>
<input type="number" name="quantidade" class="form-control" value="<?php echo $quantidade; ?>" required>
</div>
 
<div class="mb-3">
<label>Valor de Compra:</label>
<input type="number" step="0.01" name="valor_compra" class="form-control" value="<?php echo $valor_compra; ?>" required>
</div>

<button type="submit" class="btn btn-primary">Enviar</button>
 
</form>
</div>
</div>
 
</body>
</html>