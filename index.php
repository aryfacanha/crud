<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Bootstrap 5.1 -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <!-- Jquery 3.7.1 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


  <!-- Font Awesome -->

  <script src="https://kit.fontawesome.com/b3cfdebc11.js" crossorigin="anonymous"></script>


  <script src="js/functions.js"></script>

  <title>Painel</title>


</head>

<body>
  <div class="container-fluid    h-100 border" >

    <div class="table-wrapper">
      <div class="table-titles">
      <div class="row align-items-center bg-info p-2 text-md-start text-center">
        <div class="col-md-6">
          <div class="col-11">
           <h1 class="mb-0"> CRUD Simples </h1>
          </div>
        </div>
        <div class="col-md-4">
        <input type="text" class="form-control" id="filter_input" placeholder="Pesquisar (Nome)">
        </div>
        <div class="col-md-2 text-center">
          <div id="loader"></div>
          <button type="button" class="btn btn-secondary" id="btn-insert"><span>Cadastrar</span></button>
        </div>
      </div>
      </div>

      <table class="table mt-2 border-none">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Profissão</th>
            <th scope="col">Idade</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody id="users">

        </tbody>
      </table>

    </div>
  </div>

  <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditLabel">Editar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-form">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nome</label>
              <input required type="text" class="form-control" id="user-edit">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Profissão:</label>
              <input required type="text" class="form-control" id="occupation-edit">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Data de Nasc.:</label>
              <input required type="date" class="form-control" id="data-edit">
            </div>
            <div class="mb-3 text-center" id="form-loader">

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-close">Fechar</button>
          <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="modalInsertLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalInsertLabel">Cadastrar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="insert-form">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nome</label>
              <input required type="text" class="form-control insert-user" id="user-insert">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Profissão:</label>
              <input required type="text" class="form-control insert-user" id="occupation-insert">
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Data de Nasc.:</label>
              <input required type="date" class="form-control insert-user" id="data-insert">
            </div>
            <div class="mb-3 text-center" id="form-loader">

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modal-close">Fechar</button>
          <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>