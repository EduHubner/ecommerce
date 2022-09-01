<?php
    $lista = $conn->prepare("SELECT p.imagem, p.descricao, p.valor, p.resumo FROM produtos p where categoria_id = :id");
    $lista->execute(array('id' => $_GET['id']));
?>



<?php foreach($lista as $coluna) { ?>
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $coluna['imagem']; ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?php echo $coluna['descricao']; ?></h5>
            <h5 class="card-title">R$<?php echo $coluna['valor']; ?>,00</h5>
            <p class="card-text"><?php echo $coluna['resumo']; ?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
<?php } ?>
