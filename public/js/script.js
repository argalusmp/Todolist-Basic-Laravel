$(function () {
    // Change When Button Add Todo Click
    $(".AddTodoBtn").on("click", function () {
        $("#FormModalLabel").html('Add Todo');
        $('.modal-footer button[type=submit]').html('Add Todo');
        $('#ModalCreateUpdateTodo form').attr('action',`/todolist`);


    });
    // Change When Link / Button Click
    $(".OpenModalUpdate").on("click", function () {
        const id = $(this).data('id');

        $("#FormModalLabel").html('Update Todo');
        $('.modal-footer button[type=submit]').html('Update Todo');
        $('#ModalCreateUpdateTodo form').attr('action',`/todolist/${id}/update`);

        $.ajax({
            url: `/todolist/${id}/edit`,
            data: {id:id},
            method: "GET",
            dataType: "json",
            success: function(data){
                $('#edit-subjek').val(data.subjek);
                $('#edit-todo').val(data.todo);
                $('#edit-id').val(data.id);

            }
        })
    });


});
