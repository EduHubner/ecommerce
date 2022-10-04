<?php
    $produtos = $conn->prepare("SELECT p.id, p.estoque, p.imagem, p.descricao, p.valor, p.resumo FROM produtos p where id = :id");
    $produtos->execute(array('id' => $_GET['id']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <form>
        <?php foreach($produtos as $produto) {?>
        <div>
            <div id="img">
                <img src="<?php echo $produto['imagem']; ?>">
            </div>
            <div id="tit">
                <h5><?php echo $produto['descricao']; ?></h5>
            </div>
            <div id="desc">
                <p><?php echo $produto['resumo']; ?></p>
            </div>
            <div id="pre">
                <h5>R$<?php echo $produto['valor']; ?>,00</h5>
            </div>
            <div id="car">
                <button>Carrinho</button>
            </div>
        </div>
        <?php } ?>
    </form>
</body>
</html>