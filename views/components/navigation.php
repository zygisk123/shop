<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=$_USER_PATH."/views/index.php"?>">SHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=$_USER_PATH."/views/shop/showAll.php"?>">SHOW SHOES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$_USER_PATH."/views/shop/add.php"?>">ADD NEW SHOES</a>
            </li>   
            <form class="d-flex" role="search" method='GET'>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name = "search" type="submit">Search</button>
            </form>
        </ul>
    </div>
  </div>
</nav>