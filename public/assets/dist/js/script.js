var d = new Date($.now());
var strDate = ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + "-" + d.getFullYear()
function submitFilter(start, end) {
    let type = $("#date").data('type')
    $('#date span').html(start.format('DD-MMM-YYYY') + ' sampai ' + end.format('DD-MMM-YYYY'))
    $.ajax({
        url: location.origin + '/Statistik/filter',
        type: 'post',
        data: { start: start.format('DD-MM-YYYY'), end: end.format('DD-MMM-YYYY') },
        success: function (res) {
            let data = $.parseJSON(res)
            alert("ok")
        }, error: function () {
            alert("error")
        }
    })
}
$('#date').daterangepicker({
    ranges: {
        'Hari Ini': [moment(), moment()],
        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
        '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    alwaysShowCalendars: true,
    showDropdowns: false,
    autoUpdateInput: true,
    minYear: 2022,
    maxYear: 2022,
    maxDate: strDate,
    buttonClasses: "btn btn-xs",
    locale: {
        customRangeLabel: "Jangka Waktu Yang Dipilih",
        cancelLabel: "Batal",
        applyLabel: "Filter",
        fromLabel: "Dari",
        toLabel: "Sampai",
        daysOfWeek: [
            "Min",
            "Sen",
            "Sel",
            "Rab",
            "Kam",
            "Jum",
            "Sab"
        ],
    }
}, submitFilter)
$('#date').on('cancel.daterangepicker', function (ev, picker) {
    //do something, like clearing an input
    $('#date').html('<i class="fa fa-calendar mr-1"></i> <span>Filter</span> <i class="ml-3 fa fa-caret-down"></i>');
    $(this).data('daterangepicker').setStartDate(moment().format("MM-DD-YYYY"))
    $(this).data('daterangepicker').setEndDate(moment().format("MM-DD-YYYY"))
})

$("#input-berita").fileinput({
    'showUpload': false,
    'showCancel': false,
    'browseOnZoneClick': true,
    'required': true,
    'browseLabel': 'Masukan Gambar',
    'browseIcon': '<i class="fa fa-image"></i>',
    'allowFieldExtensions': ['jpg', 'jpeg', 'png'],
    'overwriteInitial': true,
})