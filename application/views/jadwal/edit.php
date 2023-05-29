                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- EDIT DATA JADWAL SIDANG -->
                    <div id="content" class="main-content">
                        <?= $this->session->flashdata('message')?>
                        <div class="col-lg-4">
                            <?php if (stripos($_SERVER['REQUEST_URI'], 'jadwal/view_edit_ta/'.$get['id'])){ ?>
                            <?= form_open_multipart('jadwal/edit_ta/'.$get['id']);?>
                            <?php }else{ ?>
                            <?= form_open_multipart('jadwal/edit_skripsi/'.$get['id']);?>
                            <?php } ?>
                            <div class="form-group">
                                <label for=" nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control-rounded form-control mb-2" id="nama" name="nama"
                                    value="<?= $get['nama']; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for=" npm">NPM</label>
                                <input type="text" class="form-control-rounded form-control mb-2" id="npm" name="npm"
                                    value="<?= $get['npm']; ?>">
                                <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_pembimbing1">Pembimbing 1</label>
                                <select class="form-control-rounded form-control" id="n_pembimbing1"
                                    name="n_pembimbing1">
                                    <option value="<?= $get['n_pembimbing1']; ?>" selected><?= $get['n_pembimbing1']; ?>
                                    </option>
                                    <?php foreach($dosen as $row): ?>
                                    <option value="<?= $row->nama ?>"><?= $row->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('n_pembimbing1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_pembimbing2">Pembimbing 2</label>
                                <select class="form-control-rounded form-control" id="n_pembimbing2"
                                    name="n_pembimbing2">
                                    <option value="<?= $get['n_pembimbing2']; ?>" selected>
                                        <?= $get['n_pembimbing2']; ?>
                                    </option>
                                    <?php foreach($dosen as $row): ?>
                                    <option value="<?= $row->nama ?>"><?= $row->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('n_pembimbing2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_penguji1">Penguji 1</label>
                                <select class="form-control-rounded form-control" id="n_penguji1" name="n_penguji1">
                                    <option value="<?= $get['n_penguji1']; ?>" selected><?= $get['n_penguji1']; ?>
                                    </option>
                                    <?php foreach($dosen as $row): ?>
                                    <option value="<?= $row->nama ?>"><?= $row->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('n_penguji1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_penguji2">Penguji 2</label>
                                <select class="form-control-rounded form-control" id="n_penguji2" name="n_penguji2">
                                    <option value="<?= $get['n_penguji2']; ?>" selected><?= $get['n_penguji2']; ?>
                                    </option>
                                    <?php foreach($dosen as $row): ?>
                                    <option value="<?= $row->nama ?>"><?= $row->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('n_penguji2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_penguji3">Nama Penguji 3</label>
                                <select class="form-control-rounded form-control" id="n_penguji3" name="n_penguji3">
                                    <option value="<?= $get['n_penguji3']; ?>" selected><?= $get['n_penguji3']; ?>
                                    </option>
                                    <?php foreach($dosen as $row): ?>
                                    <option value="<?= $row->nama ?>"><?= $row->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ruangan">Ruang Sidang</label>
                                <select class="form-control-rounded form-control" id="ruangan" name="ruangan">
                                    <option value="<?= $get['ruangan']; ?>" selected><?= $get['ruangan']; ?></option>
                                    <?php foreach($ruang as $r): ?>
                                    <option value="<?= $r->ruangan ?>"><?= $r->ruangan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Tanggal Sidang</label>
                                <input type="date" class="form-control-rounded form-control" id="tanggal" name="tanggal"
                                    value="<?= $get['tanggal']; ?>">
                                <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4">Hari Sidang</label>
                                <input type="text" class="form-control-rounded form-control" id="hari" name="hari"
                                    value="<?= $get['hari']; ?>">
                                <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group mr-4">
                                    <label for="jamawal">Jam Awal</label>
                                    <input type="time" class="form-control-rounded form-control" name="jamawal"
                                        id="jamawal" value="<?= $get['jam_awal']; ?>">
                                    <?= form_error('jamawal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jamakhir">Jam Akhir</label>
                                    <input type="time" class="form-control-rounded form-control" name="jamakhir"
                                        id="jamakhir" value="<?= $get['jam_akhir']; ?>">
                                    <?= form_error('jamakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm text-right">
                                    <div class="form-group">
                                        <?php if (stripos($_SERVER['REQUEST_URI'], 'jadwal/view_edit_ta/'.$get['id'])){ ?>
                                        <a href="<?= base_url('jadwal/jsidang_ta'); ?>"><button type="button"
                                                class="btn btn-secondary">Cancel</button></a>
                                        <?php }else{ ?>
                                        <a href="<?= base_url('jadwal/jsidang_skripsi'); ?>"><button type="button"
                                                class="btn btn-secondary">Cancel</button></a>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>

                    </div>
                    <!-- END OF EDIT DATA -->
                </div>


                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->