<script>
    @if($errors->any())
        $('#exampleModal').modal('show')
    @endif
  
    $(".swal-6").click(function(e) {
      id = e.target.dataset.id;
    swal({
        title: 'Kamu Yakin Mau Hapus?',
        text: 'Jika di Hapus, Data akan hilang!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        swal('Data Berhasil di Hapus :)', {
          icon: 'success',
        });
        $(`#delete${id}`).submit();
        } else {
        swal('Data Kamu aman :)');
        }
      });
  });
  
  
        $('.btn-edit').on('click', function() {
          let id = $(this).data('id')
          $.ajax({
            url:`/manajemen_user/${id}/edit`,
            method:"GET",
            success: function(data) {
              $('#modal-edit').find('.modal-body').html(data)
              $('#modal-edit').modal('show')
  
              $('#dinamik').selectric();
              $('#btn_add_val').click(function() {
                // Store the value in a variable
                var value = $('#add_valu').val();
  
                // Append to original select
                $('#dinamik').append('<option>' + (value ? value : 'Kosong') + '</option>');
  
                // Refresh Selectric
                $('#dinamik').selectric('refresh');
              });
  
            },
            error:function(error){
              console.log(error)
            }
          })
        })
  
        $('.btn-update').on('click', function() {
          let id = $('#form-edit').find('#id_data').val()
          let formData = $('#form-edit').serialize()
          $.ajax({
            url:`/manajemen_user/update/${id}`,
            method:"PATCH",
            data:formData,
            success: function(data) {
              swal('Data User Telah diubah :)','', {
                    timer: 2000,
                    icon: 'success',
                });
              // $('#modal-edit').find('.modal-body').html(data)
              $('#modal-edit').modal('hide')
              window.location.assign('/manajemen_user')
            },
            error: function (data) {
                      $('#nameError').addClass('d-none');
                      $('#usernameError').addClass('d-none');
                      $('#emailError').addClass('d-none');
                      $('#passwordError').addClass('d-none');
                      var errors = data.responseJSON;
                      if($.isEmptyObject(errors) == false) {
                          $.each(errors.errors,function (key, value) {
                              var ErrorID = '#' + key +'Error';
                              $(ErrorID).removeClass("d-none");
                              $(ErrorID).text(value)
                          })
                      }
                  }
          })
        })
  
        $('.btn-show').on('click', function() {
          let id = $(this).data('id')
          $.ajax({
            url:`/manajemen_user/show/${id}`,
            method:"GET",
            success: function(data) {
              $('#modal-lihat').find('.modal-body').html(data)
              $('#modal-lihat').modal('show')
            },
            error:function(error){
              console.log(error)
            }
          })
        })
  
        
        
  </script>
  
  <script>
    
    $('#dynamic').selectric();
  $('#bt_add_val').click(function() {
    // Store the value in a variable
    var value = $('#add_val').val();
  
    // Append to original select
    $('#dynamic').append('<option>' + (value ? value : 'Kosong') + '</option>');
  
    // Refresh Selectric
    $('#dynamic').selectric('refresh');
  });
  </script>