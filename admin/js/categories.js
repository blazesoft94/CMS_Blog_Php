
$('#cat_edit_modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('title') // Extract info from data-* attributes
    var id = button.data('id');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #cat_title').val(recipient)
    modal.find('.modal-body #cat_id').val(id)
    modal.find()
    
  })