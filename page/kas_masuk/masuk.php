 
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                                <a href="">Edit</a>
                                                <a href="">Hapus</a>
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
                        </div>
                    </div>
                </div>
            </div>
