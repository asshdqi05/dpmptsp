<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info" href="<?= site_url('C_npd/npd') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
            </div>
            <form method="POST" name="form_rental" action="<?= site_url('C_npd/save_npd') ?>">
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
                        <label>Kode Rekening</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="hidden" id="id_kegiatan" readonly name="id_kegiatan" class="form-control">
                                <input type="text" id="kode_rekening" name="kode_rekening" readonly class="form-control" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan" readonly class="form-control" required>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" data-toggle="modal" data-target="#modal_kegiatan" class="btn btn-primary">Cari Data Kegiatan</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No Rekening Asal</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="norek_asal" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No Rekening Tujuan</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" readonly id="id_pegawai" name="id_pegawai" class="form-control">
                                <input type="text" readonly id="norek_tujuan" name="norek_tujuan" class="form-control" required>
                            </div>

                            <div class="col-sm-3">
                                <button type="button" data-toggle="modal" data-target="#modal_pegawai" class="btn btn-primary">Cari Data </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Penerima</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" readonly id="nama_penerima" name="nama_penerima" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nominal</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="number" name="nominal" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan NPD</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function pilih_kegiatan(id, korek, nama_kegiatan) {
        $('#id_kegiatan').val(id);
        $('#kode_rekening').val(korek);
        $('#nama_kegiatan').val(nama_kegiatan);
        $('#modal_kegiatan').modal('hide');
    }

    function pilihmobil(id, nama, norek) {
        $('#id_pegawai').val(id);
        $('#nama_penerima').val(nama);
        $('#norek_tujuan').val(norek);
        $('#modal_pegawai').modal('hide');
    }
</script>

<div class="modal fade" id="modal_kegiatan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Kegiatan</h4>
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
                            <th>Nama Kegiatan</th>
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
                                    <button type="button" class="btn btn-primary" onclick="return pilih_kegiatan('<?= $d->id_kegiatan ?>','<?= $d->kode_rekening ?>','<?= $d->nama_kegiatan ?>')">
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

<div class="modal fade" id="modal_pegawai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pegawai</h4>
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
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>No Rekening</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_pegawai as $d) :
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->nip ?></td>
                                <td><?= $d->nama_pegawai ?></td>
                                <td><?= $d->no_rekening ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilihmobil('<?= $d->id_pegawai ?>','<?= $d->nama_pegawai ?>','<?= $d->no_rekening ?>')">
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