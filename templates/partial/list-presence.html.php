<div class="card-presence">
    <form action="" method="post">
        <input type="hidden" name="recherche" value="filter_presence">
        <input type="hidden" name="layout" value="list-presence">
        <div class="form-list-presence">
            <div>
                <select name="status" class="select-presence">
                    <option value="status">All</option>
                    <option value="absent" <?php if($_SESSION["status"] =="absent") echo "selected"?>>Absent</option>
                    <option value="present" <?php if($_SESSION["status"] =="present") echo "selected"?>>Présent</option>
                </select>
            </div>
            <div>
                <select name="referentiel" id="" class="select-presence">
                    <option value="referentiel">Référentitiel</option>
                    <option value="dev_web" <?php if($_SESSION["ref"] == 'dev_web') echo "selected"?>>Dev Web/Mobile</option>
                    <option value="dev_data" <?php if($_SESSION["ref"] == 'dev_data') echo "selected"?>>Dev Data</option>
                    <option value="ref_dig" <?php if($_SESSION["ref"] == 'ref_dig') echo "selected"?>>Referent Digital</option>
                    <option value="aws" <?php if($_SESSION["ref"] == 'aws') echo "selected"?>>AWS</option>
                    <option value="securite" <?php if($_SESSION["ref"] == 'securite') echo 'selected'?>>Sécurité</option>
                </select>
            </div>
            <div>
                <input type="date" name="date" class="form-control-presence" value="<?php echo isset($_POST['date']) ? $_POST['date'] : date('Y-m-d'); ?>">
            </div>
            <div>
                <button class="btn-presence btn-success" typ="submit">Rafraichir</button>
            </div>
        </div>  
    </form>

    <div class="">
        <table style="width: 100%;">
            <tr style="background-color: #F7FAFF; text-align: center">
                <th style="padding: 25px 0;">Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Référentiel</th>
                <th>Heure d'arrivée</th>
                <th>Status</th>
            </tr>
            <?php
                //Nombre d'élément par page appélé aussi size
                $elementsPerPage = 5;
                //Nombre total d'éléments
                $totalElements = count($presences);
                //Récupération du nombre total de page
                $totalPages = ceil($totalElements/$elementsPerPage);
                //page actuelle
                $page = isset($_POST['page']) && is_numeric($_POST['page']) ? $_POST['page'] : 1;
                //offset en kafka index unique de chaque message
                //Avec la pagination, l'indice dé départ commence toujours à 0 donc cette variable permet de récupérer l'indice départ
                //pour extraire les éléments de la page actuelle
                $offset = ($page - 1) * $elementsPerPage;
                // Filtrer les présences en fonction de la page actuelle
                $presencesPaginated = array_slice($presences, $offset, $elementsPerPage);
           
                foreach($presencesPaginated as $p):
            ?>
            <tr style="text-align: center">
                <td style="padding: 15px 0; color: #009187;"><?=$p["matricule"]?></td>
                <td><?=$p["nom"]?></td>
                <td><?=$p["prenom"]?></td>
                <td><?=$p["telephone"]?></td>
                <td><?=$p["heure_arrivee"]?></td>
                <td><?=$p["referentiel"]?></td>
                <td>
                    <?php
                    if($p["status"] == 'present'){
                        echo '<button style="padding: 5px 6px 7px 6px; background-color: #e2edff; color: green; border: none; border-radius: 3px">present</button>';
                    }else if($p["status"] == 'absent'){
                        echo '<button style="padding: 5px 6px 7px 6px; background-color: #f8d7da; color: red; border: none; border-radius: 3px">absent</button>';
                    }
                    ?>
                </td>
            </tr>

            <?php endforeach
            ?>
        </table>
    <div>    
        <!-- Pagination -->
        <div class="pages" style="margin-top: 2%">
            <div class="nbitems">
                Items per page:
                <select name="nbitems" onchange="changeItemsPerPage(this)">
                    <option value="5" <?= ($elementsPerPage == 5) ? 'selected' : '' ?>>5</option>
                    <option value="10" <?= ($elementsPerPage == 10) ? 'selected' : '' ?>>10</option>
                    <option value="15" <?= ($elementsPerPage == 15) ? 'selected' : '' ?>>15</option>
                    <option value="20" <?= ($elementsPerPage == 20) ? 'selected' : '' ?>>20</option>
                    <option value="25" <?= ($elementsPerPage == 25) ? 'selected' : '' ?>>25</option>
                </select>
            </div>
            <div class="pagination">
                <?php
                    $firstElement = ($page - 1) * $elementsPerPage + 1;
                    $lastElement = min($page * $elementsPerPage, $totalElements);
                    echo "$firstElement-$lastElement of $totalElements";
                ?>
               <button onclick="changePage(1)">
                    I<i class='fas fa-angle-left'></i>
               </button>
               <form action="" method="post">
                    <input type="hidden" name="layout" value="list-presence">
                    <input type="hidden" name="page" value="<?= $page - 1 ?>">
                    <button type="submit" onclick="changePage(<?= max($page - 1, 1) ?>)">
                        <i class='fas fa-angle-left'></i>
                    </button>
               </form>
               <form action="" method="post">
                    <input type="hidden" name="layout" value="list-presence">
                    <input type="hidden" name="page" value="<?= $page  + 1 ?>">
                    <button type="submit" onclick="changePage(<?= min($page + 1, $totalPages) ?>)">
                        <i class='fas fa-angle-right'></i>
                    </button>  
               </form>
        <button onclick="changePage(<?= $totalPages ?>)">
            <i class='fas fa-angle-right'></i>I
        </button>
            </div>
        </div>
 
        </div>
    </div>
</div>

<!-- <script>
    function changeItemsPerPage(select) {
        window.location.href = `?page=<?= $page ?>&elementsPerPage=${select.value}`;
    }

    function changePage(page) {
        window.location.href = `?page=${page}&elementsPerPage=<?= $elementsPerPage ?>`;
    }
</script> -->