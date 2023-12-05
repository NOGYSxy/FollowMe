<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Administrador</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="style_login.css" />
  </head>
  <body>

    <div class="login_form_container">
      <div class="login_form">
        <h2>Login</h2>
        <form action="" method="POST">
          <div class="input_group">
            <i class="fa fa-user"></i>
            <input
              type="text"
              placeholder="Usuário"
              class="input_text"
              autocomplete="off"
              id="new_username" 
              name="new_username" 
              required
            />
          </div>
          <div class="input_group">
            <i class="fa fa-unlock-alt"></i>
            <input
              type="password"
              placeholder="Senha"
              class="input_text"
              autocomplete="off"
              id="new_password" 
              name="new_password" 
              required
            />
          </div>
          <div class="input_group">
            <button type="submit" class="input_text" name="login">Entrar</button>
            </div>
        </form>
        <div class="input_group">
        <button type="submit" class="input_text" name="Cadastrar" onclick="window.location.href='../Cadastro/index_cadastro.php'">Cadastrar</button>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>

    <?php
session_start();

// Credenciais do banco de dados
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "jogo";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processar o formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $entered_username = $_POST['new_username'];
    $entered_password = $_POST['new_password'];

    // Consultar o banco de dados para verificar as credenciais
    $check_credentials_sql = "SELECT * FROM FOLLOWME WHERE usuario = ?";
    $stmt = $conn->prepare($check_credentials_sql);
    $stmt->bind_param("s", $entered_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar se a chave 'salt' existe no array $row antes de acessá-la
        if (isset($row['salt'])) {
            $stored_password = $row['senha'];
            $stored_salt = $row['salt'];

            // Verificar a senha usando password_verify
            if (password_verify($entered_password . $stored_salt, $stored_password)) {
                // Credenciais corretas, redirecionar para a página Home.html
                $_SESSION['authenticated'] = true;
                header("Location: ../Home/Home.php");
                exit();
            } else {
                echo "Credenciais inválidas";
            }
        } else {
            echo "Erro: 'salt' não encontrado no banco de dados";
        }
    } else {
        echo "Nome de usuário não encontrado";
    }
}

$conn->close();
?>


  </body>
</html>
