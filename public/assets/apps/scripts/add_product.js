jQuery(function ($) {
    $("#foto3").fileinput({
        initialPreviewAsData: true,
        overwriteInitial: false,
        maxFileSize: 100,
        elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
    });
});

jQuery(function ($) {
    $("#input-24").fileinput({
        initialPreviewAsData: true,
        overwriteInitial: false,
        maxFileSize: 100,
        elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
    });
});

function addConsignee(checkboxValue) {
    $('#consignee').slideToggle(300);
}


setKonten()

function addKonversi() {
    $('.add').show()
    $('.ukuran').removeAttr('readonly');
    var konfersi1 = document.getElementsByTagName("CONTENT")[0];
    var respon_konfersi1 = konfersi1.cloneNode(true);
    $('#regionkonversi').append(respon_konfersi1);

    var konfersi2 = document.getElementsByTagName("CONTENT")[1];
    var konfersi3 = document.getElementsByTagName("CONTENT")[2];
    var hargabeli = $('.hargabeli');
    var hargajual = $('.hargajual');
    var margin = $('.margin');
    if (konfersi2) {
        $.each(hargabeli, function (key, value) {
            if (key == 1) {
                $(value).attr('id', 'hargaBeliKonv2');
                $(value).attr('onkeyup', 'setHargaBeliKonv(2);');
            }
        });

        $.each(hargajual, function (key, value) {
            if (key == 1) {
                $(value).attr('id', 'hargaJualKonv2');
                $(value).attr('onkeyup', 'setHargaJualKonv(2);');
            }
        });

        $.each(margin, function (key, value) {
            if (key == 1) {
                $(value).attr('id', 'marginKonv2');
                $(value).attr('onkeyup', 'setMarginKonv(2);');
            }
        });
    }

    if (konfersi3) {
        $.each(hargabeli, function (key, value) {
            if (key == 2) {
                $(value).attr('id', 'hargaBeliKonv3');
                $(value).attr('onkeyup', 'setHargaBeliKonv(3);');
            }
        });

        $.each(hargajual, function (key, value) {
            if (key == 2) {
                $(value).attr('id', 'hargaJualKonv3');
                $(value).attr('onkeyup', 'setHargaJualKonv(3);');
            }
        });

        $.each(margin, function (key, value) {
            if (key == 2) {
                $(value).attr('id', 'marginKonv3');
                $(value).attr('onkeyup', 'setMarginKonv(3);');
            }
        });
    }
    setKonten()
}

function removeKonversi(param) {
    var row = $(param).closest('content').remove();
    setKonten('delete')
}

function setKonten(state) {
    $('.add').show()
    $('.ukuran').removeAttr('readonly');
    var i = 0;
    $('.konfersi').each(function () {
        var num = parseInt(i) + 1
        var add = $(this).find('label.add');
        var divfoto = $(this).find('div.divfoto')
        var go = $(this).find('input.warehouse');
        $(go).attr('id', 'goto' + num)
        if (i != $('.konfersi').length - 1 || $('.konfersi').length == 3)
            $(add).hide()
        if (!i)
            $(this).find('input.ukuran').attr('readonly', true)
        $(this).find('b.urutan').html('Konfersi (' + num + ')')
        if (state != "delete") {
            if (i == $('.konfersi').length - 1) {

                divfoto.html('<input id="foto' + num + '" class="foto" accept="image/*" type="file" name="foto' + num + '[]" multiple>')
            }
            if (i == $('.konfersi').length - 1) {

                $("#foto" + num).fileinput({
                    initialPreviewAsData: false,
                    showUpload: false,
                    showCaption: false,
                    showClose: false,
                    maxFileSize: 1000,
                    maxFileCount: 10,
                    elErrorContainer: '#kartik-file-errors',
                    allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
                });
                // }
            } else {
                var foto = $(this).find('input.foto')
                $(foto).attr('id', 'foto' + num)
                $(foto).attr('name', 'foto' + num + '[]')
                $("#foto" + num).fileinput({
                    initialPreviewAsData: false,
                    showUpload: false,
                    showCaption: false,
                    showClose: false,
                    maxFileSize: 1000,
                    maxFileCount: 10,
                    elErrorContainer: '#kartik-file-errors',
                    allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
                });
            }
        } else {
            var foto = $(this).find('input.foto')
            $(foto).attr('id', 'foto' + num)
            $(foto).attr('name', 'foto' + num + '[]')
            $("#foto" + num).fileinput({
                initialPreviewAsData: false,
                showUpload: false,
                showCaption: false,
                showClose: false,
                maxFileSize: 1000,
                maxFileCount: 10,
                elErrorContainer: '#kartik-file-errors',
                allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
            });
        }

        i++
    });
    if (i == 1) {
        $('.delete').hide()
    } else {
        $('.delete').show()
    }
    var i = 0;
}