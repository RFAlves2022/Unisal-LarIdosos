<?php
include_once "header.php";
include_once "dbConnection.php";

session_start();
/*//verifica se o usuario está logado
if (isset($_SESSION['username'])) {
    header("Location: teste.php"); // Redireciona para a página de teste se já estiver logado   
    exit();
}
*/
?>
<main>
    <section class="vh-100" style="background-color: #DAFFEF;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="img/img-loginPage.png"
                                    alt="Formulario Login" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Bem-vindo!</h5>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label">Usuario:</label>
                                            <input type="email" id="" class="form-control form-control-lg" />
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" >Senha:</label>
                                            <input type="password" class="form-control form-control-lg" />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="button">Entrar</button>
                                        </div>

                                        <a class="small text-muted" href="#!">Esqueceu a senha?</a><br>
                                        <a href="#!" class="small text-muted">Política de privacidade</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once "footer.php" ?>

