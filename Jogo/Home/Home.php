
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Follow Me</title>

    <link rel="stylesheet" href="style_Home.css" />

    <style>
        body {
            background-image: url('fundo.png'); /* Substitua pelo caminho real da sua imagem de fundo */

        }

        
    </style>
    
</head>

<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="" width="10%" >
            
        </div>
        <input type="checkbox" id="click">
        <label for="click" class="mainicon">
            <div class="menu">
                <i class="bi bi-list"></i>
            </div>
        </label>
        <nav>
            <button onclick="window.location.href='Home.php'">Home</button>
            <button onclick="window.location.href='Download.php'">Download</button>
            <button onclick="window.location.href='Contatos.php'">Contatos</button>
            
        </nav>



        
    </header>


    <section>
        <div class="main">
            <div class="detail">
                <h1><span style="color: rgb(165, 4, 252);">Follow Me </span> <br> Foco do <span style="color: rgb(77, 15, 177);">Jogo</span></h1>
                <p>Nosso jogo vai se tratar de um jogo focado na jogabilidade <br> e no conhecimento de planetas. A história se passará <br>   
                    nos planetas do sistema solar, abrangendo suas características.<br><br><br>  </p>
                <div class="social">
                    <a href="https://www.instagram.com/project_followme/?igshid=YTQwZjQ0NmI0OA%3D%3D"><i class="bi bi-instagram"></i>    </a>

                </div>
            </div>
            <div class="images">
                <img src="https://cdn.discordapp.com/attachments/838880468216447086/1179574228853457027/FollowMe.png?ex=657a471b&is=6567d21b&hm=e06a9ce97cc53f66072eb18bf5fd590212ac61cf1fb193000956aabeeccf255f&" alt="" width="100%">
            </div>
            
        </div>
    </section>
    <p><br><br><br>  </p>
    <div class="wrapper">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
        <li class="card">
          <div class="img"><img src=logoM.jpeg alt="img" draggable="false"></div>
          <h2>Matheus Klein</h2>
          <span>Desenvolvedor do site</span>
        </li>
        <li class="card">
          <div class="img"><img src=logoR.jpeg alt="img" draggable="false"></div>
          <h2>Ewerton Rodrigues</h2>
          <span>Programador do jogo</span>
        </li>
        <li class="card">
          <div class="img"><img src="logoE.jpeg" alt="img" draggable="false"></div>
          <h2>Eduarda Beguoci</h2>
          <span>Design do Jogo</span>
        </li>
        <li class="card">
            <div class="img"><img src="logoH.jpeg" alt="img" draggable="false"></div>
            <h2>Hillary Julia</h2>
            <span>Design do Jogo</span>
          </li>
        
        <li class="card">
          <div class="img"><img src=logoC.jpg alt="img" draggable="false"></div>
          <h2>Camila Silva</h2>
          <span>Desenvolvedora da História</span>
        </li>
        
        
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>


</body>

  <script>

    const wrapper = document.querySelector(".wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper i");
    const carouselChildrens = [...carousel.children];
    
    let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId, autoPlayInterval;
    
    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);
    
    // Insert copies of the last few cards to the beginning of the carousel for infinite scrolling
    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });
    
    // Insert copies of the first few cards to the end of the carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });
    
    // Scroll the carousel at the appropriate position to hide the first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");
    
    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
    });
    
    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        // Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    }
    
    const dragging = (e) => {
        if(!isDragging) return; // if isDragging is false return from here
        // Updates the scroll position of the carousel based on the cursor movement
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }
    
    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    }
    
    const infiniteScroll = () => {
        // If the carousel is at the beginning, scroll to the end
        if(carousel.scrollLeft === 0) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
            carousel.classList.remove("no-transition");
        }
        // If the carousel is at the end, scroll to the beginning
        else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }
    
        // Clear existing timeout & start autoplay if the mouse is not hovering over the carousel
        clearTimeout(timeoutId);
        if(!wrapper.matches(":hover")) autoPlay();
    }
    
    const autoPlay = () => {
        if(window.innerWidth < 800 || !isAutoPlay) return; // Return if the window is smaller than 800 or isAutoPlay is false
        // Autoplay the carousel after every 2500 ms
        timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
    }
    
    // Start the autoPlay function at regular intervals
    autoPlayInterval = setInterval(autoPlay, 2500);
    
    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => {
        clearTimeout(timeoutId);
        clearInterval(autoPlayInterval);
    });
    wrapper.addEventListener("mouseleave", () => {
        autoPlay();
        autoPlayInterval = setInterval(autoPlay, 2500);
    });
    </script>
  
</html>