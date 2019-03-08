// Sweet Alert
$('.btn-delete').click(function(){
    var _this = $(this);

    swal({
        title: "Apakah Anda Yakin Untuk Menghapus?",
        text: _this.data().confirm,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#EF5350",
        confirmButtonText: "Ya!",
        cancelButtonText: "Tidak",
        closeOnConfirm: false
    }, function(){
        $.ajax({
            url: _this.data().url,
            method: 'delete',
            data: { '_token': _this.data().token },
            success: function(response) {
                swal({
                    title: "Berhasil Dihapus!",
                    text: response.message,
                    type: 'success'
                }, function() {
                    if(response.redirect == window.location)
                    {
                        window.location.reload();
                    } else {
                        window.location.href = response.redirect;
                    }
                })
            },
            error: function(response) {
                swal('Gagal Menghapus Data!', response.message, "error")
            }
        });
    });
});

$('.btn-activate').click(function(){
    var _this = $(this);

    swal({
        title: "Apakah Anda Yakin Untuk Mengaktifkan?",
        text: _this.data().confirm,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya!",
        cancelButtonText: "Tidak",
        closeOnConfirm: false
    }, function(){
        $.ajax({
            url: _this.data().url,
            method: 'post',
            data: { '_token': _this.data().token },
            success: function(response) {
                swal({
                    title: "Berhasil Mengaktifkan Warung!",
                    text: response.message,
                    type: 'success'
                }, function() {
                    if(response.redirect == window.location)
                    {
                        window.location.reload();
                    } else {
                        window.location.href = response.redirect;
                    }
                })
            },
            error: function(response) {
                swal('Gagal Mengaktifkan Warung!', response.message, "error")
            }
        });
    });
});
