<form action="" method="POST">
    <input type="hidden" name="layout" value="promos">
    <div class="container-login">
        <div class="login-logo mb-15"></div>
        <div class="card-loging">
            <div class="h-16 mb-8">
                <input type="text" class="form-control-login alert-danger" value="Email et Mot de Passe Requis" readonly>
            </div>
            <div class="h-16 mb-l-15">
                <label>Enter Address <span class="asterisk">*</span></label>
                <!-- <p class="asterisk-email">*</p> -->
                <input type="email" class="form-control-email mt-2" placeholder="Enter email address">
            </div>
            <div class="h-16 password-eye">
                <label>Password <span class="asterisk">*</span></label>
                <!-- <p class="asterisk-password">*</p> -->
                <input type="password" class="form-control-email mt-2" placeholder="Enter your password">
                <button class="eye-slash"><i class="fas fa-eye-slash"></i></button>
            </div>
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