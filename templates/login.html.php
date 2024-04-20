<form action="" method="POST">
    <input type="hidden" name="layout" value="promos">
    <input type="hidden" name="connexion">
    <div class="container-login">
        <div class="login-logo mb-15"></div>
        <div class="card-loging">
            <?php
                if($goodCredentials == false){
                    echo "<div class='h-16 mb-8'>
                        <input type='text' class='form-control-error alert-danger' value='Email et/ou Mot de Passe Incorrect' readonly>
                     </div>";
                }
            ?>
            <div class="h-16" style="margin-bottom: 60px">
                <label>Enter Address <span class="asterisk">*</span></label>
                <!-- <p class="asterisk-email">*</p> -->
                <input type="text" name="email" class="form-control-email mt-2" placeholder="Enter email address" value="<?=isset($_POST["email"]) ? $_POST["email"] : '' ?>">
            </div>
            <?php
                if($emptyEmail){
                    echo "<div style='color: red; margin-top: -20px; margin-bottom: 17px;'>L'adresse e-mail est obligatoire</div>";
                }
            ?>
            <div class="h-16 password-eye" >
                <label>Password <span class="asterisk">*</span></label>
                <!-- <p class="asterisk-password">*</p> -->
                <input type="password" id="password" name="password" class="form-control-email mt-2" placeholder="Enter your password" value="<?=isset($_POST["password"]) ? $_POST["password"] : '' ?>">
                <a style="cursor: pointer" class="eye-slash" onclick="showOrHidePassword()"><i class="fas fa-eye" style="font-size: 1.7rem;"></i></a>
            </div>
            <?php
                if($emptyPassword){
                    echo "<div style='color: red; margin-top: 50px; margin-bottom: -55px;'>Le mot de passe est obligatoire</div>";
                }
            ?>
        </div>

        <div class="flex-login">
            <div>
                <input type="checkbox">
                <label for="">Remember me</label>
            </div>
            <div>
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </div>
        <div class="btn-login">
            <button class="btn btn-success log" type="submit">Log in</button>
        </div>
    </div>
</form>

<script>
    function showOrHidePassword(){
        let inputPwd = document.getElementById('password');
        let eyeIcon = document.querySelector('.eye-slash i');
        if(inputPwd.type === 'password'){
            inputPwd.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }else{
            inputPwd.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>