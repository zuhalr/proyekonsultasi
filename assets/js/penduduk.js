jQuery(document).ready(function () {

  $('.add').click(function(){
    $('#form')[0].trigger('reset');
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
  });
  
  // var dataTable = $('#user_data').DataTable({  
  //   "processing":true,  
  //   "serverSide":true,  
  //   "order":[],
  //   "ajax":{
  //     url:"<?php echo base_url() . 'crud/fetch_user'; ?>",  
  //     type:"POST"  
  //   },  
  //   "columnDefs":[
  //     {  
  //       "targets":[0, 3, 4],
  //       "orderable":false,
  //     },  
  //   ],  
  // });
  
  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var firstName = $('#first_name').val();
    var lastName = $('#last_name').val();
    var extension = $('#user_image').val().split('.').pop().toLowerCase();
    if(extension != '')
    {
      if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
      {
        alert("Invalid Image File");
        $('#user_image').val('');
        return false;
      }
    }
    if(firstName != '' && lastName != '')
    {
      $.ajax({
        url:"<?php echo base_url() . 'crud/user_action'?>",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      alert("Bother Fields are Required");
    }
  });
  $(document).on('click', '.update', function(){
    var user_id = $(this).attr("id");
    $.ajax({
      url:"<?php echo base_url(); ?>crud/fetch_single_user",
      method:"POST",
      data:{user_id:user_id},
      dataType:"json",
      success:function(data)
      {
        $('#userModal').modal('show');
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('.modal-title').text("Edit User");
        $('#user_id').val(user_id);
        $('#user_uploaded_image').html(data.user_image);
        $('#action').val("Edit");
      }
    })
  });
});