<link rel="stylesheet" type="text/css" href="jquery.ajaxcomplete.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

   <!-- Including our scripting file. -->

<script type="text/javascript" src="halaman/admin/piket/script.js"></script>
<script>
	function Result(element) {
    var nama = element.textContent;
	document.getElementById("namapelajar").value = $(nama).selector;
	$('#display').html('');
	}
</script>
<div class="content mt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Pindai kartu pelajar</strong>
                </div>
                <div class="card-body">
                    Silakan pindai kartu pelajar atau ketik manual NIS.<br /><br />
                    <form id="inputnis" method="POST" action="index.php?halaman=piket&aksi=terimainput" class="col-sm-4">
                        <div class="form-group">
                            <input name="pindai" type="number" class="form-control" required autofocus />
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button form="inputnis" name="simpan" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-sign-in"></i> Pindai
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Cari nama Siswa</strong>
                </div>
                <div class="card-body">
                    Cari siswa berdasarkan Nama<br /><br />
                    <form id="inputnama" method="POST" action="index.php?halaman=piket&aksi=terimainput" class="col-sm-6">
                        <div class="form-group">
                            <input name="nama_pelajar" id="namapelajar" class="form-control" placeholder="Cari nama" autocomplete="off">
                        </div>
                    </form>
			        <div id="display"></div>
                </div>
                <div class="card-footer">
                    <button form="inputnama" name="namasiswa" type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-sign-in"></i> Pindai
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
