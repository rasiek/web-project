<section class="header">
        
        <header>
            <img src="static/imgs/logo.png" alt="logo">
            <a href="index.php">Note-iT</a>
        </header>
        
        <nav class="navbar">

            <ul>
                <li><a href="annonces.php">Annonces</a></li>
                <li><a href="annonces_dyna.php">Annonces Dynamiques</a></li>
                <li><a href="recherche.php">Recherche</a></li>
            </ul>

            
            <div class="bars">
                <a href="javascript:void(0)" class="icon-menu" onclick="openNav()">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            
            <div class="sideNav" id="sideNav">
                <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">
                    <i class="fas fa-times"></i>
                </a>
                <a href="annonces.php">Annonces</a>
                <a href="annonces_dyna.php">Annonces Dynamiques</a>
                <a href="recherche.php">Recherche</a>
                <a href="#">Connexion</a>
                
            </div>
        </nav>
            <div class="conn">
                <div class="dropdown">
                    <button id="welcome_btn" class="dropbtn <?php if (!isset($_SESSION['username'])) { echo "no-show"; } ?>">
                    <?php if (isset($_SESSION['username'])) { echo "Bonjour, " . ucfirst($_SESSION['username']); } ?></button>
                    <button id="conn_btn" class="dropbtn <?php if (isset($_SESSION['username'])) { echo "no-show"; } ?>">Se connecter</button>
                    <div id="myDropdown" class="dropdown-content">

                        <form id="login-box" method="post" class="login-window <?php if(isset($_SESSION['username'])) { echo 'no-show'; } ?>">
                            <div class="textbox">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder='Username' name='username' required>
                            </div>

                            <div class="textbox">
                                <i class="fas fa-unlock-alt"></i>
                                <input type="password" placeholder='Password' name='password' required>
                            </div>

                            <input type="submit" class='btn' value='Se connecter'>
                        </form>

                        <div id="option-list" class="option-list <?php if (isset($_SESSION['username'])) { echo 'show-list'; }?>">
                            <ul>
                                <li><a href="logout.php">Deconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>