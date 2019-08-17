
function addToTablePesan(id,nama,harga){
    var table = document.getElementById('tablePesan');

    if(checkRowExisistance(id)){
        Swal.fire({
            type: 'info',
            title: 'Menu ini sudah dipesan!',
            text: 'Penambahan jumlah dapat dilakukan di daftar pesanan anda'
        })
        return;
    }

    var row = table.insertRow(-1);

    row.setAttribute('id',id);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1)
    var cell3 = row.insertCell(2);

    var jumPesan = document.createElement('input');
    jumPesan.type = 'number';
    jumPesan.value = 1;
    jumPesan.classList.add('form-control')
    jumPesan.addEventListener('input',function () {
        updateSubTotal(id,harga)
    },false);


    cell1.innerHTML = nama;
    cell2.append(jumPesan);
    cell3.innerHTML = harga;
    updateTotal();
}

function checkRowExisistance(id){
    var exists = false;

    var table = document.getElementById('tablePesan');
    for(var i = 0,row; row=table.rows[i];i++){
        if(row.id == id){
            exists = true;
        }
    }
    return exists;
}

function updateSubTotal(id,harga){
    var row = document.getElementById(id);
    var jum = row.cells[1].childNodes[0];

    var subtot = jum.value*harga;
    row.cells[2].innerHTML= subtot;

    updateTotal();
}

function updateTotal(){
    var table = document.getElementById('tablePesan');
    var list  = table.querySelectorAll('tr');
    var totalHarga = 0;

    for(var i=1; i<list.length;i++){
        totalHarga += parseInt(list[i].childNodes[2].innerHTML);
    }

    var total = document.getElementById('totalHargaPesan');

    total.value = totalHarga;
    console.log("berhasil update total");
}

function checkJquery(){
    if(window.jQuery){
        alert('Yeah');
    }else{
        alert('no jquery');
    }
}

function sendAjaxRequest(no_meja){
    //Update total before pushing 
    updateTotal();

    // Forming data
    var table = document.getElementById('tablePesan');
    var list  = table.querySelectorAll('tr');

    outObject = [];

    for(var i=1; i<list.length;i++){
        if(list[i].cells[1].childNodes[0].value == 0){
            continue;
        }
        var item = {
            'id' : list[i].id,
            'jum' : list[i].cells[1].childNodes[0].value,
            'subharga' : parseInt(list[i].cells[2].innerHTML),
            'harga' :  parseInt(list[i].cells[2].innerHTML)/list[i].cells[1].childNodes[0].value
        }
        outObject.push(item);
    }

    var jsonDat = {
        outObject,
        'no_meja' : no_meja
    };

    //  Sending The Request
    let done = $.post("prosesPesanan.php", {data: jsonDat}) // request post -> menentukan nama url -> data yang dikirimkan
        .done(function(data){
            if(data == "Succeed"){
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil membuat Pesanan',
                    text: 'Pesanan anda telah  berhasil dibuat, tunggu pelayan untuk konfirmasi pesanan anda.',
                    footer: '<a href>Lihat Pesanan</a>'
                })
            }else{
                Swal.fire({
                    type: 'error',
                    title: 'Gagal membuat Pesanan',
                    text: 'Terjadi kesalahan ketika membuat pesanan, coba lagi'
                })
            }
    });
}