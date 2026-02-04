<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>United</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="style.css">
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

    <!-- Carousel Imgs -->
    <div class="slides">
      <div class="slide slide-1">
        <a href="casaco.php">
          <img src="img/est1.jpg" alt="Imagem do estádio 1" />
        </a>
      </div>
      <div class="slide slide-2">
        <a href="casaco.php">
          <img src="img/est2.jpg" alt="Imagem do estádio 2" />
        </a>
      </div>
      <div class="slide slide-3">
        <a href="casaco.php">
          <img src="img/casaco-es1.png" alt="Imagem do casaco 1" />
        </a>
      </div>
      <div class="slide slide-4">
        <a href="casaco.php">
          <img src="img/casaco-es2.png" alt="Imagem do casaco 2" />
        </a>
      </div>
    </div>
    <section>    
      <p>Man United x <span>United</span></p>
    </section>
    <footer>
      <p class="paragrafo">&copy; 2026 United</p>
      <p class="paragrafo">Todos os Direitos Reservados</p>
    </footer>
  </body>
</html>