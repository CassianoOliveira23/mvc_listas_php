<?php $estudante = $_REQUEST["estudantes"]; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">     <!--Link CSS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> <!--Link JavaScript-->

    <!--Link Jquery--> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>


<body> 



<!-- Modal  alert -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Warning</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure that you want to delete this registration?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="close-modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete-button">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="userDeleted" tabindex="-1" aria-labelledby="userDeletedLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userDeletedLabel">Congratulations!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Student deleted successfully!
                </div>
            </div>
        </div>
    </div>

    

    <header class="bg-black text-white p-5 text-center m-0">
        <h1>MVC Model</h1>
    </header>

    <!-- Navbar -->
    <?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/view/navbar.php'; ?>

      



    <div class="contrainer-fluid text-center m-1">
        <img src="/<?php echo FOLDER; ?>/imagens/php2.png" class="img-center" alt="PHP programing language logo">
    </div>

    <br>

    <!-- Botão de Cadastro -->
    <div class="justify-content-center m-5 text-center">
    <a href="/<?php echo FOLDER; ?>/?controller=Estudante&acao=salvar" class="btn btn-dark">Register Student</a>
    </div>
    


    <div class="container mt-2 mb-5">
        <h1 class="container text-center mb-5">Students</h1>


        <!-- Tabela -->
      <table class="table">
          <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Actions</th>
            </tr>
          </thead>

          <tbody>
              <?php foreach($estudantes as $key => $estudanteAtual) { ?>
                        <tr>
                            <td><?php echo $estudanteAtual["id"]; ?></td>
                            <td><?php echo $estudanteAtual["nome"]; ?></td>
                            <td><?php echo $estudanteAtual["idade"]; ?></td>
                            <td>
                              <a href="/<?php echo FOLDER; ?>?controller=Estudante&acao=editar&id=<?php echo $estudanteAtual['id']; ?>" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                              <!--<a href="/<?php echo FOLDER; ?>?controller=Estudante&acao=excluir&id=<?php echo $estudanteAtual['id']; ?>" class="btn btn-danger">Excluir</a> -->

                              

                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-danger select-user-to-delete" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?php echo $estudanteAtual['id']; ?>">Delete</button>

                              
                            </td>
                        </tr>
              <?php } ?>
          </tbody>
      </table>


        <!-- Alert Modal -->
        <script>
            $("#delete-button").on("click", function() {
                let idUsuario = $(this).attr('data-id');

                let url = "/<?php echo FOLDER; ?>/?controller=Estudante&acao=excluir&id=" + idUsuario;
                $.get(url, function(data) {
                    $("#close-modal").click();
                    var myModal = new bootstrap.Modal(document.getElementById('userDeleted'))
                    myModal.show();

                });
                console.log("O usuario para ser deletado é: " + idUsuario);
            });

            $("#userDeleted").on("hidden.bs.modal", function() {
                location.reload();
            });

            $(".select-user-to-delete").on("click", function() {

                $("#delete-button").attr("data-id", $(this).attr('data-id'));
                console.log("O usuário escolheu o estudante que talvez possa ser deletado");
            });
        </script>
        
    </div>



    <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">

    <div class="container">
        <h4>Full Stack Developer Cassiano Oliveira</h4>
        <p>Fone: (51) 98934-0681</p>

    </div>
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>