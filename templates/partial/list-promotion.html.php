<div class="d-flex-s-between-align-i-center mt-15  mb-15">
    <h3>Promotion: <?php echo "<span style='color: #009187;'>$activeNumberPromo</span>" ?></h3>
    <div class="d-flex-align-i-center">
        <div class="d-flex-align-i-center">
            <h4>Liste</h4>&nbsp;
            <p style="margin-bottom: 10px; font-weight: bold; font-size: 25px;">.</p>&nbsp;
            <h4>Promotions</h4> 
        </div>
    </div>
</div>

<div class="first-card">
    <div class="second-card">
        <div class="d-flex-s-between-align-i-center">
            <h3>Liste des promotions <span style="color: #009187;"><?php echo '('.count($promotions).')'?></span></h3>
            <div class="d-flex-s-between-align-i-center">
                <div class="search-and-icon">
                    <input type="text" class="form-control-promo mr-15" placeholder="Rechercher ici">
                    <span class="design-icone"><i class="fas fa-search"></i></span>
                </div>
                <form action="" method="post">
                    <div>
                        <input type="hidden" name="layout" value="create-promotion">
                        <button type="submit" class="btn btn-success btn-promo"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nouvelle</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-10">
            <table style="width: 100%;">
                <tr style="background-color: #F7FAFF; text-align: center">
                    <th  style="padding: 23px 0;"></th>
                    <th>Libelle</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Etat</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($promotions as $p): ?>
                <tr style="text-align: center">
                    <td style="padding: 10px 0;"><img src="images/equipement.png" alt="Me" height="50"></td>
                    <td>
                        <?php
                            if($p['state']){
                                echo "<span style='color: #009187;'>{$p['libelle']}</span>";
                            }else{
                                echo "<span>{$p['libelle']}</span>";
                            }
                        ?>
                    </td>
                    <td><?=$p["date_debut"]?></td>
                    <td><?=$p["date_fin"]?></td>
                    <td>
                        <?php
                            if($p['state']){
                                echo '<span style="color: #009187;">actif</span>';
                            }else{
                                echo '<span style="color: red;">inactif</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="layout" value="list-promotion">
                            <input type="checkbox" name="send-check" <?= $p['state'] == 1 ? 'checked' : '' ?> onchange="this.form.submit()" value="<?=$p['id']?>"> 
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
        <div class="pages" style="margin-top: 2%">
            <div class="nbitems">
                Items per page:
                <select name="nbitems" >
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
            </div>
            <div class="pagination">
                111-120 of 128
                <button>
                    I<i class='fas fa-angle-left'></i>
                </button>
                <button>
                    <i class='fas fa-angle-left'></i>
                </button>
                <button>
                    <i class='fas fa-angle-right'></i>
                </button>
                <button>
                    <i class='fas fa-angle-right'></i>I
                </button>
            </div>
        </div>
    </div>
</div>
