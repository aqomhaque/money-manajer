<?php 


	$id = $_GET['id'];

	$sql = $koneksi->query("delete from tbl_kas where kode = '$id'");

	if ($sql) {
                ?>
                    <script type="text/javascript">
                        alert("Hapus Data Berhasil!");
                        window.location.href="?page=masuk";
                    </script>
                <?php
            }

?>