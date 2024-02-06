$(document).ready(function () {

    ajax('includes/list.php?filter=', 'users')
 
    $('.datepicker').datepicker();

    var timeoutId; 

    $('#filter_input').on('keyup', function () {
        clearTimeout(timeoutId);
        
        timeoutId = setTimeout(function() {
            ajax('includes/list.php?filter=' + $('#filter_input').val(), 'users');
        }, 500);
    });

    $('#modalEdit').on('hidden.bs.modal', function () {
        $('.form-control').val('')
    });


    $('#btn-insert').on('click', function(){
        $('.insert-user').val('');
        $('#modalInsert').modal('show');
    })


    $('#edit-form').on('submit', function (event) {

        let user_id = $(this).data('id')

        event.preventDefault()

        var userId = user_id;
        var name = $('#user-edit').val();
        var birthDate = $('#data-edit').val();
        var occupation = $('#occupation-edit').val();

        $.get('includes/update.php', {
            userId: userId,
            name: name,
            birthDate: birthDate,
            occupation: occupation
        })
            .done(function (response) {
                
                $('#users').html(response);

                ajax('includes/list.php?filter=' + $('#filter_input').val(), 'users')

                $('#modalEdit').modal('hide')

            })
            .fail(function (xhr, status, error) {
                alert('Erro ao atualizar');
                console.error("Error:", error);
            })
            .always(function(){
                $('#modalEdit').modal('hide');
            })
           

    })

    $('#insert-form').on('submit', function (event) {

        event.preventDefault()


        var name = $('#user-insert').val();
        var birthDate = $('#data-insert').val();
        var occupation = $('#occupation-insert').val();

        $.get('includes/insert.php', {
            name: name,
            birthDate: birthDate,
            occupation: occupation
        })
            .done(function (response) {
                
                $('#users').html(response);

                $('#filter_input').val($('#user-insert').val());

                ajax('includes/list.php?filter=' + $('#filter_input').val(), 'users')

                $('#modalInsert').modal('hide')

            })
            .fail(function (xhr, status, error) {
                alert('Erro ao cadastrar!');
                console.error("Error:", error);
            })
            .always(function(){
                $('#modalInsert').modal('hide');
            })
           

    })


    $(document).on('click', '.btn-edit', function () {

        let user_id = $(this).data('id')

        ajax('includes/complete_form.php?user_id=' + user_id, 'loader')


        $('#loader').html('')

    });

    $(document).on('click', '.btn-delete', function () {

        let user_id = $(this).data('id')

        if(confirm('Deseja excluir o registro?')){
            ajax('includes/delete.php?user_id=' + user_id, 'loader')
        }

      


        $('#loader').html('')

    });
    


});

function ajax(link, div) {

    if (div !== undefined && div !== '') {
        $('#' + div).html("<img src='https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif' height='30px'>")
    }

    $.ajax({
        url: link,
        method: 'GET',
        dataType: 'html',
        success: function (data) {

            if (div !== undefined && div !== '') {
                $('#' + div).html(data)
            }

        },
        error: function (xhr, status, error) {
            alert('Erro ao carregar os registros!' + error)
        }
    });
}

function remove(element){
    $('#' + element).fadeOut('slow', function() {
        $(this).remove();
    });
}