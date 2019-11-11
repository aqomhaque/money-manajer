 
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Kas Masuk
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-kas">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php  

                                        $no = 1;
                                        
                                        $sql = $koneksi->query("select * from tbl_kas where jenis = 'masuk' ");
                                        while ($data=$sql->fetch_assoc()) {
                                                
                                        
                                     ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td align="right"><?php echo"Rp. " .number_format($data['jumlah']).",- "; ?></td>
                                            <td>
                                                <a id="edit_data" data-toggle="modal" data-target="#edit" 
                                                data-id="<?php echo $data['kode'] ?>" data-ket="<?php echo $data['keterangan']?>" data-tgl="<?php echo $data['tgl'] ?>" data-jml="<?php echo $data['jumlah']?>"class="btn btn-info"> <i class="fa fa-edit"></i>Edit</a>

                                                <a class="btn btn-danger"> <i class="fa fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>

                                        <?php 
                                            $total=$total+$data['jumlah'];
                                            }
                                         ?>

                                    </tbody>
                                        <tr>
                                            <th colspan="4" style="text-align: center; font-size: 17px"> Total Kas Masuk</th>
                                            <th style="text-align: right; font-size: 17px"><?php echo"Rp. " .number_format($total ). ",- "; ?></th>
                                        </tr>
                                </table>
                            </div>

                            <!-- PopUP Tambah Data -->
                                <div class="panel-body">
                                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                                      Tambah Data 
                                    </button>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST">
                                                        <div class="form-group">
                                                            <label>Kode</label>
                                                            <input class="form-control" name="kode" placeholder="Masukkan Kode" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control" rows="3" name="ket"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal</label>
                                                            <input class="form-control" type="date" name="tgl" placeholder="Pilih Tanggal" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah</label>
                                                            <input class="form-control" type="number" name="jml" placeholder="Masukkan Nominal" />
                                                        </div>

                                                        <p class="help-block">Perhatikan! Isi Data dengan Benar!</p>
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <input type="submit" name="simpan" value="Simpan" class=" btn btn-primary">
                                                </div>
                                                    
                                                </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    if (isset($_POST['simpan'])) {

                                        $kode = $_POST['kode'];
                                        $ket = $_POST['ket'];
                                        $tgl = $_POST['tgl'];
                                        $jml = $_POST['jml'];
                                        
                                        $sql = $koneksi->query("insert into tbl_kas (kode, keterangan, tgl, jumlah, jenis, keluar)values('$kode','$ket','$tgl','$jml', 'masuk', 0)");
                                        if ($sql) {
                                            ?>
                                                <script type="text/javascript">
                                                    alert("Simpan Data Berhasil!");
                                                    window.location.href="?page=masuk";
                                                </script>
                                            <?php
                                        }
                                    }

                                 ?>
                         <!-- Akhir PopUP Tambah Data-->

                         <!-- Halaman Ubah Data-->
                         <div class="panel-body">
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" id="modal_edit">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Form Edit Data</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="POST">
                                                        <div class="form-group">
                                                            <label>Kode</label>
                                                            <input class="form-control" name="kode" placeholder="Masukkan Kode" id="kode" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control" rows="3" name="ket" id="ket"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal</label>
                                                            <input class="form-control" type="date" name="tgl" placeholder="Pilih Tanggal" id="tgl" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah</label>
                                                            <input class="form-control" type="number" name="jml" placeholder="Masukkan Nominal" id="jml" />
                                                        </div>

                                                        <p class="help-block">Perhatikan! Edit dengan teliti!</p>
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <input type="submit" name="simpan" value="Simpan" class=" btn btn-primary">
                                                </div>
                                                    
                                                </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Script Tambahan-->
                                <script src="assets/js/jquery-1.10.2.js"></script>
                                <script type="text/javascript">
                                $(document).on("click","#edit_data",function()){
                                
                                    var kode = $(this).data('id');
                                    var ket = $(this).data('ket');
                                    var tgl = $(this).data('tgl');
                                    var jml = $(this).data('jml');

                                    $("#modal_edit #kode").val(kode);
                                })

                                </script>
                                

                         <!-- Akhir Halaman Ubah Data-->


                        </div>
                    </div>
                </div>
            </div>
