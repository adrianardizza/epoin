<?php
    $id_pelajar     = (int) $_GET['id'];
    $sql            = $koneksi->query("SELECT * FROM tb_pelajar WHERE id_pelajar = '$id_pelajar'");
    $pelajar        = $sql->fetch_assoc();
?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pelajar</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="?halaman=pelajar">Pelajar</a></li>
                            <li class="active">Lihat pelajar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data pelajar</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="col-lg-3">
                                <img style="width:150px; height:150px;" src="gambar/profil/pelajar/<?php echo $pelajar['foto_pelajar'];?>"/>
                                </div>
                                <div class="col-lg-3">
                                        <div class="form-group">
                                                <label class=" form-control-label">NIS</label>
                                                <p><?php echo $pelajar['nis_pelajar'];?></p>
                                        </div>
                                        <div class="form-group">
                                                <label class=" form-control-label">Nama</label>
                                                <p><?php echo $pelajar['nama_pelajar'];?></p>
                                        </div>
                                        <div class="form-group">
                                                <label class=" form-control-label">No Telp</label>
                                                <p><?php echo $pelajar['telp_pelajar'];?></p>
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                        <div class="form-group">
                                                <label class=" form-control-label">Surel</label>
                                                <p><?php echo $pelajar['surel_pelajar'];?></p>
                                        </div>
                                        <div class="form-group">
                                                <label class=" form-control-label">Status</label>
                                                <p id="status"><?php echo $pelajar['status_pelajar'];?></p>
                                        </div>
                                        <div class="form-group">
                                                <label class=" form-control-label">Poin</label>
                                                <p><?php echo $pelajar['poin_pelajar'];?></p>
                                        </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary btn-sm" href="?halaman=pelajar&aksi=ubah&id=<?php echo $id_pelajar;?>"><i class="fa fa-cogs"></i> Ubah</a>
                                <a onclick="return confirm ('Hapus data pelajar ini?')" class="btn btn-danger btn-sm" href="?halaman=pelajar&aksi=hapus&id=<?php echo $id_pelajar;?>"><i class="fa fa-remove"></i> Hapus</a>
                            </div>
                        </div>
                    </div>                  
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data pelanggaran</strong>
                            </div>
                            <div class="card-body card-block">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Poin</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no   = 1;
                                    $x  = $koneksi->query("SELECT * FROM tb_datapelanggar, tb_pelanggaran, tb_pengguna
                                    WHERE tb_datapelanggar.id_pelajar = '$id_pelajar'
                                    AND tb_datapelanggar.id_pelanggaran = tb_pelanggaran.id_pelanggaran
                                    AND tb_datapelanggar.id_guru = tb_pengguna.id_pengguna");
                                    while ($pelanggaran = $x->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $pelanggaran['nama_pelanggaran']?></td>
                                    <td><?php echo $pelanggaran['deskripsi_pelanggaran']?></td>
                                    <td><?php echo $pelanggaran['poin_pelanggaran']?></td>
                                    <td><?php echo $pelanggaran['tanggal_pelanggaran']?></td>
                                    <td><?php echo $pelanggaran['nama_pengguna']?></td>
                                  </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data dispensasi</strong>
                            </div>
                            <div class="card-body card-block">
                            <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no   = 1;
                                    $y  = $koneksi->query("SELECT * FROM tb_datadispen, tb_pengguna
                                    WHERE tb_datadispen.id_pelajar = '$id_pelajar'
                                    AND tb_datadispen.id_guru = tb_pengguna.id_pengguna");
                                    while ($pelanggaran = $y->fetch_assoc()){
                                    ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $pelanggaran['nama_dispen']?></td>
                                    <td><?php echo $pelanggaran['deskripsi_dispen']?></td>
                                    <td><?php echo $pelanggaran['tgl_dibuat']?></td>
                                    <td><?php echo $pelanggaran['nama_pengguna']?></td>
                                  </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data penghargaan</strong>
                            </div>
                            <div class="card-body card-block">
                            Segera hadir!
                            </div>
                        </div>
                    </div>
                </div>
<script type="text/javascript">
var status = document.getElementById('status').innerHTML;
if (status == "Aktif"){
 document.getElementById('status').style.color = "#2ecc71";
}
if(status == "Nonaktif"){
document.getElementById('status').style.color = "#e74c3c";
}
</script>