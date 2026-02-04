<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Loja de Roupa</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="catalogo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a href="index.php" class="logo">
        <img src="img/logods.png" alt="Logo da loja" />
      </a>
      <a href="index.php" class="page">
        <h3>Início</h3>
      </a>
      <a href="catalogo.php" class="page">
        <h3>Catálogo</h3>
      </a>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="logout.php" class="page">
          <h3>Logout</h3>
        </a>
      <?php else: ?>
        <a href="login.php" class="page">
          <h3>Login</h3>
        </a>
      <?php endif; ?>
      <div>
        <?php include 'cart.php'; ?>
      </div>
    </header>
  </body>
</html>