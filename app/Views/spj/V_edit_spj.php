<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info" href="<?= site_url('C_spj/spj') ?>"><i class="fas fa-chevron-circle-left"></i> Kembali </a>
            </div>
            <form method="POST" name="form_rental" action="<?= site_url('C_spj/update_spj') ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="date" name="tanggal" class="form-control" required value="<?= $data_spj->tanggal ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" id="" readonly name="id_spj" class="form-control" value="<?= $data_spj->id_spj ?>">
                                <input type="hidden" id="id_npd" readonly name="id_npd" class="form-control" value="<?= $data_spj->id_npd ?>">
                                <input type="hidden" id="id_kegiatan" readonly name="id_kegiatan" class="form-control" value="<?= $data_spj->id_kegiatan ?>">
                                <input type="hidden" readonly id="id_pegawai" name="id_pegawai" class="form-control" value="<?= $data_spj->id_pegawai ?>">
                                <button type="button" data-toggle="modal" data-target="#modal_npd" class="btn btn-primary">Cari Data NPD</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" id="nominal" name="nominal" readonly class="form-control" required value="<?= $data_spj->nominal ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sebab</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan" readonly class="form-control" required value="<?= $data_spj->nama_kegiatan ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Penerima</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" readonly id="nama_penerima" name="nama_penerima" class="form-control" required value="<?= $data_spj->nama_pegawai ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>PPTK</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="pptk" class="form-control" required value="<?= $data_spj->pptk ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Disetujui Oleh</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="disetujui" class="form-control" required value="<?= $data_spj->disetujui ?>">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update SPJ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function pilih_npd(id_npd, id_kegiatan, id_pegawai, nama_kegiatan, nominal, nama_pegawai) {
        $('#id_npd').val(id_npd);
        $('#id_kegiatan').val(id_kegiatan);
        $('#id_pegawai').val(id_pegawai);
        $('#nama_kegiatan').val(nama_kegiatan);
        $('#nominal').val(nominal);
        $('#nama_penerima').val(nama_pegawai);
        $('#modal_npd').modal('hide');
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
                            <th>Nominal</th>
                            <th>penerima</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_npd as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->kode_rekening ?></td>
                                <td><?= $d->nama_kegiatan ?></td>
                                <td><?= $d->nama_pegawai ?></td>
                                <td><?= $d->nominal ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_npd('<?= $d->id_npd ?>','<?= $d->id_kegiatan ?>','<?= $d->id_pegawai ?>','<?= $d->nama_kegiatan ?>','<?= $d->nominal ?>','<?= $d->nama_pegawai ?>')">
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