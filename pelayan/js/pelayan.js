// JS untuk pelayan

// AJAX ======================

// Request Delete Pesanan.

function deletePesanan(id_pesanan){
    Swal.fire({
        title: 'Apakah anda yakin ingin melakukan delete?',
        text: "Pesanan yang di delete tidak dapat dikembalikan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'deletePesanan.php?id_pesanan='+id_pesanan,
                type: 'DELETE',
                success: function(res){
                    if(res == "Sukses"){
                        Swal.fire(
                            'Delete Berhasil!',
                            'Pesanan berhasil dihapus',
                            'success'

                        )
                        loadPesanan();
                    }else{
                        Swal.fire(
                            'Gagal!',
                            'Gagal melakukan delete pesanan',
                            'error'
                        )
                        loadPesanan();
                    }
                }
            })
        }
    })
}

function loadPesanan(){
    $("#loadTarget").load("load-pesanan.php");
}

function openEditModal(id_detail_pesanan){
    $('.modal-body').load('php/getModalContent.php?id_detail_pesanan='+id_detail_pesanan,function(){
        $('#exampleModal').modal({show:true});
    });
}

function loadDetailPesanan(id_pesanan){
    $("#detailReviewLoadTarget").load("php/load-detail-pesanan.php?id_pesanan="+id_pesanan);
}

function loadTotalHarga(id_pesanan) {
    $("#target-load-total").load("php/load-total-harga.php?id_pesanan="+id_pesanan);
}

function deleteDetailPesanan(id_detail_pesanan,$id_pesanan){
    Swal.fire({
        title: 'Apakah anda yakin ingin melakukan delete?',
        text: "Pesanan yang di delete tidak dapat dikembalikan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'php/prosesDeleteDetail.php?id_detail_pesanan='+id_detail_pesanan,
                type: 'DELETE',
                success: function(res){
                    if(res == "Sukses"){
                        Swal.fire(
                            'Delete Berhasil!',
                            'Pesanan berhasil dihapus',
                            'success'
                        )
                        loadDetailPesanan($id_pesanan);
                        loadTotalHarga($id_pesanan);
                    }else{
                        Swal.fire(
                            'Gagal!',
                            'Gagal melakukan delete pesanan',
                            'error',
                        )
                        console.log(res);
                        loadDetailPesanan($id_pesanan);
                        loadTotalHarga($id_pesanan);
                    }
                }
            })
        }
    })
}



