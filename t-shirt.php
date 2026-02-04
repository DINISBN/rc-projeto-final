<?php
// Iniciar sessão
session_start();

// Criar carrinho vazio se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Processar adição ao carrinho
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adicionar_carrinho'])) {
    // Criar array com dados do produto
    $produto = array(
        'nome' => 'Camisola Portugal Principal 2025',
        'preco' => 19,
        'tamanho' => $_POST['tamanho'],
        'quantidade' => $_POST['quantidade']
    );
    
    // Adicionar produto ao carrinho
    $_SESSION['carrinho'][] = $produto;
    
    // Redirecionar para evitar reenvio do formulário
    header('Location: ' . $_SERVER['PHP_SELF'] . '?sucesso=1');
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Loja de Roupa</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/t-shirt.css">
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
        
        <?php
        // Mostrar mensagem de sucesso
        if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
            echo '<div class="mensagem-sucesso">';
            echo 'Produto adicionado ao carrinho com sucesso!';
            echo '</div>';
        }
        ?>

        <div class="produto">
            <!-- COLUNA 1: IMAGENS -->
            <div class="imagem-lado">
                <!-- Imagem principal -->
                <div class="imagem-principal">
                    <?php
                    // Mostrar imagem selecionada ou frente por padrão
                    $imagem = isset($_GET['img']) && $_GET['img'] == 'costas' ? 'img/t-shirtbr.png' : 'img/t-shirt.png';
                    ?>
                    <img src="<?php echo $imagem; ?>" alt="Camisola Portugal">
                </div>

                <!-- Miniaturas (apenas 2 imagens) -->
                <div class="miniaturas">
                    <div class="miniatura">
                        <a href="?img=frente">
                            <img src="img/t-shirt.png" alt="Frente">
                        </a>
                    </div>
                    <div class="miniatura">
                        <a href="?img=costas">
                            <img src="img/t-shirtbr.png" alt="Costas">
                        </a>
                    </div>
                </div>
            </div>

            <!-- COLUNA 2: INFORMAÇÕES -->
            <div class="info-produto">
                <h1 class="titulo">Camisola Portugal Principal 2025</h1>
                
                <div class="preco">
                    19€ EUR
                    <span class="preco-antigo">25€ EUR</span>
                </div>

                <!-- FORMULÁRIO -->
                <form method="POST" action="">
                    <!-- Seleção de Tamanho -->
                    <div class="secao">
                        <label class="label">Tamanho:</label>
                        <select name="tamanho" required>
                            <option value="S">S</option>
                            <option value="M" selected>M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <!-- Quantidade -->
                    <div class="secao">
                        <label class="label">Quantidade:</label>
                        <input type="number" name="quantidade" class="quantidade" value="1" min="1" max="10" required>
                    </div>

                    <!-- Botão Adicionar ao Carrinho -->
                    <button type="submit" name="adicionar_carrinho" class="btn-carrinho">ADICIONAR AO CARRINHO</button>
                </form>

                <!-- Descrição -->
                <div class="descricao">
                    <strong>Descrição:</strong><br>
                    Camisola oficial da Seleção Portuguesa de Futebol para a época 2025/26. 
                    Material de alta qualidade, confortável e respirável.
                </div>
            </div>
        </div>
    </div>

  </body>
</html>