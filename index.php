<?php
    session_start();
    include "lib/conexao.php";
    include_once("login/autenticador.php");

    for($i=0;$i<=58;$i++){
        $_SESSION['produto_'.$i] = 0;
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
        <div id="divtop">Lojinha do Edu</div> <!--top-->
        <div id="divnav">
            <?php include "navbar.php"; ?>
        </div>
        <div id="divtudo">
            <div id="divcat"> <!--categorias-->
                <h4 class="margincat">Categorias</h4>
                <?php
                    $categorias_pai = $conn->prepare("SELECT ca.id, ca.descricao FROM categorias ca where categoria_pai = 0");
                    $categorias_pai->execute();
                    foreach($categorias_pai as $linhacategorias_pai) { ?>
                        <form method="post">
                            <input type="hidden" class="margincat" name="hidcategoriaPai" value="<?php echo $linhacategorias_pai['id']; ?>">
                            <input type="submit" name="categoriaPai" class="nav-link active" aria-current="page" value="<?php echo $linhacategorias_pai['descricao']; ?>">
                            <?php 
                                if(isset($_POST['hidcategoriaPai'])) {
                                    $categorias = $conn->prepare("SELECT ca.id, ca.descricao, ca.categoria_pai FROM categorias ca where categoria_pai = :categoria_pai");
                                    $categorias->execute(array('categoria_pai' => $_POST['hidcategoriaPai']));
                                    foreach ($categorias as $linhacategorias){ 
                                        if ($linhacategorias['categoria_pai'] == $linhacategorias_pai['id']) {?>
                                            <a href="?pagina=categorias_produtos&cat_id=<?php echo $linhacategorias['id']; ?>" class="nav-link active margincat cat" aria-current="page"><?php echo $linhacategorias['descricao']; ?></a>
                                            <?php
                                                //demostrar favorito
                                                $_SESSION['produto_'.$linhacategorias['id']] = $_SESSION['produto_'.$linhacategorias['id']] + 1;
                                                for($i=1;$i<=58;$i++){
                                                    if($_SESSION['produto_'.$i] > $_SESSION['produto_'.$i-1]){
                                                        $_SESSION['favorito'] = $i;
                                                    }
                                                }
                                            ?>
                                    <?php } 
                                    } 
                                } 
                            ?>
                        </form>
                    <?php } ?>
            </div>
            <div id="divpag"> <!--pagina-->
                <?php
                if(isset($_SESSION['autenticado']) && $_SESSION['autenticado']) {
                    if (isset($_GET['pagina'])) {
                        $consulta = $conn->prepare("SELECT url FROM paginas where id = :id");
                        $resultado = $consulta->execute(array('id' => $_GET['pagina']));
                        if ($linha = $consulta->fetch()){
                            include $linha['url'];
                        } else {
                            include "404.php";
                        }
                    } else {
                        include "home.php";
                    }
                } else {
                    include "login/login.php";
                }
                ?>
            </div>
        </div>
        <div id="divrod">
            Site feito pelo aluno: Eduardo Bennert Hübner
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>