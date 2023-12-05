<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contatos</title>
</head>
<body>
  <div class="background">
    <div class="container">
      <div class="screen">
        <div class="screen-header">
          <div class="screen-header-left">
            
          </div>
          <div class="screen-header-right">
            
          </div>
        </div>
        <div class="screen-body">
          <div class="screen-body-item left">
            <div class="app-title">
              <span>Contate-Nos</span>
              <h6 style="color:#a91dea;">Por favor, contacte-nos para qualquer questão ou bugs que possa ter, através deste
  Formulário sua solicitação será processada por nossa equipe e entraremos em contato
  com você o mais breve possível.
              </h6>
            </div>
            
          </div>
          <div class="screen-body-item">
            <div class="app-form">
            <form action="" method="post" onsubmit="return validateForm()">
              <div class="app-form-group">
                <input class="app-form-control" placeholder="NOME" name="nome" id="nome" required>
                <span class="error-message" id="error-mensagem"></span>
              </div>
              <div class="app-form-group">
                <input class="app-form-control" placeholder="EMAIL" name="email" id="email" required>
                <span class="error-message" id="error-mensagem"></span>
              </div>
              
              <div class="app-form-group message">
                <input class="app-form-control" placeholder="MENSAGEM" name="mensagem" id="mensagem" required>
                <span class="error-message" id="error-mensagem"></span>
              </div>
              <div class="app-form-group buttons">
                <button class="app-form-button" onclick="window.location.href='Home.php'">VOLTAR</button>
                <button class="app-form-button" type="submit">ENVIAR</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      var nome = document.getElementById('nome').value;
      var email = document.getElementById('email').value;
      var mensagem = document.getElementById('mensagem').value;
      var isValid = true;

      document.getElementById('error-nome').innerHTML = '';
      document.getElementById('error-email').innerHTML = '';
      document.getElementById('error-mensagem').innerHTML = '';

      if (nome === '') {
        document.getElementById('error-nome').innerHTML = 'Campo obrigatório';
        isValid = false;
      }

      if (email === '') {
        document.getElementById('error-email').innerHTML = 'Campo obrigatório';
        isValid = false;
      }

      if (mensagem === '') {
        document.getElementById('error-mensagem').innerHTML = 'Campo obrigatório';
        isValid = false;
      }

      return isValid;
    }
  </script>

<?php
// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectar ao banco de dados (ajuste as configurações conforme necessário)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jogo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtem os valores do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Insere os valores no banco de dados
        $insert_sql = "INSERT INTO contatos (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Seu feedback foi registrado, entraremos em contato com você o mais breve possível.";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }

    // Fecha a conexão
    $conn->close();
}
?>




  
  <style>
    *,
*:before, {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  background: linear-gradient(to right, #a91dea 0%, #491163 100%);
  font-size: 12px;
}

body,
button,
input {
  font-family: "Montserrat", sans-serif;
  font-weight: 700;
  letter-spacing: 1.4px;
}

.background {
  display: flex;
  min-height: 100vh;
}

.container {
  flex: 0 1 700px;
  margin: auto;
  padding: 10px;
}

.screen {
  position: relative;
  background: #3e3e3e;
  border-radius: 15px;
}

.screen:after {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 20px;
  right: 20px;
  bottom: 0;
  border-radius: 15px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
  z-index: -1;
}

.screen-header {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background: #4d4d4f;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}

.screen-header-left {
  margin-right: auto;
}

.screen-header-button {
  display: inline-block;
  width: 8px;
  height: 8px;
  margin-right: 3px;
  border-radius: 8px;
  background: white;
}

.screen-header-button.close {
  background: #a91dea;
}

.screen-header-button.maximize {
  background: #e8e925;
}

.screen-header-button.minimize {
  background: #74c54f;
}

.screen-header-right {
  display: flex;
}

.screen-header-ellipsis {
  width: 3px;
  height: 3px;
  margin-left: 2px;
  border-radius: 8px;
  background: #999;
}

.screen-body {
  display: flex;
}

.screen-body-item {
  flex: 1;
  padding: 50px;
}

.screen-body-item.left {
  display: flex;
  flex-direction: column;
}

.app-title {
  display: flex;
  flex-direction: column;
  position: relative;
  color: #a91dea;
  font-size: 26px;
}

.app-title:after {
  content: "";
  display: block;
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 25px;
  height: 4px;
  background: #a91dea;
}

.app-contact {
  margin-top: auto;
  font-size: 8px;
  color: #888;
}

.app-form-group {
  margin-bottom: 15px;
}

.app-form-group.message {
  margin-top: 40px;
}

.app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}

.app-form-control {
  width: 100%;
  padding: 10px 0;
  background: none;
  border: none;
  border-bottom: 1px solid #666;
  color: #ddd;
  font-size: 14px;
  text-transform: uppercase;
  outline: none;
  transition: border-color 0.2s;
}

.app-form-control::placeholder {
  color: #666;
}

.app-form-control:focus {
  border-bottom-color: #ddd;
}

.app-form-button {
  background: none;
  border: none;
  color: #a91dea;
  font-size: 14px;
  cursor: pointer;
  outline: none;
}

.app-form-button:hover {
  color: #a91dea;
}

.credits {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  color: #ffa4bd;
  font-family: "Roboto Condensed", sans-serif;
  font-size: 16px;
  font-weight: normal;
}

.credits-link {
  display: flex;
  align-items: center;
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}

.dribbble {
  width: 20px;
  height: 20px;
  margin: 0 5px;
}

@media screen and (max-width: 520px) {
  .screen-body {
    flex-direction: column;
  }

  .screen-body-item.left {
    margin-bottom: 30px;
  }

  .app-title {
    flex-direction: row;
  }

  .app-title span {
    margin-right: 12px;
  }

  .app-title:after {
    display: none;
  }
}

@media screen and (max-width: 600px) {
  .screen-body {
    padding: 40px;
  }

  .screen-body-item {
    padding: 0;
  }
}

  </style>


</body>
</html>