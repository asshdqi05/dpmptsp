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
                    <h3>Data Pegawai</h3>
                <?php } ?>

            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>NIP</th>
                        <th>Nama pegawai</th>
                        <th>Bidang</th>
                        <th>Jabatan</th>
                        <?php if ($session->get('level') == 1) { ?>
                            <th class="text-center">Aksi</th>
                        <?php } ?>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data_pegawai as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->nip ?></td>
                                <td><?= $d->nama_pegawai ?></td>
                                <td><?= $d->nama_bidang ?></td>
                                <td><?= $d->nama_jabatan ?></td>
                                <?php if ($session->get('level') == 1) { ?>
                                    <td class="text-center" width="100px">
                                        <a class="btn btn-sm btn-success" href="javascript:void(0)" onclick="edit( '<?= $d->id_pegawai ?>',
                                                                                '<?= $d->nip ?>', 
                                                                                '<?= $d->nama_pegawai ?>', 
                                                                                '<?= $d->id_bidang ?>',
                                                                                '<?= $d->id_jabatan ?>',
                                                                                '<?= $d->no_rekening ?>'
                                                                               )">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_pegawai ?>','<?= $d->nama_pegawai ?>')">
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
    function edit(id, nip, nama, id_bidang, id_jabatan, norek) {
        $('#id').val(id);
        $('#nip').val(nip);
        $('#nama').val(nama);
        $('#id_bidang').val(id_bidang);
        $('#id_jabatan').val(id_jabatan);
        $('#norek').val(norek);
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
                <h4 class="modal-title">Input Data pegawai</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_admin/save_pegawai') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP pegawai</label>
                        <input type="text" name="nip" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama pegawai</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Bidang</label>
                        <select name="bidang" class="form-control" required>
                            <option disabled selected>-Pilih-</option>
                            <?php foreach ($data_bidang as $d) { ?>
                                <option value="<?= $d->id_bidang ?>"><?= $d->nama_bidang ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="form-control" required>
                            <option disabled selected>-Pilih-</option>
                            <?php foreach ($data_jabatan as $d) { ?>
                                <option value="<?= $d->id_jabatan ?>"><?= $d->nama_jabatan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input type="number" name="norek" class="form-control" required>
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
                <h4 class="modal-title">Data pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_admin/edit_pegawai') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP pegawai</label>
                        <input type="text" name="nip" id="nip" class="form-control" required>
                        <input type="hidden" name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama pegawai</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Bidang</label>
                        <select name="bidang" id="id_bidang" class="form-control" required>
                            <option disabled>-Pilih-</option>
                            <?php foreach ($data_bidang as $d) { ?>
                                <option value="<?= $d->id_bidang ?>"><?= $d->nama_bidang ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" id="id_jabatan" class="form-control" required>
                            <option disabled>-Pilih-</option>
                            <?php foreach ($data_jabatan as $d) { ?>
                                <option value="<?= $d->id_jabatan ?>"><?= $d->nama_jabatan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input type="number" name="norek" id="norek" class="form-control" required>
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
            <form method="POST" action="<?php echo site_url('C_admin/delete_pegawai') ?>">
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