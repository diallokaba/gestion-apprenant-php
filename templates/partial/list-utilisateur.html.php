<div class="d-flex-s-between-align-i-center mt-15  mb-15">
    <h3>Administrateur: promo active<?php echo "<span style='color: #009187;'>($activeNumberPromo)</span>" ?></h3>
    <div class="d-flex-align-i-center">
        <div class="d-flex-align-i-center">
            <h4>Liste</h4>&nbsp;
            <p style="margin-bottom: 10px; font-weight: bold; font-size: 25px;">.</p>&nbsp;
            <h4>Admins</h4> 
        </div>
    </div>
</div>

<div class="card-presence">
    <div class="d-flex-s-between-align-i-center" style="margin-top: 10px">
        <h4>Liste des utilisateurs <span class="color-success"><?php echo '('.count($utilisateurs).')'?></span></h4>
        <div>
            <a href="#popup1" class="btn-app btn-success"><i class="fas fa-plus"></i>&nbsp;Nouveau</a>
        </div>
    </div>

    <div style="margin-right: 15px; margin-top: 30px">
        <table style="width: 100%;">
            <thead>
                <tr style="background-color: #F7FAFF;" class="text-center">
                    <th  style="padding: 15px 0;">Image</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($utilisateurs as $app) : ?>
                <tr style="text-align: center">
                    <td style="padding: 10px 0;"><i class="fas fa-user-cog" style="font-size: 1.7rem"></i></td>
                    <td><?=$app['nom']?></td>
                    <td><?=$app['prenom']?></td>
                    <td><?=$app['email']?></td>
                    <td><?=$app['genre']?></td>
                    <td><?=$app['telephone']?></td>
                    <td>
                        <button style="width: 20px; height: 20px; border: none"></button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>