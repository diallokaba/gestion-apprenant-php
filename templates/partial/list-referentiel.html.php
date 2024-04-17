<div class="card-new-referentiel">
    <div class="left-part">
        <div class="flex-card">
            <?php foreach($referentiels as $ref) :?>
            <div class="card-ref p-15">
                <div class="mb-ref-15"><strong>...</strong></div>
                <div class="d-flex-align-items-center-flex-d-column" style="height: 100%;">
                    <img class="img-referentiel" src="<?= $ref["image"]?>" alt="">
                    <!-- <div class="img-referentiel"></div> -->
                    <div class="mt-10"><?=$ref['libelle']?></div>
                    <div class="mt-10"><?=$ref['etat'] ? "<span style='color: green'>active</span>" : "<span style='color: red'>inactive</span>" ?></div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="right-part">
        <div class="card-right p-15">
            <h1 style="font-size: 1.3rem;">Nouveau Référentiel</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="layout" value="list-referentiel">
                <input type="hidden" name="new-referentiel">
                <div class="style-libelle mt-ref-20">
                    <span class="user-1"><i class="far fa-user"></i></span>
                    <label>Libelle</label>
                    <input type="text" class="form-control-ref mt-10" name="libelle" placeholder="Entrer le libelle">
                </div>
                <?php 
                    if($libEmptyOrNull){
                        echo "<p style='color: red; margin-top: 10px;'>Le libelle ne doit pas être vide</p>";
                    }
                ?>
                <div class="style-libelle mt-ref-20">
                    <span class="user-1"><i class="far fa-user"></i></span>
                    <label>Description</label>
                    <input type="text" class="form-control-ref mt-ref-10" name="description" placeholder="Entrer la description">
                </div>
                <?php 
                    
                    if($descEmptyOrNull){
                        echo "<p style='color: red; margin-top: 10px;'>La description ne doit pas être vide</p>";
                    }
                ?>
                <!-- Toggle switch -->
                <div class="d-flex-s-between-align-i-center mt-ref-20">
                    <label class="switch">
                        <input type="hidden" name="status_hidden" value="0">
                        <input type="checkbox" name="status_checkbox" onchange="toggleSwitch(this)">
                        <span class="slider rounded"></span>
                    </label>
                    <label>Activer la promotion</label>
                </div>
                <div class="mt-ref-20">
                    <label>Sélectionner une image</label>
                    <input type="file" class="mt-ref-10" name="image" accept="image/*">
                </div>
                <div class="mt-20 d-flex-jc-center">
                    <button type="submit" class="btn-ref btn-success">Enregistrer</button>
                </div>
                <?php
                    if($refAlreadyExists){
                        echo "<p style='color: red; margin-top: 10px;'>Ce referentiel existe déjà pour cette promotion</p>";
                    }
                ?>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleSwitch(checkbox) {
        var hiddenInput = checkbox.parentNode.querySelector('input[type="hidden"]');
        if (checkbox.checked) {
            hiddenInput.value = "1";
        } else {
            hiddenInput.value = "0";
        }
    }
</script>