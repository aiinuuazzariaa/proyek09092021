<?php 
    include "header_pelanggan.php";
    include "toko.php";
    $qry_detail_produk=mysqli_query($conn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
    $dt_produk=mysqli_fetch_array($qry_detail_produk);
    $harga=$dt_produk['harga'];
    $harga2=number_format($harga, 2);
?>

<h2>BELI PRODUK</h2>

<div class="row">

    <div class="col-md-4">
        <img src="foto/<?=$dt_produk['foto_produk']?>" class="card-img-top">
    </div>

    <div class="col-md-8">
        <form action="masukkankeranjang.php?id_produk=<?=$dt_produk['id_produk']?>" method="post">
            <table class="table table-hover table-striped">
                <thead>

                    <tr>
                        <td>NAMA PRODUK</td><td><?=$dt_produk['nama_produk']?></td>
                    </tr>

                    <tr>
                        <td>DESKRIPSI PRODUK</td><td><?=$dt_produk['deskripsi']?></td>
                    </tr>

                    <tr>
                        <td>HARGA PRODUK</td><td><?php echo ("Rp. " .$harga2);?></td>
                    </tr>

                    <tr>
                        <td>JUMLAH BARANG</td><td><input type="number" name="jumlah_barang" value="1"></td>
                    </tr>

                    <tr>
                        <td colspan="2"><input class="btn btn-success" type="submit" value="BELI PRODUK"></td>
                    </tr>

                </thead>

            </table>

        </form>

    </div>

</div>

<?php 
    include "footer_pelanggan.php";
?>