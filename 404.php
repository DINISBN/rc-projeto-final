<?php
// Iniciar sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página Não Encontrada</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/404.css">
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
      <div>
        <?php include 'cart.php'; ?>
      </div>
    </header>

    <div class="container-404">
      <h1 class="titulo-404">404</h1>
      <h2 class="subtitulo-404">Página Não Encontrada</h2>
      <p class="mensagem-404">A página que procuras não existe.</p>
      <a href="index.php" class="btn-voltar">Voltar ao Início</a>
    </div>
  </body>
</html>