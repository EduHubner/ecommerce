<?php 
    if(isset($_POST['retirar'])) {
        $prepare = $conn->prepare("DELETE FROM carrinho where id_car = :id");
        if($prepare->execute(array('id' => $_POST['hiddenretirar']))){
            echo "<div class='alert alert-info'>Produto Removido</div>";
        }
    }
?>
<div id="divfundocar">
    <h2 id="titcar">Meu Carrinho - <?php echo $_SESSION['usuaNome']; ?></h2>
    <?php
    $lista = $conn->prepare("SELECT p.id, p.imagem, p.descricao, p.valor, p.resumo, c.id_car FROM produtos p inner join carrinho c on (p.id = c.id_produto) inner join usuarios u on (u.id = c.id_usuario) 
    where c.id_usuario = :id_usuario");
    $lista->execute(array('id_usuario' => $_GET['id']));
    ?>
    <form method="POST">
        <?php foreach($lista as $coluna) { ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $coluna['imagem']; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $coluna['descricao']; ?></h5>
                    <h5 class="card-title">R$<?php echo $coluna['valor']; ?>,00</h5>
                    <p class="card-text"><?php echo $coluna['resumo']; ?></p>
                    <input type="hidden" name="hiddenretirar" value="<?php echo $coluna['id_car']; ?>">
                    <input type="submit" name="retirar" value="Retirar" class="btn btn-danger">
                </div>
            </div>
        <?php } ?>
    </form>
</div>