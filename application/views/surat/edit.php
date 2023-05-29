                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div id="content" class="main-content">
                        <?= $this->session->flashdata('message')?>

                        <?php if($this->session->userdata('role_id')==3){ ?>
                        <div class="col-lg-4">
                            <?= form_open_multipart('surat/edit/'.$data['id']);?>
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control-rounded form-control" name="nama" id="nama"
                                    value="<?= $data['name'] ?>" readonly>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_id">NIDN</label>
                                <input type="text" class="form-control-rounded form-control" name="n_id" id="n_id"
                                    value="<?= $data['n_id'] ?>" readonly>
                                <?= form_error('n_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="editThn">Tahun Akademik</label>
                                <select class="form-control-rounded form-control" name="editThn" id="editThn">
                                    <option value="<?=$data['thn'] ?>"><?=$data['thn'] ?></option>
                                    <option value="2021-2022 Genap">2021-2022 Genap</option>
                                    <option value="2021-2022 Ganjil">2021-2022 Ganjil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editProdi">Program Studi</label>
                                <select class="form-control-rounded form-control" name="editProdi" id="editProdi">
                                    <?php foreach($prodi as $row):?>
                                    <option value="<?= $row->prodi; ?>">
                                        <?= $row->prodi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="filename">Edit Surat Pengajuan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="filename" name="filename">
                                    <label class="custom-file-label" for="file"><?= $data['filename'] ?></label>
                                </div>
                            </div>

                            <?php if($this->session->userdata('role_id') == 1){ ?>
                            <div class="form-group">
                                <label for="balasan">Upload Surat Balasan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="balasan" name="balasan">
                                    <label class="custom-file-label" for="file">Choose File</label>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-sm text-right">
                                    <div class="form-group">
                                        <a href="<?= base_url('surat'); ?>"><button type="button"
                                                class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                    </div>

                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                        <?php }elseif($this->session->userdata('role_id') == 1){ ?>
                        <div class="col-lg-4">
                            <?= form_open_multipart('surat/edit/'.$data['id']);?>
                            <div class="form-group">
                                <label for="nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control-rounded form-control" name="nama" id="nama"
                                    value="<?= $data['name'] ?>" readonly>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_id">NIDN</label>
                                <input type="text" class="form-control-rounded form-control" name="n_id" id="n_id"
                                    value="<?= $data['n_id'] ?>" readonly>
                                <?= form_error('n_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="thn">Tahun Akademik</label>
                                <input type="text" class="form-control-rounded form-control" name="thn" id="thn"
                                    value="<?= $data['thn'] ?>" readonly>
                                <?= form_error('thn', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <input type="text" class="form-control-rounded form-control" name="prodi" id="prodi"
                                    value="<?= $data['prodi'] ?>" readonly>
                                <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="filename">Upload Surat Balasan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="balasan" name="balasan">
                                    <label class="custom-file-label" for="file">Choose File</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm text-right">
                                    <div class="form-group">
                                        <a href="<?= base_url('surat'); ?>"><button type="button"
                                                class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                    </div>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                        <?php } ?>



                    </div>
                </div>


                <!-- /.container-fluid -->


                </div>
                <!-- End of Main Content -->