<?= $this->extend('template/V_header') ?>

<?= $this->section('content') ?>

<?php $session = session(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <?php if ($session->get('level') == 1) { ?>
                    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal_add">
                        <span class="fa fa-plus"></span>
                        Tambah Data
                    </button>
                <?php } else { ?>
                    <h3>Data Kegiatan</h3>
                <?php } ?>

            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Kode Rekening</th>
                        <th>Nama kegiatan</th>
                        <?php if ($session->get('level') == 1) { ?>
                            <th class="text-center">Aksi</th>
                        <?php } ?>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data_kegiatan as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->kode_rekening ?></td>
                                <td><?= $d->nama_kegiatan ?></td>
                                <?php if ($session->get('level') == 1) { ?>
                                    <td class="text-center" width="100px">
                                        <a class="btn btn-sm btn-success" href="javascript:void(0)" onclick="edit( '<?= $d->id_kegiatan ?>',
                                                                                 '<?= $d->kode_rekening ?>',
                                                                                '<?= $d->nama_kegiatan ?>' 
                                                                               )">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_kegiatan ?>','<?= $d->nama_kegiatan ?>')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function edit(id, korek, nama) {
        $('#id').val(id);
        $('#korek').val(korek);
        $('#nama').val(nama);
        $('#edit_data').modal('show');
    }

    function hapus(id, nama) {
        $('#hid').val(id);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data kegiatan</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_admin/save_kegiatan') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <input type="text" name="korek" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama kegiatan</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-close"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data kegiatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_admin/edit_kegiatan') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <input type="hidden" name="id" id="id" class="form-control" required>
                        <input type="text" name="korek" id="korek" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama kegiatan</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-close"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_admin/delete_kegiatan') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-close"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>