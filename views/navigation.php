
<nav class="fontNav navbar navbar-expand-md navbar-dark bg-dark navStyle fixed-top"> <!-- Add fixed-top to nav? -->
  <a class="navbar-brand navStyle" href="index.php"><img class="logo" src="/../app/imgs/site/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbarXs">
      <span class="navbar-toggler-icon small"></span>
  </button>
  <div class="navbar-collapse collapse" id="collapsingNavbarXs">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/posts.php' ? 'active' : ''; ?>" href="/posts.php">Nyheter</a>
          </li><!-- /nav-item -->
          <li class="nav-item">
              <?php if (isset($_SESSION['user'])): ?>
                  <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/proposals.php' ? 'active' : ''; ?>" href="/proposals.php"><?php echo "Motioner" ?></a>
              <?php endif; ?>
          </li><!-- /nav-item -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle
            <?php if ($_SERVER['SCRIPT_NAME'] === '/info.php' || $_SERVER['SCRIPT_NAME'] === '/board.php' || $_SERVER['SCRIPT_NAME'] === '/users.php'): ?>
                <?php echo 'active' ?>
                <?php else: ?>
                    <?php echo '' ?>
            <?php endif; ?>
             " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Om föreningen
            </a>
            <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
              <a class="dropdown-item fontNavDropdown dropdownHover" href="/info.php">Allmän information</a>
              <a class="dropdown-item fontNavDropdown dropdownHover" href="/board.php">Styrelsen</a>
              <?php if (isset($_SESSION['user'])): ?>
                  <a class="dropdown-item fontNavDropdown dropdownHover" href="/users.php"><?php echo "Medlemmar" ?></a>
              <?php endif; ?>
          </li>

      </ul>
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <?php if (isset($_SESSION['user'])): ?>
                  <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/profile.php' ? 'active' : ''; ?>" href="/profile.php"><?php echo $_SESSION['user']['name'] ?></a>
              <?php endif; ?>
          </li><!-- /nav-item -->
          <li class="nav-item">
              <?php if (isset($_SESSION['user'])): ?>
                  <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/logout.php' ? 'active' : ''; ?>" href="/app/auth/logout.php"><?php echo "Logga ut" ?></a>
              <?php else : ?>
                  <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="/login.php">Logga in</a>
              <?php endif; ?>
          </li><!-- /nav-item -->
          <li class="nav-item">
              <?php if (!isset($_SESSION['user'])): ?>
                  <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/signup.php' ? 'active' : ''; ?>" href="/signup.php"><?php echo "Skapa konto" ?></a>
              <?php endif; ?>
          </li><!-- /nav-item -->
      </ul>
  </div>
</nav><!-- /navbar -->
