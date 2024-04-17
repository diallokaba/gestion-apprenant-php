<div class="card-before mb-15">
    <div>
        <h4>Apprenants: <span style="color: #009187;">Promotion <?php echo $activeNumberPromo ?></span></h4>
    </div>
    <div>
        <h4>Référentiel: <span style="color: #009187;">Dev Web/Mobile</span></h4>
    </div>
</div>
                

<div class="card-app p-25">
    <div class="number-app d-flex-align-items-center-flex-d-column">
        <h3 class="style-number">1</h3>
        <div class="border"></div>
        <h3 class="style-number">2</h3>
    </div>
    <div class="form-content">
        <h4 class="mb-15 ml-15">Promotion</h4>
        <div class="ml-16 d-flex-s-between-align-i-center" style="margin-right: 15px">
            <h5>Liste des Apprenants <span class="color-success"><?php echo '('.count($apprenants).')'?></span></h5>
            <div>
                <a href="#popup1" class="btn-app btn-success"><i class="fas fa-plus"></i>&nbsp;Nouveau</a>
                <a href="#" class="btn-app btn-warning">Insertion en masse</a>
                <a href="#" class="btn-app btn-green-light"><i class="fas fa-download"></i>&nbsp;Fichier model</a>
                <a href="#" class="btn-app btn-primary">Liste des Exclus</a>
            </div>
        </div>
        <div class="ml-15 mt-30 search-input" style="margin-right: 15px">
            <span class="search"><i class="fas fa-search" style="color: black;"></i></span>
            <input type="text" class="form-control-app" placeholder="Filter">
        </div>
        <div class="ml-15 mt-10">
            <a href="#"><img src="../public/images/file-in-folder.jpeg" alt="folder" width="3%"></a>
        </div>

            <div class="mt-7" style="margin-right: 15px">
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
                        <?php foreach($apprenants as $app) : ?>
                        <tr style="text-align: center">
                            <td style="padding: 10px 0;"><i class="fas fa-user" style="font-size: 1.7rem"></i></td>
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

    <div class="mt-10 ml-15">
        <h4>Référentiels</h4>
    </div>
    </div>
</div>



<!-- popup ADD STUDENT -->
<!-- Le Modal (popup) -->
<div id="popup1" class="modal-student">
    <!-- Contenu du Modal -->
    <form action="#" method="post" class="modal-content">
      <div class="head">
        <h2>Nouvel Apprenant</h2>
        <a href="#" class="close">&times;</a>
      </div>
      <div class="section informations-perso">
        <div class="line flex">
          <span><i class="fa-solid fa-1"></i></span>
          <span>Informations Perso.</span>
          <span></span>
          <span><i class="fa-solid fa-2" style="color: #038e89;background: #f2f1ff"></i></span>
          <span>Informations Supplémentaires</span>
        </div>
        <div class="input-group">
          <div>
            <label for="nom_tuteur">Nom et Prénom tuteur</label>
            <input type="text" id="nom_tuteur" placeholder="Nom & Prénom tuteur" required>
          </div>
          <div>
            <label for="contact_tuteur">Contact Tuteur</label>
            <input type="text" id="contact_tuteur" placeholder="Contact Tuteur" required>
          </div>
          <div>
              <label for="email">Email</label>
              <input type="email" id="email" placeholder="Entrer l'email" required class="input-group input[type='email']">
          </div>
           <div>
            <label for="telephone">Telephone</label>
            <input type="text" id="telephone" placeholder="Entrer le telephone" required>
          </div>
          <div>
              <label for="sexe">Sexe</label>
              <select name="sexe" id="sexe" class="input-group select">
                  <option value="masculin">Masculin</option>
                  <option value="feminin">Feminin</option>
              </select>
          </div>
          <div class="date-input-container">
            <label for="casier_judiciaire">Date de Naissance</label>
            <input type="date" id="date_naissance" placeholder="MM/DD/YYYY" required>
            <i class="fa-solid fa-calendar-day"></i>
          </div>
          <div>
            <label for="visite_medicale">Lieu de Naissance</label>
            <input type="text" id="lieu_naissance" placeholder="Entrer le lieu de naissance" required>
          </div>
          <div>
              <label for="visite_medicale">Ṇ̣° CNI</label>
              <input type="text" id="lieu_naissance" placeholder="Entrer le numero de votre carte d'identité" required>
            </div>
        </div>
      </div>
      <br>
      <div class="section">
        <div class="btn-container">
          <a href="#" href="#popup2" class="btn" class="btn underline">Suivant</a>
        </div>
      </div>
    </form>
  </div>