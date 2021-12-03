<script>
    @if($errors->any())
        $('#exampleModal').modal('show')
    @endif
  
    $(".swal-6").click(function(e) {
      id = e.target.dataset.id;
      // id = $(this).data('id')
    swal({
        title: 'Kamu Yakin Mau Hapus?',
        text: 'Jika di Hapus, Data akan hilang!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        swal('Data Berhasil di  Hapus :)', {
          icon: 'success',
        });
        $(`#delete${id}`).submit();
        } else {
        swal('Data Kamu Aman!');
        }
      });
  });
  
        $('.btn-edit').on('click', function() {
          let id = $(this).data('id')
          $.ajax({
            url:`/sekolah/${id}/edit`,
            method:"GET",
            success: function(data) {
              $('#modal-edit').find('.modal-body').html(data)
              $('#modal-edit').modal('show')
            },
            error:function(error){
              console.log(error)
            }
          })
        })
  
        $('.btn-update').on('click', function() {
          let id = $('#form-edit').find('#id_data').val()
          var foto = $('#foto').val()
          var formData = new FormData($('#form-edit')[0]);
  
          // let formData = $('#form-edit').serialize()
          $.ajaxSetup({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
  
          $.ajax({
            type:"POST",
            url:`/sekolah/update/${id}`,
            data:formData,
            contentType: false,
            processData: false,
            success: function(data) {
              swal('Data Sekolah Telah diubah :)','', {
                    timer: 2000,
                    icon: 'success',
                });
              // $('#modal-edit').find('.modal-body').html(data)
              $('#modal-edit').modal('hide')
              window.location.assign('/sekolah')
            },
            error:function(err){
              console.log(err)
            }
          })
        })
  
        $('.btn-show').on('click', function() {
          let id = $(this).data('id')
          $.ajax({
            url:`/sekolah/show/${id}`,
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