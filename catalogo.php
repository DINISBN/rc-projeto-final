<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Loja de Roupa</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/catalogo.css">
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

    <main>
      <div class="catalog-section">
        <h2 class="catalog-title">Produtos em destaque</h2>
        <span class="catalog-separator"></span>

        <div class="catalog-cards">
          <!-- Card 1 -->
          <div class="product-card">
            <div class="card-badge sale">24%<br>PROMOÇÃO</div>
            <a href="t-shirt.php" class="card-image">
              <img src="img/t-shirt.png" alt="T-SHIRT 2025/26">
            </a>
            <div class="card-info">
              <h4>T-SHIRT PRINCIPAL 2025/26</h4>
              <div class="card-price">
                <span class="form_price">Desde</span>
                <span class="price-current">19€ EUR</span>
                <span class="price-old">25€ EUR</span>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="product-card">
            <div class="card-badge sale">24%<br>PROMOÇÃO</div>
            <a href="/camisola-2" class="card-image">
              <img src="img/man-1.png" alt="CAMISOLA MAN. UNITED PRINCIPAL 2025/26">
            </a>
            <div class="card-info">
              <h4><a href="/camisola-2">CAMISOLA MAN. UNITED PRINCIPAL 2025/26</a></h4>
              <div class="card-price">
                <span class="form_price">Desde</span>
                <span class="price-current">34€ EUR</span>
                <span class="price-old">45€ EUR</span>
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="product-card">
            <div class="card-badge sale">26%<br>PROMOÇÃO</div>
            <a href="/camisola-2" class="card-image">
              <img src="img/man-2.png" alt="CAMISOLA MAN. UNITED SECUNDÁRIA 2025/26">
            </a>
            <div class="card-info">
              <h4><a href="/camisola-2">CAMISOLA MAN. UNITED SECUNDÁRIA 2025/26</a></h4>
              <div class="card-price">
                <span class="form_price">Desde</span>
                <span class="price-current">29€ EUR</span>
                <span class="price-old">39€ EUR</span>
              </div>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="product-card">
            <div class="card-badge sale">20%<br>PROMOÇÃO</div>
            <a href="casaco.php" class="card-image">
              <img src="img/casaco1.png" alt="CASACO 2025/26">
            </a>
            <div class="card-info">
              <h4>CASACO 2025/26</h4>
              <div class="card-price">
                <span class="form_price">Desde</span>
                <span class="price-current">44€ EUR</span>
                <span class="price-old">55€ EUR</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>