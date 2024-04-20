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
                    <input type="text" class="form-control-ref mt-10" id="libelle-ref" name="libelle" placeholder="Entrer le libelle" value="<?=isset($_POST["libelle"]) ? $_POST["libelle"] : '' ?>">
                </div>
                <?php 
                    if($libEmptyOrNull){
                        echo "<p style='color: red; margin-top: 10px;'>Le libelle ne doit pas être vide</p>";
                    }
                ?>
                <div class="style-libelle mt-ref-20">
                    <span class="user-1"><i class="far fa-user"></i></span>
                    <label>Description</label>
                    <input type="text" class="form-control-ref mt-ref-10" id="description-ref" name="description" placeholder="Entrer la description" value="<?=isset($_POST["description"]) ? $_POST["description"] : '' ?>">
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
                    <input id="style-image-file" type="file" class="mt-ref-10" name="image" accept="image/*,.doc,.docx,application/pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" onchange="previewFile(this)">
                    <div>
                        <img id="preview" src="#" alt="Aperçu de l'image" style="display: none; width: 200px; max-height: 200px; margin-top: 10px">
                    </div>
                    <p id="fileTypeError" style="color: red; display: none; margin-top: 10px;">Le type de fichier choisi n'est pas bon.</p>
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

    function previewFile(input){
        var file = input.files[0];
        var preview = document.getElementById('preview');
        var fileTypeError = document.getElementById('fileTypeError');

        if (file) {
            var fileType = file.type.split('/')[0];
            if (fileType === 'image') {
                var reader = new FileReader();

                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                    fileTypeError.style.display = 'none';
                }

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                fileTypeError.style.display = 'block';
            }
        }
    }
</script>