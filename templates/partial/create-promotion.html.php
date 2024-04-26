<div class="d-flex-s-between-align-i-center mt-15  mb-15">
    <h3>Promotions</h3>
    <div class="d-flex-align-i-center">
        <div class="d-flex-align-i-center">
            <h4>Promos</h4>&nbsp;
            <p style="margin-bottom: 10px; font-weight: bold; font-size: 25px;">.</p>&nbsp;
            <h4>Création</h4> 
        </div>
    </div>
</div>

<div class="card-new-promotion p-promo-25">
    <div class="number-new-promo d-flex-align-items-center-flex-d-column">
        <div class="style-number-promo"><strong>1</strong></div>
        <div class="border"></div>
        <div class="style-number-promo"><strong>2</strong></div>
    </div>
    <div class="form-content">
        <h3 style="margin-bottom: 35px; margin-top: 15px">Promotion</h3>
        <form action="" method="post" id="create-promotion-form">
            <input type="hidden" name="layout" value="create-promotion">
            <input type="hidden" name="new-promo">
            <div>
                <label>Libelle <span style="color: red">*</span></label>
                <div>
                    <input type="text" name="libelle" class="form-control-new-promo mt-15" placeholder="Entrer le libelle" value="<?= isset($_POST["libelle"]) ? $_POST["libelle"] : '' ?>">
                    <?php 
                        if($isEmptyLibelle){
                            echo "<div style='color:red; margin-top: 10px; margin-bottom: -8px;'>Veuillez saisir le libelle</div>";
                        }
                    ?>
                </div>
            </div>
            <div class="date">
                <div class="date-style pr-15 ml-16">
                    <label>Date Début <span style="color: red">*</span></label>
                    <div class="mr-5">
                        <input type="date" name="dateDebut" placeholder="MM/DD/YYYY" class="form-control-new-promo mt-15" value="<?= isset($_POST["dateDebut"]) ? $_POST["dateDebut"] : '' ?>">
                        <?php 
                            if($isEmptyDateDebut){
                                echo "<div style='color:red; margin-top: 10px; margin-bottom: -20px;'>Veuillez sélectionner la date de début de la promotion</div>";
                            }
                        ?>
                        <?php 
                            if($dateDebutIsBeforeTodayDate){
                                echo "<div style='color:red; margin-top: 10px; margin-bottom: -20px;'>La date début ne doit pas être inférieur à la date du jour</div>";
                            }
                        ?>
                    </div>
                </div>
                <div class="date-style pl-15">
                    <label>Date Fin <span style="color: red">*</span></label>
                    <div>
                        <input type="date" name="dateFin" placeholder="MM/DD/YYYY" class="form-control-new-promo mt-15" value="<?= isset($_POST["dateFin"]) ? $_POST["dateFin"] : '' ?>">
                        <?php 
                        if($isEmptyDateFin){
                            echo "<div style='color:red; margin-top: 10px; margin-bottom: -20px;'>Veuillez sélectionner la date de fin de la promotion</div>";
                        }
                    ?>
                    </div>
                </div>
            </div>
            <?php 
                if($dateFinIsBeforeBeginDate){
                    echo "<div style='color:red; margin-top: 15px; margin-bottom: -30px; text-align: center'>La date de fin doit être supérieur à la date de début</div>";
                }
            ?>

            <div class="d-flex-s-between-align-i-center mb-35 ml-16" style="margin-top: 40px">
                <div>
                    <button type="button" class="btn btn-primary btn-new-promo" onclick="addReferentiel()">Ajouter Référentiel(5)</button>
                </div>
                <div>
                    <button type="button" class="btn btn-success btn-new-promo" onclick="submitCreatePromotion()">Créer Promotion</button>
                </div>
            </div>
        </form>

        <form action="" method="post" id="add-referentiel-form" style="display: none;">
            <input type="hidden" name="ref">
        </form>

        <div <?php echo $isEmptyLibelle == true ? "class='mt-new-p-26'" : "class='mt-new-p-57'"  ?>>
            <div style="display: flex; justify-content: space-between">
                <h3>Référentiels</h3>
                <h4 id="<?= $message ?>" style='display: none; color: green'>Promotion ajoutée avec succès</h4>
            </div>            
        </div>
    </div>
</div>

<script>
    function addReferentiel() {
        // Afficher le formulaire pour ajouter le référentiel
        let formRef = document.getElementById("add-referentiel-form");
        formRef.style.display = "block";
        formRef.submit();
    }

    function submitCreatePromotion() {
        // Soumettre le formulaire de création de promotion
        document.getElementById("create-promotion-form").submit();
    }
    
    let message;
    message = document.getElementById('succes').id;
    console.log(message);
    if(message != null && message == "succes"){
        message = document.getElementById('succes');
        message.style.display = 'block';
        setTimeout(function() {
            message.style.display = 'none';
        }, 4000); 
    }
</script>