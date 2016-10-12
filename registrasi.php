<?php
/* Template Name: Register Template */
get_header();
?>
<!-- About Section -->
<section id="register">
	<div class="container">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<div class="row">
				<a href="#form-register" class="sr-only">Skip to Registration Form</a>
				<center><h1 class="head-persyaratan" style="padding:0px;">PERSYARATAN MENJADI ANGGOTA
					PUSTAKA MITRA NETRA ONLINE
				</h1></center>
				<ol class="list-persyaratan">
					<li>Penyandang tunanetra baik yang masih memiliki sisa penglihatan (low vision) maupun yang buta total yang dibuktikan dengan keterangan/pernyataan dari:
						<ol type="a">
							<li>Dokter mata, atau</li>
							<li>Ketua atau pimpinan organisasi ketunanetraan (termasuk yayasan yang melayani tunanetra) seperti: PERTUNI, ITMI, PERTAPI, Yayasan Destrarastra, dll., atau</li>
							<li>Kepala Sekolah Luar Biasa atau sekolah penyelenggara pendidikan Inklusi tempat tunanetra bersangkutan menempuh pendidikan, atau  </li>
							<li>Ketua Program Studi, Dekan, Ketua TU atau yang berwenang memberikan keterangan dari perguruan tinggi tempat tunanetra bersangkutan menempuh pendidikan </li>
						</ol>
					</li>
					<li>Mengisi formulir pendaftaran sebagai anggota secara online di http://mitranetra.web.id/register</li>
					<li>Melampirkan <a href="<?php echo bloginfo('template_directory'); ?>/Surat_Konfirmasi_Ketunanetraan.pdf">Surat Konfirmasi Ketunanetraan</a> yang ditandatangani dokter mata, atau pimpinan organisasi, atau kepala sekolah sebagaimana tersebut pada nomor 1 bahwa yang bersangkutan benar sebagai penyandang tunanetra.</li>
					<li>Mengirim Surat Konfirmasi Ketunanetraan yang telah ditandatangani sebagaimana nomor 2 melalui salah satu cara berikut ini:
						<ol type="a">
							<li>Surat Konfirmasi Ketunanetraan di-scan dan diunggah ke website Pustaka Mitra Netra melaui link yang disertakan pada notifikasi email anda pada saat mendaftar, atau </li>
							<li>Dikirim melalui email pustakamitranetra@gmail.com </li>
							<li>Dikirim melalui pos ke alamat Yayasan Mitra Netra, Jl. Gunung Balong II No. 58, Lebak Bulus, Jakarta 12440.</li>
						</ol>
					</li>
					<li>Tidak menyalahgunakan dan memindahtangankan buku yang diambil dari Pustaka Mitra Netra kepada pihak lain meskipun sesama penyandang tunanetra, karena setiap penyandang tunanetra yang ingin memanfaatkan buku dari Pustaka Mitra Netra wajib mendaftarkan diri menjadi anggota.</li>
				</ol>
			</div>
			<div id="form-register">
				<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
			</div>
		</div>
		<div class="col-md-1">
		</div>  
	</div>
</section>
<?php get_footer(); ?>