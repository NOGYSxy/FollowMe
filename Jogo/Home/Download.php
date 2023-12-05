<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>

    <style>
        body {
            background-image: url('fundo.png'); 

        }

        
    </style>
</head>
<body>

</head>
<style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .form {
            width: 340px;
            height: 440px;
            background: rgba(19, 18, 19, 0.783);
            border-radius: 8px;
            box-shadow: 0 0 40px -10px #000;
            margin: calc(50vh - 220px) auto;
            padding: 20px 30px;
            max-width: calc(100vw - 40px);
            box-sizing: border-box;
            position: relative;
            color: #f9f6f6;
        }

        h2 {
            margin: 10px 0;
            padding-bottom: 10px;
            width: 180px;
            color: #78788c;
            border-bottom: 3px solid #78788c;
        }

        input:focus {
            border-bottom: 2px solid #78788c;
        }

        p:before {
            content: attr(type);
            display: block;
            margin: 28px 0 0;
            font-size: 14px;
            color: #f9f6f6;
        }

        .button {
            cursor: pointer;
            background: #4CAF50;
            border: none;
            border-radius: 4px;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            overflow: hidden;
            position: relative;
        }

        .button_lg {
            display: inline-block;
            position: relative;
            font-size: 16px;
            font-weight: bold;
        }

        .button_sl {
            background: #f9f6f6;
            height: 100%;
            position: absolute;
            transform: scaleX(0);
            transform-origin: 0 50%;
            transition: transform 0.25s ease-in-out;
            width: 2px;
        }

        .button_text {
            position: relative;
            z-index: 1;
        }

        .button:hover .button_sl {
            transform: scaleX(1);
            transition: transform 0.25s ease-in-out;
        }
    </style>
</head>
<body>

<div class="form">
    <h2>Follow Me</h2>
    <p style="font-size: 20px;">Você foi selecionado para participar dessa grande aventura no espaço em busca de libertar o Ether - Rei de Plutão e meu pai - Topa Follow Me nesse desafio?</p>

    <!-- Botão de Download -->
    <a href="../Home/logoH.jpeg" download="logoH.jpeg">
        <button class="button">
            <span class="button_lg">
                <span class="button_sl"></span>
                <span class="button_text">Download do jogo</span>
            </span>
        </button>     
    </a>
    <button class="button" onclick="window.location.href='Home.php'">
            <span class="button_lg">
                <span class="button_sl"></span>
                <span class="button_text">VOLTAR</span>
            </span>
        </button> 
   
</div>




<style>
    
        .button {
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  border: none;
  background: none;
  color: #0f1923;
  cursor: pointer;
  position: relative;
  padding: 8px;
  margin-bottom: 20px;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 14px;
  transition: all .15s ease;
}

.button::before,
.button::after {
  content: '';
  display: block;
  position: absolute;
  right: 0;
  left: 0;
  height: calc(50% - 5px);
  border: 1px solid #7D8082;
  transition: all .15s ease;
}

.button::before {
  top: 0;
  border-bottom-width: 0;
}

.button::after {
  bottom: 0;
  border-top-width: 0;
}

.button:active,
.button:focus {
  outline: none;
}

.button:active::before,
.button:active::after {
  right: 3px;
  left: 3px;
}

.button:active::before {
  top: 3px;
}

.button:active::after {
  bottom: 3px;
}

.button_lg {
  position: relative;
  display: block;
  padding: 10px 20px;
  color: #fff;
  background-color: #0f1923;
  overflow: hidden;
  box-shadow: inset 0px 0px 0px 1px transparent;
}

.button_lg::before {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 2px;
  height: 2px;
  background-color: #0f1923;
}

.button_lg::after {
  content: '';
  display: block;
  position: absolute;
  right: 0;
  bottom: 0;
  width: 4px;
  height: 4px;
  background-color: #0f1923;
  transition: all .2s ease;
}

.button_sl {
  display: block;
  position: absolute;
  top: 0;
  bottom: -1px;
  left: -8px;
  width: 0;
  background-color: #ff4655;
  transform: skew(-15deg);
  transition: all .2s ease;
}

.button_text {
  position: relative;
}

.button:hover {
  color: #0f1923;
}

.button:hover .button_sl {
  width: calc(100% + 15px);
}

.button:hover .button_lg::after {
  background-color: #fff;
}


        
    </style>




</body>
</html>
