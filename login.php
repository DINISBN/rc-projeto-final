<?php

// Iniciar sessão
if (session_status() === PHP_SESSION_NONE) session_start();

$erro = [];

// Verificar se o forms foi submetido
if (isset($_POST['email']) && strlen($_POST['email']) > 0) {
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Le os users do arquivo
    $users_file = 'users.json';
    
    if (file_exists($users_file)) {
        $users_json = file_get_contents($users_file);
        $users = json_decode($users_json, true);
        
        if ($users === null) {
            $erro[] = "Erro ao ler ficheiro dos users.";
        } else {
            // Procura user com o mesmo email
            $user_encontrado = null;
            foreach ($users as $user) {
                if ($user['email'] === $email) {
                    $user_encontrado = $user;
                    break;
                }
            }
            
            if ($user_encontrado === null) {
                $erro[] = "Este e-mail não pertence a nenhum user!";
            } else {
                // Verificar password (comparação simples, sem hash)
                if ($user_encontrado['password'] === $password) {
                    $_SESSION['user'] = $user_encontrado['id'];
                    $_SESSION['email'] = $email;
                    echo "<script>alert('Login realizado com sucesso!'); location.href='index.php';</script>";
                    exit;
                } else {
                    $erro[] = "Palavra-passe incorreta.";
                }
            }
        }
    } else {
        $erro[] = "Ficheiro dos users não foi encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      body {
        background-color: #f4f0ea;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
      }
      
      .login-container {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
      }
      
      .login-container h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
      }
      
      .login-container form p {
        margin-bottom: 20px;
      }
      
      .login-container input[type="text"],
      .login-container input[type="password"] {
        width: 100%;
        padding: 12px;
        border: 2px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        transition: border-color 0.3s;
      }
      
      .login-container input[type="text"]:focus,
      .login-container input[type="password"]:focus {
        outline: none;
        border-color: #333;
      }
      
      .login-container input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        transition: background-color 0.3s;
      }
      
      .login-container input[type="submit"]:hover {
        background-color: #555;
      }
      
      .error-message {
        color: red;
        margin-bottom: 15px;
        text-align: center;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
    <div class="login-container">
      <h2>Login</h2>
      <?php 
        // Mostrar mensagens de erro
        if (count($erro) > 0) {
          foreach ($erro as $msg) {
            echo "<script>alert('" . addslashes($msg) . "');</script>";
            echo "<p class='error-message'>$msg</p>";
          }
        }
      ?>
      <form method="POST" action="">
        <p>
          <input value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" name="email" placeholder="E-mail" type="text">
        </p>
        <p>
          <input name="password" type="password" placeholder="Palavra-passe">
        </p>
        <p>
          <input value="Entrar" type="submit">
        </p>
      </form>
    </div>
  </body>
</html>
