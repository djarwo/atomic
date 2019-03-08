$(document).ready(function () {
    $('#examplex').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex0').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex1').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex2').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex3').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex4').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex5').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex6').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

$(document).ready(function () {
    $('#examplex10').DataTable({
        lengthMenu: [
            [5, 50, 100, -1],
            [5, 50, 100, "ALL"]
        ],
        bInfo: false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[2] + ' ' + data[3];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
});

// Sweet Alert
$('.btn-confirmsend').click(function () {
    var _this = $(this);
    $('#showDetailOrderModal').modal('toggle');
    swal({
        title: "Apakah Anda Yakin Untuk Mengirim?",
        text: _this.data().confirm,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#EF5350",
        confirmButtonText: "Ya!",
        cancelButtonText: "Tidak",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            url: _this.data().url,
            method: 'post',
            data: {
                '_token': _this.data().token
            },
            success: function (response) {
                swal({
                    title: "Berhasil Confirm Untuk Dikirim",
                    text: response.message,
                    type: 'success'
                }, function () {
                    if (response.redirect == window.location) {
                        window.location.reload();
                    } else {
                        window.location.href = response.redirect;
                    }
                })
            },
            error: function (response) {
                swal('Gagal Confirm Untuk Dikirim', response.message, "error")
            }
        });
    });
});