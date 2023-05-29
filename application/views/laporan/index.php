                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <?php if($this->session->userdata('role_id') == 2){ ?>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i
                                class="fa fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>

                    <!-- ADD MODAL -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="exampleModalLabel">UPLOAD NILAI LAPORAN
                                        MAHASISWA</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-lg">
                                        <?= form_open_multipart('laporan/upload');?>
                                        <div class="form-group">
                                            <label for="thn">Tahun Akademik</label>
                                            <select class="form-control-rounded form-control" name="thn" id="thn">
                                                <option value="2021-2022 Genap">2021-2022 Genap</option>
                                                <option value="2021-2022 Ganjil">2021-2022 Ganjil</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="prodi">Program Studi</label>
                                            <select class="form-control-rounded form-control" name="prodi" id="prodi">
                                                <option value="" selected>Pilih Program Studi...</option>
                                                <?php foreach($prodi as $prodi): ?>
                                                <option value="<?= $prodi->prodi ?>"><?= $prodi->prodi ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="matkul">Mata Kuliah</label>
                                            <input type="text" class="form-control-rounded form-control" name="matkul"
                                                id="matkul" value="<?= set_value('matkul'); ?>">
                                            <?= form_error('matkul', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="filename">Upload File Laporan Nilai</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="filename"
                                                    name="filename">
                                                <label class="custom-file-label" for="file">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit" class="btn btn-primary">
                                    <?= form_close(); ?>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF MODAL -->

                    <?php } ?>

                    <div class="card shadow mb-4">
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h3 class="m-0 font-weight-bold text-primary text-center">TABEL LAPORAN NILAI MAHASISWA
                            </h3>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <div class="table-responsive mb-4">
                                    <table id="example"
                                        class="table table-striped table-bordered table-hover text-center"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Dosen</th>
                                                <th>Tahun Akademik</th>
                                                <th>Program Studi</th>
                                                <th>Mata Kuliah</th>
                                                <th>Nama File</th>
                                                <th>Tanggal Upload</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $no =1;
                                            foreach($data as $lap): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $lap->name; ?></td>
                                                <td><?= $lap->thn; ?></td>
                                                <td><?= $lap->prodi; ?></td>
                                                <td><?= $lap->matkul; ?></td>
                                                <td><?= $lap->filename; ?></td>
                                                <td><?= $lap->date_created; ?></td>
                                                <td><?php if($this->session->userdata('role_id') == 1){ ?>
                                                    <?= anchor('laporan/download/'.$lap->id,'<button class="btn 
                                                    btn-primary"><i
                                                    class="fa fa-download"> Download</i></button>'); ?>
                                                    <?php }else{ ?>
                                                    <?= anchor('laporan/download/'.$lap->id,'<button class="btn 
                                                    btn-primary"><i
                                                    class="fa fa-download"> Download</i></button>'); ?>
                                                    <?= anchor('laporan/view_edit/'.$lap->id, '<button class="btn 
                                                    btn-info"><i
                                                    class="fa fa-edit"> Edit</i></button>'); ?>

                                                    <a href="<?= base_url('laporan/delete/'.$lap->id) ?>"
                                                        data-toggle="modal" data-target="#deleteModal">
                                                        <button class="btn btn-danger"><i class="fa fa-trash">
                                                                Delete</i>
                                                        </button>
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <th class="invisible">No</th>
                                            <th class="invisible">Nama Dosen</th>
                                            <th>Tahun Akademik</th>
                                            <th class="invisible">Program Studi</th>
                                            <th class="invisible">Mata Kuliah</th>
                                            <th class="invisible">Nama File</th>
                                            <th class="invisible">Tanggal Upload</th>
                                            <th class="invisible"></th>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DELETE MODAL-->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this data?
                                    </h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Delete" below if you want to delete data.
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary"
                                        href="<?= base_url('laporan/hapus/'.$lap->id) ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF DELETE MODAL -->


                </div>

                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->