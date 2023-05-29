                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div id="content" class="main-content">
                        <?= $this->session->flashdata('message')?>


                        <div class="col-lg-4">
                            <?= form_open_multipart('laporan/edit/'.$get['id']);?>
                            <div class="form-group">
                                <label for="nama">Nama Dosen</label>
                                <input type="text" class="form-control-rounded form-control" name="nama" id="nama"
                                    value="<?= $get['name']; ?>" readonly>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="n_id">NIDN</label>
                                <input type="text" class="form-control-rounded form-control" name="n_id" id="n_id"
                                    value="<?= $get['n_id']; ?>" readonly>
                                <?= form_error('n_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="editThn">Tahun Akademik</label>
                                <select class="form-control-rounded form-control" name="editThn" id="editThn">
                                    <option value="<?=$get['thn'] ?>"><?=$get['thn'] ?></option>
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
                                <label for="editMatkul">Mata Kuliah</label>
                                <input type="text" class="form-control-rounded form-control" name="editMatkul"
                                    id="editMatkul" value="<?= $get['matkul']; ?>">
                                <?= form_error('editMatkul', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="filename">Edit File Laporan Nilai</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="filename" name="filename">
                                    <label class="custom-file-label" for="file">Choose File</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm text-right">
                                    <div class="form-group">
                                        <a href="<?= base_url('laporan'); ?>"><button type="button"
                                                class="btn btn-secondary">Cancel</button></a>
                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>

                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->