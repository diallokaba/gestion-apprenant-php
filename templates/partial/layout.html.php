<?php 
    if(isset($_SESSION["role"]) != null && $_SESSION["role"] == 'ROLE_APPRENANT'){
        $disabledAttr = 'disabled';
    }else{
        $disabledAttr = '';
    }
?>

<div class="sticky-cogs">
    <i class="fas fa-cog"></i>
</div> 
<input type="checkbox" id="sidebar-toggle">
<div class="container">
    <div class="side-bar pl-15 mr-1">
        <div class="sonatel-logo mt-1 mb-2"></div>
        <div class="p-tb-l-r mb-13"><i class="fas fa-minus"></i>&nbsp;Menu</div>
        <div class="navigate-link">
            <ul>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="dashboard">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit"><i class="fas fa-align-right"></i>&nbsp;Dashbord</button></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-promotion">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit" <?= $disabledAttr ?>><i class="fas fa-calculator"></i>&nbsp;&nbsp;Promos</button></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-referentiel">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit" <?= $disabledAttr ?>><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Referentiels</button></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-utilisateur">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit" <?= $disabledAttr ?>><i class="fas fa-user-cog"></i>&nbsp;&nbsp;Utilisateurs</button></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-apprenant">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit" <?= $disabledAttr ?>><i class="fas fa-user-graduate"></i>&nbsp;&nbsp;Apprenants</button></li>
                </form>
                <form action="">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit" <?= $disabledAttr ?>><i class="far fa-user-circle" <?= $disabledAttr ?>></i>&nbsp;&nbsp;Visiteurs</button></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-presence">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit"><i class="fa fa-qrcode" aria-hidden="true"></i>&nbsp;&nbsp;Présence</button></li>
                </form>
                <form action="">
                    <li class="p-tb-l-r"><a href="#"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Événement</a></li>
                </form>
            </ul>
        </div>
    </div>
    <div class="right-side mr-15">
        <div class="header d-flex-s-between-align-i-center">
            <div class="left pl-15">
                <form action="" method="post">
                    <label for="sidebar-toggle" class="mr-15" style="cursor: pointer;"><i class="fas fa-bars"></i></label>
                    <a href="#" class="mr-15 style-qr"><img src="../public/images/applications.png" width="2%" alt=""></a>
                    <?php 
                       if($_POST["layout"] == 'list-referentiel'){
                        echo '<input type="hidden" name="layout" value="list-referentiel">';
                       }else if($_POST["layout"] == 'list-presence'){
                        echo '<input type="hidden" name="layout" value="list-presence">';
                       }else if($_POST["layout"] == 'list-apprenant'){
                        echo '<input type="hidden" name="layout" value="list-apprenant">';
                       }else if($_POST["layout"] == 'promos'){
                        echo '<input type="hidden" name="layout" value="promos">';
                       }
                    ?>
                    <button type="submit" class="btn-search-header"><i class="fas fa-search" style="font-size: 1.1rem"></i></button>
                    <input type="text" name="global_search" class="form-control-global-header" placeholder="Faites une recherche">
                </form>
            </div>
            <div class="right">
                <a href="#" class="border-calandar" style="margin-right:10px"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;20 March 2024</a></a>
                <a href="#" class="style-minus" style="margin-right:10px"><i class="fas fa-minus"></i></a>
                <div style="margin-right:15px;">
                    <p style="margin-bottom: 5px;"><?php  echo isset($_SESSION["role"]) ? $_SESSION["role"] : null; ?></p>
                    <div style="display: flex; justify-content: space-between">
                        <div>
                            <span style="color: #009187;"><?php echo isset($_SESSION["nom"]) ? $_SESSION["nom"] : null ?>&nbsp;<?php echo isset($_SESSION["prenom"]) ? $_SESSION["prenom"] : null ?></span>
                        </div>&nbsp;
                        
                        <!-- &nbsp;<i class="fas fa-angle-down"></i> -->
                        <div class="dropdown">
                            <button class="dropbtn"><i class="fas fa-angle-down"></i></button>
                            <div class="dropdown-content">
                                <a href="#"><i class="fas fa-user"></i>&nbsp;Mon profil</a>
                                <form action="" method="POST">
                                    <button type="submit" class="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;Déconnexion</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <?php
                switch($_POST['layout']){
                    case 'list-promotion':  
                        include('list-promotion.html.php');
                        break;
                    case 'dashboard':  
                        include('dashboard.html.php');
                        break;
                    case 'list-apprenant':
                        include('list-apprenant.html.php');
                        break;
                    case 'list-referentiel':
                        include('list-referentiel.html.php');
                        break;
                    case 'list-presence':
                        include('list-presence.html.php');
                        break;
                    case 'list-utilisateur':
                        include('list-utilisateur.html.php');
                        break;
                    case 'create-promotion':
                        include('create-promotion.html.php');
                        break;
                    default: 
                        include('list-promotion.html.php');
                }
            ?>
        </div>
        <div class="footer">
            <h5>©&nbsp;Sonatel Academy</h5>
        </div>
    </div>
</div>
</body>
</html>