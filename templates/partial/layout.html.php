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
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit"><i class="fas fa-calculator"></i>&nbsp;&nbsp;Promos</button></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-referentiel">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Referentiels</button></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-apprenant">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit"><i class="far fa-user-circle"></i>&nbsp;&nbsp;Utilisateurs</button></li>
                </form>
                <form action="">
                    <li class="p-tb-l-r mb-13"><a href="#"><i class="far fa-user-circle"></i>&nbsp;&nbsp;Visiteurs</a></li>
                </form>
                <form action="" method="post">
                    <input type="hidden" name="layout" value="list-presence">
                    <li class="p-tb-l-r mb-13"><button style="border: none; background-color: transparent; font-size: 1.05rem" type="submit"><i class="far fa-user-circle"></i>&nbsp;&nbsp;Présence</button></li>
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
                <div style="margin-right:10px">
                    <p><?=$_SESSION["role"]?></p>
                    <p><span style="color: #009187;"><?=$_SESSION["nom"]?>&nbsp;<?=$_SESSION["prenom"]?></span>&nbsp;<i class="fas fa-angle-down"></i></p>
                </div>
            </div>
        </div>

        <div class="d-flex-s-between-align-i-center mt-15  mb-15">
            <h3>Promotion: <?php echo "<span style='color: #009187;'>$activeNumberPromo</span>" ?></h3>
            <div class="d-flex-align-i-center">
                <div class="d-flex-align-i-center">
                    <h4>Promos</h4>&nbsp;
                    <p style="margin-bottom: 10px; font-weight: bold; font-size: 25px;">.</p>&nbsp;
                    <h4>Création</h4> 
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