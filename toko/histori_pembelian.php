<?php 
    include "header_pelanggan.php";
?>

<h2>HISTORI PEMBELIAN PRODUK</h2>

<table class="table table-hover table-striped">

    <thead>
        <th>NO</th>
        <th>TANGGAL TRANSAKSI</th>
        <th>NAMA PRODUK</th>
        <th>TOTAL</th>
        <th>STATUS</th>
    </thead>

    <tbody>
        <?php 
        include "toko.php";

        $qry_histori=mysqli_query($conn,"select * from transaksi where id_pelanggan='".$_SESSION['id_pelanggan']."' order by id_transaksi desc");
        $no=0;

        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;
            //menampilkan produk yang dibeli

            $produk_dibeli="<ol>";
            $total=0;
            $qry_produk=mysqli_query($conn,"select * from detail_transaksi join produk on produk.id_produk=detail_transaksi.id_produk where id_transaksi = '".$dt_histori['id_transaksi']."'");


            while($dt_produk=mysqli_fetch_array($qry_produk)){
                $produk_dibeli.="<li>".$dt_produk['nama_produk']."</li>";
                $total += $dt_produk['subtotal'];
            }

            $produk_dibeli.="</ol>";
            $total2 = number_format($total, 2);
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$dt_histori['tgl_transaksi']?></td>
                <td><?=$produk_dibeli?></td>
                <td><?php echo("Rp. ".$total2); ?></td>
                <td><?php echo("Diproses"); ?></td>
            </tr>

        <?php
        }
        ?>
    </tbody>
</table>

<?php 
    include "footer_pelanggan.php";
?>