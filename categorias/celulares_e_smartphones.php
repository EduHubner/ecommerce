<?php
    $lista = $conn->query("SELECT p.imagem, p.descricao, p.valor, p.resumo FROM produtos p");
?>


<table>
    <tr>
        <td>
            <div>
                <table>
                    <?php foreach($lista as $coluna) { ?>
                    <tr><img src="<?php echo $coluna['imagem']; ?>" class="img-thumbnail"></tr>
                    <tr><?php echo $coluna['descricao']; ?></tr>
                    <tr><?php echo $coluna['valor']; ?></tr>
                    <tr><?php echo $coluna['resumo']; ?></tr>
                    <?php } ?>
                </table>
            </div>
        </td>
        <td></td>
        <td></td>
    </tr>
</table>