<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info" href="<?= site_url('C_dpa/dpa') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
            </div>
            <form method="POST" name="form_dpa" action="<?= site_url('C_dpa/save_dpa') ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" id="id_kegiatan" readonly name="id_kegiatan" class="form-control">
                                <button type="button" data-toggle="modal" data-target="#modal_npd" class="btn btn-primary">Cari Data Kegiatan</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" id="kode_rekening" name="kode_rekening" readonly class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Uraian</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan" readonly class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Satuan</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="satuan" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Volume</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="number" name="volume" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="number" id="nominal" name="harga_satuan" class="form-control" onkeyup="cari_jumlah()" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" readonly name="jumlah" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan DPA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function pilih_npd(id_kegiatan, kode_rekening, nama_kegiatan) {
        $('#id_kegiatan').val(id_kegiatan);
        $('#kode_rekening').val(kode_rekening);
        $('#nama_kegiatan').val(nama_kegiatan);
        $('#modal_npd').modal('hide');
    }

    function cari_jumlah() {
        var volume = document.form_dpa.volume.value;
        var nominal = document.form_dpa.harga_satuan.value;

        document.form_dpa.jumlah.value = volume * nominal;
    }
</script>

<div class="modal fade" id="modal_npd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data NPD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Rekening</th>
                            <th>Uraian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_kegiatan as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->kode_rekening ?></td>
                                <td><?= $d->nama_kegiatan ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_npd('<?= $d->id_kegiatan ?>','<?= $d->kode_rekening ?>','<?= $d->nama_kegiatan ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>