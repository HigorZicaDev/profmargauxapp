<header class="header" data-header>
  <div class="container">

    <h1>
      <a href="#" class="logo"><img src="./assets/images/logoNew.png" alt=""></a>
    </h1>

    <nav class="navbar container" data-navbar>
      <ul class="navbar-list">

        <li class="navbar-item">
          <a href="#home" class="navbar-link" data-nav-link>Home</a>
        </li>

        <li class="navbar-item">
          <a href="#objetivos" class="navbar-link" data-nav-link>Objetivos</a>
        </li>

        <li class="navbar-item">
          <a href="#informacoes" class="navbar-link" data-nav-link>Informações</a>
        </li>

        <li class="navbar-item">
          <a href="#sobre" class="navbar-link" data-nav-link>Sobre</a>
        </li>

        <li class="navbar-item">
          <a href="#contato" class="navbar-link" data-nav-link>Contato</a>
        </li>

        <li class="navbar-item">
          <a href="{{ route('login') }}" class="navbar-link" data-nav-link>Login</a>
        </li>

      </ul>
    </nav>

    <button class="btn btn-secondary" onclick="enviarMensagem()" style="display: flex;">
      <div class="svg-wrapper-1">
        <div class="svg-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
          </svg>
        </div>
      </div>
      <span>FALE COM PROF. MARGAUX</span>
    </button>

    <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggle-btn>
      <ion-icon name="menu-outline" class="menu-icon"></ion-icon>
      <ion-icon name="close-outline" class="close-icon"></ion-icon>
    </button>

  </div>
</header>