<?php
include 'db.php';
session_start();
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "select 
date_format(tp.tgl_trx,'%d %M %Y') tgl_trx,
no_invoice,
tp2.product_name nama_produk,
qty,
product_price*qty total_harga,
case status_trx
	when 1 then 'Menunggu Pembayaran'
	when 2 then 'Diproses'
	when 3 then 'Dikirim'
	when 4 then 'Tiba di tujuan'
end status_trx,
ta.admin_name nama,
tp.alamat,
tp.no_telp,
tp2.product_price
from 
tb_pembelian tp 
left join tb_product tp2 on tp2.product_id = tp.product_id 
left join tb_admin ta on ta.admin_id = tp.user_id 
where 
tp.id = ".$_GET['id']);
$p =  mysqli_fetch_array($produk);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>

</head>
<body>

<!-- header -->


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
        margin-top: 50px;
        margin-bottom: 200px;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<!-- <img
										src="https://sparksuite.github.io/simple-html-invoice-template/images/logo.png"
										style="width: 100%; max-width: 300px"
									/> -->
								</td>

								<td>
									Invoice #: <?=$p['no_invoice']?><br />
									Tanggal Transaksi: <?=$p['tgl_trx']?><br />
									Status: <?=$p['status_trx']?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Bukawarung.<br />
									Kp. grogol jl arsad rt03/02 no 5 <br>
                  kelurahan grogol kecamatan limo kota depok
								</td>

								<td>
									<?=$p['nama']?><br>
									<?=$p['no_telp']?><br>
									<?=$p['alamat']?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Barang</td>

					<td>Harga</td>
				</tr>

				<tr class="item">
					<td><?=$p['nama_produk']?> (<?=$p['qty']?> pcs)</td>

					<td>Rp. <?=number_format($p['product_price']*$p['qty']);?></td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: Rp. <?=number_format($p['product_price']*$p['qty']);?></td>
				</tr>
			</table>
		</div>


</body>

<script>

function beliProdukWhatsApp() {
  // Ganti nomor telepon WhatsApp dengan nomor yang sesuai
  var nomorWhatsApp = '628998186613'; // Contoh nomor WhatsApp

  // Buat URL WhatsApp dengan nomor telepon dan pesan yang dituju
  var urlWhatsApp = 'https://wa.me/' + nomorWhatsApp + '?text=Apakah%20Barang%20Ini%20Ready?%20Saya Ingin membelinya%20';

  // Buka URL WhatsApp
  window.open(urlWhatsApp);
}
</script>

</html>