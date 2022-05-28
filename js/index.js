const check = () => {
    let total = $("input[name='hargaBarang[]']")
        .map(function () {
            return parseInt($(this).val());
        })
        .get();
    if (!total.includes(NaN)) {
        $('#total').val(total.reduce((x, c) => x + c, 0));
    }
};

const checkQty = () => {
    let total = $("input[name='qtyBarang[]']")
        .map(function () {
            return parseInt($(this).val());
        })
        .get();
    if (!total.includes(NaN)) {
        $('#totalBarang').val(total.reduce((x, c) => x + c, 0));
    }
};

$(document).ready(function async() {
    $('#tanggal').attr('placeholder', new Date());
    $('#inputForm').load('../component/formBarang.php');
    $('#barang').load('../component/dataBarang.php');
    $('#order').load('../component/dataOrder.php');
    $('#kategori').load('../component/formKategori.html');
});
$('.barang').click(function () {
    $('#barang').addClass('show');
    $('#inputForm').removeClass('show');
    $('#inputOrder').removeClass('show');
    $('#order').removeClass('show');
    $('#kategori').removeClass('show');
});

$('.input').click(function () {
    $('#inputForm').addClass('show');
    $('#barang').removeClass('show');
    $('#inputOrder').removeClass('show');
    $('#order').removeClass('show');
    $('#kategori').removeClass('show');
});

$('.order').click(function () {
    $('#order').addClass('show');
    $('#inputOrder').removeClass('show');
    $('#barang').removeClass('show');
    $('#inputForm').removeClass('show');
    $('#kategori').removeClass('show');
});

$('.inputOrder').click(function () {
    $('#inputOrder').addClass('show');
    $('#barang').removeClass('show');
    $('#inputForm').removeClass('show');
    $('#order').removeClass('show');
    $('#kategori').removeClass('show');
});

$('.kategori').click(function () {
    $('#kategori').addClass('show');
    $('#inputOrder').removeClass('show');
    $('#barang').removeClass('show');
    $('#inputForm').removeClass('show');
    $('#order').removeClass('show');
});

const loadForm = () => {
    $.get('/component/formOrder.php', function (x) {
        $('#multiForm').append(x);
    });
    return false;
};

const removeForm = () => {
    $('#formAdd').remove();
    check();
    checkQty();
};

$('#sumitOrder').click(function () {
    $('#tanggal').val(Date.now());
});
