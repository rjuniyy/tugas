                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div id="content" class="main-content">
                        <?= $this->session->flashdata('message')?>

                        <div class="col-lg-4">
                            <?= form_open_multipart('bap/edit/'.$get['id']);?>
                            <div class="form-group">
                                <label for="editThn">Tahun Akademik</label>
                                <select class="form-control-rounded form-control" name="editThn" id="editThn">
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
                                <label for="editMatauji">Mata Uji</label>
                                <input type="text" class="form-control-rounded form-control" name="editMatauji"
                                    id="editMatauji" value="<?= $get['matauji']; ?>">
                                <?= form_error('editMatauji', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="filename">Edit file BAP</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="filename" name="filename">
                                    <label class="custom-file-label" for="file"><?= $get['filename']; ?></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm text-right">
                                    <div class="form-group">
                                        <a href="<?= base_url('bap'); ?>"><button type="button"
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