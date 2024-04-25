<div class="d-flex-s-between-align-i-center mt-15  mb-15">
    <h3>Apprenant: promo<?php echo "<span style='color: #009187;'>($activeNumberPromo)</span>" ?></h3>
    <div class="d-flex-align-i-center">
        <div class="d-flex-align-i-center">
            <h4>Liste</h4>&nbsp;
            <p style="margin-bottom: 10px; font-weight: bold; font-size: 25px;">.</p>&nbsp;
            <h4>Apprenants</h4> 
        </div>
    </div>
</div>

<div class="card-before mb-15">
    <div>
        <h4>Apprenants: <span style="color: #009187;">Promotion <?php echo $activeNumberPromo ?></span></h4>
    </div>
    <div style="display: flex">
        <h4>Référentiel: <span style="color: #009187;">Dev Web/Mobile</span></h4>&nbsp;&nbsp;
        <div class="dropdown-app">
          <button title="Filtrer par référentiel" class="dropdown-btn-app"><i class="fas fa-angle-down"></i></button>
          <div class="dropdown-content-app <?=$_SESSION['dropdown']?>" id="dropdown-id">
            <form action="" method="POST" id="send-form-ref"> 
                <input type="hidden" name="layout" value="list-apprenant">
                <input type="hidden" name="filter-by-ref-app">
                <label for="dev_web">
                    Dev Web/Mobile &nbsp;&nbsp;
                    <input type="checkbox" onchange="this.form.submit()" name="Dev Web/Mobile" id="dev_web" <?php if(!empty($_SESSION["Dev Web/Mobile"])) echo 'checked';?>>
                </label><br><br>
                <label for="ref_dig">
                    Referent Digital &nbsp;&nbsp;
                    <input type="checkbox" onchange="this.form.submit()" name="Referent Digital" id="ref_dig" <?php if(!empty($_SESSION["Referent Digital"])) echo 'checked';?>>
                </label><br><br>
                <label for="aws">
                    AWS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <input type="checkbox" onchange="this.form.submit()" name="AWS" id="aws" <?php if($_SESSION["AWS"] =="active")  echo 'checked';?>> -->
                    <input type="checkbox" onchange="this.form.submit()" name="AWS" id="aws" <?php if(!empty($_SESSION["AWS"])) echo 'checked';?>>
                </label><br><br>
                <label for="securite">
                    Cyber Securité &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" onchange="this.form.submit()" name="Cyber Securité" id="securite" <?php if(!empty($_SESSION["Cyber Securité"])) echo 'checked';?>>
                </label><br><br>
              </form>
            <!-- <form action="" method="POST">
              <input type="hidden" name="layout" value="list-apprenant">
              <input type="hidden" name="filter-by-ref-app">
              <label for="dev_web">
                Dev Web/Mobile &nbsp;
                <input type="checkbox" name="list-referentiel[]" id="dev_web" value="Dev Web/Mobile">
              </label><br><br>
              <label for="ref_dig">
                Referent Digital &nbsp;&nbsp;
                <input type="checkbox" name="list-referentiel[]" id="ref_dig" value="Referent Digital">
              </label><br><br>
              <label for="aws">
                AWS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="list-referentiel[]" id="aws" value="AWS">
              </label><br><br>
              <label for="cyber">
                Cyber Securité &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="list-referentiel[]" id="cyber" value="Cyber Securité">
              </label><br><br>
              <button style="border: none; background: none; padding-bottom: 8px;" title="Filtrer" type="submit"><i class="fa fa-filter" style="font-size: 1.2rem" aria-hidden="true"></i></button>
            </form> -->
          </div>
        </div>
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

<script>
  let idDropdown =q document.getElementById('dropdown-id');
  document.querySelectorAll('.dropdown-btn-app').forEach(button => {
        button.addEventListener('click', function(event) {
            if(idDropdown.classList.contains("activer")){
              idDropdown.classList.remove("activer");
            }else{
              idDropdown.classList.add("activer");   
            }
        });

  });
</script>

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