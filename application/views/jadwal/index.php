<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- CONTENT -->
    <div id="content" class="main-content">
        <?= $this->session->flashdata('message')?>
        <?php if ($this->session->userdata('role_id') == 1) { ?>

        <!-- BUTTON TAMBAH DATA -->
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i
                    class="fa fa-plus"></i>
                Tambah Data
            </button>
        </div>
        <!-- END OF BUTTON -->

        <!-- ADD MODAL UNTUK ADMIN -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal Sidang TA</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg">
                            <?php
                            if (stripos($_SERVER['REQUEST_URI'], 'jadwal/jsidang_ta')){ ?>
                            <form class="" method="POST" action="<?= base_url('jadwal/insert_sidang_ta');?>">
                                <?php }else { ?>
                                <form class="user" method="POST"
                                    action="<?= base_url('jadwal/insert_sidang_skripsi');?>">
                                    <?php } ?>
                                    <div class="form-group">
                                        <label for=" nama">Nama Mahasiswa</label>
                                        <input type="text" class="form-control-rounded form-control mb-2" id="nama"
                                            placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for=" npm">NPM</label>
                                        <input type="text" class="form-control-rounded form-control" id="npm"
                                            placeholder="NPM" name="npm" value="<?= set_value('npm'); ?>">
                                        <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for=" namapenguji1">Nama Penguji 1</label>
                                        <select class="form-control-rounded form-control" name="namapenguji1"
                                            id="namapenguji1">
                                            <option value="" selected>Pilih Nama Penguji...</option>
                                            <?php foreach($namadosen as $nd): ?>
                                            <option value="<?= $nd->name ?>"><?= $nd->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=" namapenguji2">Nama Penguji 2</label>
                                        <select class="form-control-rounded form-control" name="namapenguji2"
                                            id="namapenguji2">
                                            <option value="" selected>Pilih Nama Penguji...</option>
                                            <?php foreach($namadosen as $nd): ?>
                                            <option value="<?= $nd->name ?>"><?= $nd->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=" namapenguji3">Nama Penguji 3</label>
                                        <select class="form-control-rounded form-control" name="namapenguji3"
                                            id="namapenguji3">
                                            <option value="" selected>Pilih Nama Penguji...</option>
                                            <?php foreach($namadosen as $nd): ?>
                                            <option value="<?= $nd->name ?>"><?= $nd->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=" namapembimbing">Nama Pembimbing 1</label>
                                        <select class="form-control-rounded form-control" name="namapembimbing1"
                                            id="namapembimbing1">
                                            <option value="" selected>Pilih Nama Pembimbing...</option>
                                            <?php foreach($namadosen as $nd): ?>
                                            <option value="<?= $nd->name ?>"><?= $nd->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=" namapembimbing">Nama Pembimbing 2</label>
                                        <select class="form-control-rounded form-control" name="namapembimbing2"
                                            id="namapembimbing2">
                                            <option value="" selected>Pilih Nama Pembimbing...</option>
                                            <?php foreach($namadosen as $nd): ?>
                                            <option value="<?= $nd->name ?>"><?= $nd->name ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ruangan">Ruang Sidang</label>
                                        <select class="form-control-rounded form-control" id="ruangan" name="ruangan">
                                            <option value="" selected>Pilih Ruangan...</option>
                                            <?php foreach($ruang as $r): ?>
                                            <option value="<?= $r->ruangan ?>"><?= $r->ruangan ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4">Tanggal Sidang</label>
                                        <input type="date" class="form-control-rounded form-control" id="tanggal"
                                            name="tanggal">
                                        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="inputPassword4">Hari Sidang</label>
                                        <input type="text" class="form-control-rounded form-control" id="hari"
                                            name="hari" placeholder="Hari Sidang">
                                        <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> -->
                                    <div class="form-row">
                                        <div class="form-group mr-4">
                                            <label for="jamawal">Jam Awal</label>
                                            <input type="time" class="form-control-rounded form-control" name="jamawal"
                                                id="jamawal" value="<?= set_value('jamawal'); ?>">
                                            <?= form_error('jamawal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="jamakhir">Jam Akhir</label>
                                            <input type="time" class="form-control-rounded form-control" name="jamakhir"
                                                id="jamakhir" value="<?= set_value('jamakhir'); ?>">
                                            <?= form_error('jamakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- END OF MODAL -->
    </div>
    <!-- END OF CONTENT -->

    <?php } ?>

    <!-- TABEL JADWAL SIDANG MAHASISWA -->
    <?php if($this->session->userdata('role_id') == 1 || 2){ ?>
    <div class="card shadow mb-4">
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <?php if (stripos($_SERVER['REQUEST_URI'], 'jadwal/jsidang_ta')){ ?>
            <h3 class="m-0 font-weight-bold text-primary text-center">JADWAL SIDANG MAHASISWA-TA</h3>
            <?php }else{ ?>
            <h3 class="m-0 font-weight-bold text-primary text-center">JADWAL SIDANG MAHASISWA-SKRIPSI</h3>
            <?php } ?>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Hari, Tanggal</th>
                                <th>Jam</th>
                                <th>Ruang</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Pembimbing 1</th>
                                <th>Pembimbing 2</th>
                                <th>Nama Penguji 1</th>
                                <th>Nama Penguji 2</th>
                                <th>Nama Penguji 3</th>
                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                <th class="invisible"></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no =1; foreach($data as $j): ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $j->hari; ?>, <?= $j->tanggal; ?></td>
                                <td><?= $j->jam_awal; ?>-<?= $j->jam_akhir; ?></td>
                                <td><?= $j->ruangan; ?></td>
                                <td><?= $j->npm; ?></td>
                                <td><?= $j->nama; ?></td>
                                <td><?= $j->n_pembimbing1; ?></td>
                                <td><?= $j->n_pembimbing2; ?></td>
                                <td><?= $j->n_penguji1; ?></td>
                                <td><?= $j->n_penguji2; ?></td>
                                <td><?= $j->n_penguji3; ?></td>
                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                <td>

                                    <?php if (stripos($_SERVER['REQUEST_URI'], 'jadwal/jsidang_ta')){ ?>
                                    <?= anchor('jadwal/view_edit_ta/'.$j->id, '<button class="btn 
                                                    btn-info"><i
                                                    class="fa fa-edit"> Edit</i></button>'); ?>
                                    <a href="<?= base_url('jadwal/delete/'.$j->id) ?>" data-toggle="modal"
                                        data-target="#deleteModal">
                                        <button class="btn btn-danger"><i class="fa fa-trash">
                                                Delete</i>
                                        </button>
                                    </a>

                                    <?php }else { ?>
                                    <?= anchor('jadwal/view_edit_skripsi/'.$j->id, '<button class="btn 
                                                    btn-info"><i
                                                    class="fa fa-edit"> Edit</i></button>'); ?>
                                    <?= anchor('jadwal/hapus_jskripsi/'.$j->id, '<button class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"> Delete</i></button>'); ?>
                                </td>
                                <?php }} ?>


                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <th class="invisible">No</th>
                            <th class="invisible">Tanggal</th>
                            <th class="invisible">Jam</th>
                            <th class="invisible">Ruang</th>
                            <th class="invisible">NPM</th>
                            <th class="invisible">Nama Mahasiswa</th>
                            <th class="invisible">Pembimbing 1</th>
                            <th class="invisible">Pembimbing 2</th>
                            <th class="invisible">Nama Penguji 1</th>
                            <th class="invisible">Nama Penguji 2</th>
                            <th class="invisible">Nama Penguji 3</th>
                            <?php if($this->session->userdata('role_id')==1){ ?>
                            <th class="invisible"></th>
                            <?php } ?>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php }elseif ($this->session->userdata('role_id') == 3){ ?>
    <div class="card shadow mb-4">
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <?php if (stripos($_SERVER['REQUEST_URI'], 'jadwal/jsidang_ta')){ ?>
            <h3 class="m-0 font-weight-bold text-primary text-center">JADWAL SIDANG MAHASISWA-TA</h3>
            <?php }else{ ?>
            <h3 class="m-0 font-weight-bold text-primary text-center">JADWAL SIDANG MAHASISWA-SKRIPSI</h3>
            <?php } ?>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Hari, Tanggal</th>
                                <th>Jam</th>
                                <th>Ruang</th>
                                <th>NPM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Pembimbing 1</th>
                                <th>Pembimbing 2</th>
                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                <th class="invisible"></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no =1; foreach($data as $j): ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $j->hari; ?>, <?= $j->tanggal; ?></td>
                                <td><?= $j->jam_awal; ?>-<?= $j->jam_akhir; ?></td>
                                <td><?= $j->ruangan; ?></td>
                                <td><?= $j->npm; ?></td>
                                <td><?= $j->nama; ?></td>
                                <td><?= $j->n_pembimbing1; ?></td>
                                <td><?= $j->n_pembimbing2; ?></td>
                                <?php if($this->session->userdata('role_id') == 1){ ?>
                                <td>

                                    <?php if (stripos($_SERVER['REQUEST_URI'], 'jadwal/jsidang_ta')){ ?>
                                    <?= anchor('jadwal/view_edit_ta/'.$j->id, '<button class="btn 
                                                     btn-info"><i
                                                     class="fa fa-edit"> Edit</i></button>'); ?>
                                    <a href="<?= base_url('jadwal/delete/'.$j->id) ?>" data-toggle="modal"
                                        data-target="#deleteModal">
                                        <button class="btn btn-danger"><i class="fa fa-trash">
                                                Delete</i>
                                        </button>
                                    </a>

                                    <?php }else { ?>
                                    <?= anchor('jadwal/view_edit_skripsi/'.$j->id, '<button class="btn 
                                                     btn-info"><i
                                                     class="fa fa-edit"> Edit</i></button>'); ?>
                                    <?= anchor('jadwal/hapus_jskripsi/'.$j->id, '<button class="btn btn-danger btn-sm"><i
                                             class="fa fa-trash"> Delete</i></button>'); ?>
                                </td>
                                <?php }} ?>


                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <th class="invisible">No</th>
                            <th class="invisible">Tanggal</th>
                            <th class="invisible">Jam</th>
                            <th class="invisible">Ruang</th>
                            <th class="invisible">NPM</th>
                            <th class="invisible">Nama Mahasiswa</th>
                            <th class="invisible">Pembimbing 1</th>
                            <th class="invisible">Pembimbing 2</th>
                            <?php if($this->session->userdata('role_id')==1){ ?>
                            <th class=" invisible"></th>
                            <?php } ?>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>


    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you want to delete data.
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="
                    <?php if (stripos($_SERVER['REQUEST_URI'], 'jadwal/jsidang_ta')){ ?>
                        <?= base_url('jadwal/hapus_jta/'.$get['id']) ?>
                        <?php }else { ?>
                        <?= base_url('jadwal/hapus_jskripsi/'.$get['id']) ?>
                        <?php } ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MODAL DELETE -->

</div>