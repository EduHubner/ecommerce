<?php
    include "lib/conexao.php";
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>
  <body>
    <div>
        <div id="divtop">Lojinha do Edu</div>
        <div id="divnav">
            <?php include "navbar.php"; ?>
        </div>
        <div id="divcat">
            <h4>Categorias</h4>
            <?php
                $categorias = $conn->prepare("SELECT ca.id, ca.descricao FROM categorias ca");
                $categorias->execute();
                foreach ($categorias as $linhacategorias){ ?>
                    <a href="?pagina=<?php echo $linhacategorias['id']; ?>" class="nav-link active" aria-current="page"><?php echo $linhacategorias['descricao']; ?></a>
                <?php } ?>
        </div>
        <div id="divpag">
            <?php
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
            ?>
        </div>
        <div id="divrod">
            fadpfmafa
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>