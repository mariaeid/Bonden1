
<nav class="fontNav navbar navbar-expand-sm navbar-dark bg-dark navStyle fixed-top"> <!-- Add fixed-top to nav? -->
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
          <li class="nav-item">
              <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/info.php' ? 'active' : ''; ?>" href="/info.php">Om föreningen</a>
          </li><!-- /nav-item -->
          <li class="nav-item">
              <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/board.php' ? 'active' : ''; ?>" href="/board.php">Styrelsen</a>
          </li><!-- /nav-item -->
          <li class="nav-item">
              <?php if (isset($_SESSION['user'])): ?>
                  <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/users.php' ? 'active' : ''; ?>" href="/users.php"><?php echo "Medlemmar" ?></a>
              <?php endif; ?>
          </li><!-- /nav-item -->
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
