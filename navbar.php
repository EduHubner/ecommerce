<nav class="navbar navbar-expand-lg" id="nav1">
  <div class="container-fluid">
    <a class="navbar-brand" href="?pagina=home">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?pagina=navegacao">Navegação</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?pagina=carrinho&id=<?php echo $_SESSION['usuaCarrinho']; ?>">Carrinho</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>