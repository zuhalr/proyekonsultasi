jQuery(document).ready(function () {
  var save_method;
  var table;

  /* add global for show modal and reset form-group */
  $('.add').click(function(){
    save_method = 'add';
    $('#form')[0].reset();
    $("#modal").modal("show");
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
  });

  /* akun */
  $('.update-akun').click(function () {
    save_method = 'update';
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('.modal-title').text('Edit Akun');
    var id = $(this).attr("data-id");
    $.ajax({
      url: dns + "rkpg/pengaturan/akun/detail/" + id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        $('[name="akun_id"]').val(data.id);
        $('[name="kode"]').val(data.kode);
        $('[name="parent"]').val(data.parent);
        $('[name="nama"]').val(data.nama);
        if (data.status == '1') {
          $('#ystatus').prop('checked', true);
        } else if (data.status == '2') {
          $('#tstatus').prop('checked', true);
        }
        $('#modal').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('Server Disconnect');
      }
    });
  });
  
  $('.delete-akun').click(function () {
    $.ajax({
      url: dns + "rkpg/pengaturan/akun/delete/" + $(this).attr("data-id"),
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        toastr.warning('Maaf, terjadi kesalahan.');
      }
    });
  });

  $('.submit-akun').click(function(){
    $('.submit-akun').text('saving...');
    $('.submit-akun').attr('disabled',true);
    var url;
    if(save_method == 'update') {
      url = dns + "rkpg/pengaturan/akun/update";
    } else {
      url = dns + "rkpg/pengaturan/akun/create";
    }
    $.ajax({
      url : url,
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data) {
        if(data.status) {
          $('#modal').modal('hide');
        }
        $('.submit-akun').text('Simpan');
        $('.submit-akun').attr('disabled',false);
        toastr.info('Baik, data berhasil diproses.');
        $('#modal').modal('hide');
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        $('.submit-akun').text('save');
        $('.submit-akun').attr('disabled',false);
        toastr.info('Maaf, terjadi kesalahan pada saat proses berlangsung.');
      }
    });
  });


  /* anggaran */
  $('.delete-anggaran').click(function () {
    $.ajax({
      url: dns + "rkpg/anggaran/delete/" + $(this).attr("data-id"),
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        toastr.warning('Maaf, terjadi kesalahan.');
      }
    });
  });
  $('.submit-anggaran').click(function () {
    $('.submit-anggaran').text('saving...');
    $('.submit-anggaran').attr('disabled', true);
    $.ajax({
      url: dns + "rkpg/anggaran/create",
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data) {
        if (data.status) {
          $('#modal').modal('hide');
        }
        $('#modal').modal('hide');
        $('.submit-anggaran').text('Simpan');
        $('.submit-anggaran').attr('disabled', false);
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        $('.submit-anggaran').text('save');
        $('.submit-anggaran').attr('disabled', false);
        toastr.warning('Maaf, terjadi kesalahan pada saat proses berlangsung.');
        location.reload();
      }
    });
  });


  /* ++++++ proyeksi ++++++ */
  $('.add_akun').click(function () {
    save_method = 'add';
    $('#form')[0].reset();
    $('.modal-title').text('Tambah Akun');
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('[name="akun"]').val($(this).attr("data-id"));
  });
  $('.update-proyeksi-akun').click(function () {
    save_method = 'update';
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    var id = $(this).attr("data-id");
    $('.modal-title').text('Edit Akun');
    $.ajax({
      url: dns + "rkpg/proyeksi/detail/" + id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {

        $('[name="akun_id"]').val(data.id);
        $('[name="kode"]').val(data.kode);
        $('[name="parent"]').val(data.parent);
        $('[name="nama"]').val(data.nama);
        $('.delete-proyeksi-akun').attr("data-id", data.id);

        $('#modal').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('Server Disconnected');
      }
    });
  });
  $('.delete-proyeksi-akun').click(function () {
    $.ajax({
      url: dns + "rkpg/pengaturan/akun/delete/" + $(this).attr("data-id"),
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        toastr.warning('Maaf, terjadi kesalahan.');
      }
    });
  });
  $('.submit-proyeksi-akun').click(function () {
    $('.submit-proyeksi-akun').text('saving...');
    $('.submit-proyeksi-akun').attr('disabled', true);
    var url;
    if (save_method == 'update') {
      url = dns + "rkpg/proyeksi/akun_update";
    } else {
      url = dns + "rkpg/proyeksi/akun_create";
    }
    $.ajax({
      url: url,
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.status) {
          $('#modal-akun').modal('hide');
        }
        $('#modal-akun').modal('hide');
        $('.submit-proyeksi-akun').text('Simpan');
        $('.submit-proyeksi-akun').attr('disabled', false);
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $('.submit-proyeksi-akun').text('save');
        $('.submit-proyeksi-akun').attr('disabled', false);
        toastr.warning('Maaf, terjadi kesalahan pada saat proses berlangsung.');
      }
    });
  });

  $('.add-proyeksi-anggaran').click(function () {
    save_method = 'add';
    $('#form-anggaran')[0].reset();
    $('.modal-title').text('Tambah Dana');
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('[name="akun"]').val($(this).attr("data-id"));
  });
  $('.update-proyeksi-anggaran').click(function () {
    save_method = 'update';
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    var id = $(this).attr("data-id");
    $('.modal-title').text('Edit Dana');
    $.ajax({
      url: dns + "rkpg/proyeksi/detail_item/" + id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        $('[name="akun"]').val(data.item_id);
        $('[name="harga"]').val(data.harga);
        $('[name="sumber"]').val(data.sumber);
        $('[name="parent"]').val(data.id);
        $('#modal-pro-ang').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        toastr.warning('Maaf, terjadi kesalahan pada saat proses berlangsung.');
      }
    });
  });
  $('.submit-proyeksi-anggaran').click(function () {
    $('.submit-proyeksi-anggaran').text('saving...');
    $('.submit-proyeksi-anggaran').attr('disabled', true);
    var url;
    if (save_method == 'update') {
      url = dns + "rkpg/proyeksi/anggaran_update";
    } else {
      url = dns + "rkpg/proyeksi/anggaran_create";
    }
    $.ajax({
      url: url,
      type: "POST",
      data: $('#form-anggaran').serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.status) {
          $('#modal-pro-ang').modal('hide');
        }
        $('#modal-pro-ang').modal('hide');
        $('.submit-proyeksi-anggaran').text('Simpan');
        $('.submit-proyeksi-anggaran').attr('disabled', false);
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $('.submit-proyeksi-anggaran').text('save');
        $('.submit-proyeksi-anggaran').attr('disabled', false);
        toastr.warning('Maaf, terjadi kesalahan pada saat proses berlangsung.');
      }
    });
  });  

  // item
  $('.add-w-id').click(function () {
    save_method = 'add';
    //$('#form')[0].reset();
    $('#form-item')[0].reset();
    $('.modal-title').text('Tambah Anggaran');
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('[name="akun"]').val($(this).attr("data-id"));
  });
  $('.update-item').click(function () {
    save_method = 'update';
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    var id = $(this).attr("data-id");
    $('.modal-title').text('Edit Item');
    $.ajax({
      url: dns + "rkpg/proyeksi/detail_item/" + id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        $('[name="id"]').val(data.item_id);
        $('[name="akun"]').val(data.akun);
        $('[name="volume"]').val(data.volume);
        $('[name="satuan"]').val(data.satuan);
        $('[name="harga"]').val(data.harga);
        $('[name="sumber"]').val(data.sumber);
        $('.delete-item').attr("data-id", data.item_id);
        $('#modal').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log('Server Disconnected');
      }
    });
  });
  $('.delete-item').click(function () {
    $.ajax({
      url: dns + "rkpg/proyeksi/delete_item/" + $(this).attr("data-id"),
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        $('#modal').modal('hide');
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        toastr.warning('Maaf, terjadi kesalahan.');
      }
    });
  });
  $('.submit-item').click(function () {
    $('.submit-item').text('saving...');
    $('.submit-item').attr('disabled', true);
    var url;
    if (save_method == 'update') {
      url = dns + "rkpg/proyeksi/item_update";
    } else {
      url = dns + "rkpg/proyeksi/item_create";
    }
    $.ajax({
      url: url,
      type: "POST",
      data: $('#form-item').serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.status) {
          $('#modal-item').modal('hide');
        }
        $('#modal-item').modal('hide');
        $('.submit-item').text('Simpan');
        $('.submit-item').attr('disabled', false);
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $('.submit-item').text('save');
        $('.submit-item').attr('disabled', false);
        toastr.warning('Maaf, terjadi kesalahan pada saat proses berlangsung.');
      }
    });
  });
  
  /* konsolidasi */
  // konsolidasi akun 2,3
  // add konsolidasi
  $('.add-konsol').click(function () {
    save_method = 'add';
    $('#form-konsolidasi')[0].reset();
    $('.modal-title').text('Tambah Konsolidasi');
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('[name="akun"]').val($(this).attr("data-id"));
  });
  $('.submit-konsolidasi').click(function () {
    $('.submit-konsolidasi').text('saving...');
    $('.submit-konsolidasi').attr('disabled', true);
    var url;
    if (save_method == 'update') {
      url = dns + "rkpg/konsolidasi/update";
    } else {
      url = dns + "rkpg/konsolidasi/create";
    }
    $.ajax({
      url: url,
      type: "POST",
      data: $('#form-konsolidasi').serialize(),
      dataType: "JSON",
      success: function (data) {
        if (data.status) {
          $('#modal-konsolidasi').modal('hide');
        }
        $('#modal-konsolidasi').modal('hide');
        $('.submit-konsolidasi').text('Simpan');
        $('.submit-konsolidasi').attr('disabled', false);
        toastr.info('Baik, data berhasil diproses.');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $('.submit-konsolidasi').text('save');
        $('.submit-konsolidasi').attr('disabled', false);
        toastr.warning('Maaf, terjadi kesalahan pada saat proses berlangsung.');
      }
    });
  });
  


});

console.log('STOP!. Ini adalah fitur browser yang ditujukan untuk pengembang. Jika seseorang meminta Anda untuk menyalin sesuatu di sini atau "meretas" silahkan hindari, ini adalah penipuan dan akan memberikannya akses ke akun SIMGAM.');