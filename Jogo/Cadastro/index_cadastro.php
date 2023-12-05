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

    <link rel="stylesheet" href="style_cadastro.css" />
  </head>
  <body>

    <div class="login_form_container">
      <div class="login_form">
        <h2>Cadastro</h2>
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
            <button type="submit" class="input_text" name="register">Cadastrar</button>
            </div>
        </form>

        <div class="input_group">
          
          <button type="submit" class="input_text" name="Cadastrar" onclick="window.location.href='../Login/index.php'">Faça login</button>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>

    <?php
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

    // Processar o formulário de cadastro
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];

        // Verificar se o nome de usuário já existe
        $check_username_sql = "SELECT * FROM FOLLOWME WHERE usuario = '$new_username'";
        $check_result = $conn->query($check_username_sql);

        if ($check_result->num_rows > 0) {
            echo "Nome de usuário já existe. Escolha outro.";
        } else {
          
          // Gerar um salt aleatório
          $salt = bin2hex(random_bytes(16));
          
          // Concatenar o salt à senha
          $combined_password = $new_password . $salt;
          
          // Gerar um hash usando password_hash com o salt
          $hashed_password = password_hash($combined_password, PASSWORD_DEFAULT);
          
          // Inserir dados na tabela usando declaração preparada
          $insert_sql = "INSERT INTO FOLLOWME (usuario, senha, salt) VALUES (?, ?, ?)";
          $stmt = $conn->prepare($insert_sql);
          $stmt->bind_param("sss", $new_username, $hashed_password, $salt);
          
          if ($stmt->execute()) {
              echo "Cadastro bem-sucedido.";
          } else {
              echo "Erro ao cadastrar: " . $stmt->error;
          }
          
                 
        }
    }

    $conn->close();
    ?>
  </body>
</html>
