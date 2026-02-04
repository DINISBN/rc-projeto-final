<?php
// Iniciar sessão
session_start();

// Criar carrinho vazio se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Esvaziar carrinho se solicitado
if (isset($_GET['esvaziar'])) {
    unset($_SESSION['carrinho']);
    $_SESSION['carrinho'] = array();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/carrinho.css">
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

    <div class="container">
      <h1 class="carrinho-titulo">Carrinho de Compras</h1>

      <?php if (count($_SESSION['carrinho']) == 0): ?>
        <!-- Carrinho vazio -->
        <div class="carrinho-vazio">
          <p>O teu carrinho está vazio.</p>
          <a href="catalogo.php" class="btn btn-continuar">Ir às Compras</a>
        </div>
      <?php else: ?>
        <!-- Tabela com produtos -->
        <table class="tabela-carrinho">
          <thead>
            <tr>
              <th>Produto</th>
              <th>Tamanho</th>
              <th>Quantidade</th>
              <th>Preço Unitário</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            for ($i = 0; $i < count($_SESSION['carrinho']); $i++) {
                $produto = $_SESSION['carrinho'][$i];
                $subtotal = $produto['preco'] * $produto['quantidade'];
                $total += $subtotal;
                
                echo '<tr>';
                echo '<td>' . htmlspecialchars($produto['nome']) . '</td>';
                echo '<td>' . htmlspecialchars($produto['tamanho']) . '</td>';
                echo '<td>' . htmlspecialchars($produto['quantidade']) . '</td>';
                echo '<td>' . number_format($produto['preco'], 2) . '€</td>';
                echo '<td>' . number_format($subtotal, 2) . '€</td>';
                echo '</tr>';
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" align="right">Total:</td>
              <td><?php echo number_format($total, 2); ?>€</td>
            </tr>
          </tfoot>
        </table>

        <!-- Ações -->
        <div class="acoes-carrinho">
          <a href="catalogo.php" class="btn btn-continuar">Continuar a Comprar</a>
          <a href="<?php echo $_SERVER['PHP_SELF']; ?>?esvaziar=1" class="btn btn-esvaziar" 
             onclick="return confirm('Tens a certeza que queres esvaziar o carrinho?');">
             Esvaziar Carrinho
          </a>
        </div>
      <?php endif; ?>
    </div>
  </body>
</html>