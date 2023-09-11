<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estudante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <header class="bg-black text-white p-5 text-center m-0">    
  </header>


  <?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/' . FOLDER . '/view/navbar.php'; ?>




    <div class="container">
    <form method="POST" action="/<?php echo FOLDER; ?>/?controller=Professor&acao=salvar">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome </label>
    <input type="text" class="form-control" id="nome" name="nome">
    
  </div>
  <div class="mb-3">
    <label for="idade" class="form-label">Idade </label>
    <input type="number" class="form-control" id="idade" name="idade">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
    </form>

    </div>

    
</body>

</html>