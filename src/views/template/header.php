<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <link rel="stylesheet" href="assets/css/table.css">

    <link rel="icon" href="assets/img/search-property.ico" type="image/x-icon">

    <title>Portal MaginCred | Gerencie sua imobiliaria</title>
  </head>

  <body class="hide-sidebar">
    <header class="header">
      <div class="logo">
        <a href="dashboard.php">
          <i class="home icofont-search-property me-2"></i>
        </a>
        <span class="fw-light me-2">Portal</span>
        <span class="fw-light">Magni<span class="fw-semibold">Cred</span>
        </span>
        </a>
      </div>
      <div class="menu-toggle mx-3">
        <i class="icofont-navigation-menu"></i>
      </div>
      <div class="spacer"></div>
      <div class="dropdown">
        <div class="dropdown-button">
          <img class="avatar"
            src="<?= "http://www.gravatar.com/avatar.php?gravatar_id=" . md5(strtolower(trim($_SESSION['user']->email))) ?>"
            alt="user">
          <span class="ms-3">
            <?= $_SESSION['user']->name ?>
          </span>
          <i class="icofont-simple-down me-3 ms-3 "></i>
          <div class="dropdown-content">
            <ul class="nav-list">
              <li class="nav-item">
                <a href="logout.php">
                  <i class="icofont-logout me-2"></i>
                  Sair
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
