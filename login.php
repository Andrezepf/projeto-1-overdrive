<?php
include('./includes/header.php');
include('./includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label>CPF</label>
                            <input type="text" placeholder="Insira seu CPF (somente números)" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Senha</label>
                            <input type="password" placeholder="Insira sua Senha" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>