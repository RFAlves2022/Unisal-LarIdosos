<?php
include_once "header.php"
?>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <form class="form-inline my-2 my-lg-4 d-flex">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn my-2 my-sm-0" id="btnSearch">Pesquisar</button>
                </form>
            </div>
            <div class="col-2 mt-4">
                <a href="cadastroResidente.php">Cadastrar novo</a>
            </div>
        </div>

        <div class="row d-flex flex-wrap justify-content-center gap-3 pt-3">
            <!-- Card 1 -->
            <div class="card text-left rounded-4" style="
              width: 250px;
              height: 300px;
              margin-right: 20px;
              margin-bottom: 10px;
            ">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100" />
                <div class="card-body">
                    <h5 class="card-title text-center">João Silva</h5>
                    <label><strong>Idade:</strong> 68 anos</label><br />
                    <label><strong>Email:</strong> joao.silva@email.com</label>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card text-left rounded-4" style="
              width: 250px;
              height: 300px;
              margin-right: 20px;
              margin-bottom: 10px;
            ">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100" />
                <div class="card-body">
                    <h5 class="card-title text-center">Maria Souza</h5>
                    <label><strong>Idade:</strong> 54 anos</label><br />
                    <label><strong>Email:</strong> maria.souza@email.com</label>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card text-left rounded-4" style="
              width: 250px;
              height: 300px;
              margin-right: 20px;
              margin-bottom: 10px;
            ">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100" />
                <div class="card-body">
                    <h5 class="card-title text-center">Carlos Lima</h5>
                    <label><strong>Idade:</strong> 41 anos</label><br />
                    <label><strong>Email:</strong> carlos.lima@email.com</label>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card text-left rounded-4" style="
              width: 250px;
              height: 300px;
              margin-right: 20px;
              margin-bottom: 10px;
            ">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100" />
                <div class="card-body">
                    <h5 class="card-title text-center">Ana Paula</h5>
                    <label><strong>Idade:</strong> 33 anos</label><br />
                    <label><strong>Email:</strong> ana.paula@email.com</label>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="card text-left rounded-4" style="
              width: 250px;
              height: 300px;
              margin-right: 20px;
              margin-bottom: 10px;
            ">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100" />
                <div class="card-body">
                    <h5 class="card-title text-center">Fernanda Rocha</h5>
                    <label><strong>Idade:</strong> 29 anos</label><br />
                    <label><strong>Email:</strong> fernanda.rocha@email.com</label>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="card text-left rounded-4" style="
              width: 250px;
              height: 300px;
              margin-right: 20px;
              margin-bottom: 10px;
            ">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100" />
                <div class="card-body">
                    <h5 class="card-title text-center">Ricardo Almeida</h5>
                    <label><strong>Idade:</strong> 47 anos</label><br />
                    <label><strong>Email:</strong> ricardo.almeida@email.com</label>
                </div>
            </div>
            <!-- Card 7 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Lucas Martins</h5>
                    <label><strong>Idade:</strong> 36 anos</label><br>
                    <label><strong>Email:</strong> lucas.martins@email.com</label>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Patrícia Alves</h5>
                    <label><strong>Idade:</strong> 40 anos</label><br>
                    <label><strong>Email:</strong> patricia.alves@email.com</label>
                </div>
            </div>

            <!-- Card 9 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Roberto Nunes</h5>
                    <label><strong>Idade:</strong> 50 anos</label><br>
                    <label><strong>Email:</strong> roberto.nunes@email.com</label>
                </div>
            </div>

            <!-- Card 10 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Beatriz Costa</h5>
                    <label><strong>Idade:</strong> 27 anos</label><br>
                    <label><strong>Email:</strong> beatriz.costa@email.com</label>
                </div>
            </div>

            <!-- Card 11 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Diego Fernandes</h5>
                    <label><strong>Idade:</strong> 38 anos</label><br>
                    <label><strong>Email:</strong> diego.fernandes@email.com</label>
                </div>
            </div>

            <!-- Card 12 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Juliana Ribeiro</h5>
                    <label><strong>Idade:</strong> 46 anos</label><br>
                    <label><strong>Email:</strong> juliana.ribeiro@email.com</label>
                </div>
            </div>

            <!-- Card 13 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Eduardo Tavares</h5>
                    <label><strong>Idade:</strong> 60 anos</label><br>
                    <label><strong>Email:</strong> eduardo.tavares@email.com</label>
                </div>
            </div>

            <!-- Card 14 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Aline Moreira</h5>
                    <label><strong>Idade:</strong> 35 anos</label><br>
                    <label><strong>Email:</strong> aline.moreira@email.com</label>
                </div>
            </div>

            <!-- Card 15 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Renato Vieira</h5>
                    <label><strong>Idade:</strong> 42 anos</label><br>
                    <label><strong>Email:</strong> renato.vieira@email.com</label>
                </div>
            </div>

            <!-- Card 16 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Tatiane Melo</h5>
                    <label><strong>Idade:</strong> 31 anos</label><br>
                    <label><strong>Email:</strong> tatiane.melo@email.com</label>
                </div>
            </div>

            <!-- Card 17 -->
            <div class="card text-left rounded-4"
                style="width: 250px; height: 300px; margin-right: 20px; margin-bottom: 10px;">
                <img src="img/avatar-generic.png" class="rounded-circle mx-auto d-block mt-3" alt="Foto do usuário"
                    width="100" height="100">
                <div class="card-body">
                    <h5 class="card-title text-center">Sérgio Brito</h5>
                    <label><strong>Idade:</strong> 58 anos</label><br>
                    <label><strong>Email:</strong> sergio.brito@email.com</label>
                </div>
            </div>
</main>

<?php include_once "footer.php" ?>