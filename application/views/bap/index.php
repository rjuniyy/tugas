                <!-- Begin Page Content -->

                <div class="container-fluid">
                    <?= $this->session->flashdata('message')?>
                    <!-- TABEL FOR ADMIN -->
                    <?php if($this->session->userdata('role_id')== 1) { ?>
                    <div class="card shadow mb-4">
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h2 class="m-0 font-weight-bold text-primary text-center">TABEL FILE BAP UAS
                            </h2>
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
                                                <th>NIDN</th>
                                                <th>Semester</th>
                                                <th>Nama File</th>
                                                <th>Tanggal Upload</th>
                                                <th class="invisible"></th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no=1; foreach ($data as $row): ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['n_id'] ?></td>
                                                <td><?php echo $row['thn']?></td>
                                                <td><?php echo $row['filename']?></td>
                                                <td><?php echo $row['date_created']?></td>
                                                <td><?= anchor('bap/download/'.$row['id'], '<button class="btn 
                                                    btn-primary btn-sm"><i
                                                    class="fa fa-download"> Download</i></button>'); ?>
                                                </td>
                                                <td class="invisible"></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="invisible">No</th>
                                                <th class="invisible">Nama Dosen</th>
                                                <th class="invisible">NIDN</th>
                                                <th>Tahun Akademik</th>
                                                <th class="invisible">BAP UAS</th>
                                                <th class="invisible">Tanggal Upload</th>
                                                <th class="invisible"></th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF TABLE -->

                    <!-- TAMBAH DATA MODAL HANYA UNTUK DOSEN-->
                    <?php }elseif($this->session->userdata('role_id') == 2){ ?>
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                class="fa fa-plus"></i>
                            Tambah Data
                        </button>
                        <a href="<?php echo base_url().'bap/down_temp' ?>">
                            <button type="button" class="btn btn-info"><i class="fa fa-download"></i>
                                Download Template BAP UAS
                            </button></a>
                    </div>
                    <!-- MODAL -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="exampleModalLabel">***** UPLOAD BAP
                                        UAS DOSEN *****</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= form_open_multipart('bap/upload');?>
                                    <div class="form-group">
                                        <label for="thn">Tahun Akademik</label>
                                        <select class="form-control-rounded form-control" name="thn" id="thn">
                                            <option selected>Pilih Tahun Akademik....</option>
                                            <option value="2021/2022 Genap">2021/2022 Genap</option>
                                            <option value="2021/2022 Ganjil">2021/2022 Ganjil</option>
                                        </select>
                                        <?= form_error('thn', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi">Program Studi</label>
                                        <select class="form-control-rounded form-control" name="prodi" id="prodi">
                                            <option>Pilih Program Studi....</option>
                                            <?php foreach($prodi as $row): ?>
                                            <option value="<?= $row->prodi; ?>"><?= $row->prodi; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="matauji">Mata Uji</label>
                                        <input type="text" class="form-control-rounded form-control" name="matauji"
                                            id="matauji" value="<?= set_value('matauji'); ?>">
                                        <?= form_error('matauji', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="filename">Upload File BAP</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filename" name="filename">
                                            <label class="custom-file-label" for="file">Choose File</label>
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

                    <!-- TABEL FILE BAP UAS -->
                    <div class="card shadow mb-4">
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h2 class="m-0 font-weight-bold text-primary text-center">TABEL FILE BAP UAS
                            </h2>
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
                                                <th>NIDN</th>
                                                <th>Tahun Akademik</th>
                                                <th>Program Studi</th>
                                                <th>Mata Uji</th>
                                                <th>BAP UAS</th>
                                                <th>Tanggal Upload</th>
                                                <th class="invisible"></th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no=1; foreach($data as $bap): ?>

                                            <td><?= $no++; ?></td>
                                            <td><?= $bap['name']?></td>
                                            <td><?= $bap['n_id']?></td>
                                            <td><?= $bap['thn']?></td>
                                            <td><?= $bap['prodi']?></td>
                                            <td><?= $bap['matauji']?></td>
                                            <td><?= $bap['filename']?></td>
                                            <td><?= $bap['date_created']?></td>
                                            <td><?= anchor('bap/download/'.$bap['id'],'<button class="btn 
                                                    btn-primary"><i
                                                    class="fa fa-download"> Download</i></button>'); ?>

                                                <?= anchor('bap/view_edit/'.$bap['id'], '<button class="btn 
                                                    btn-info"><i
                                                    class="fa fa-edit"> Edit</i></button>'); ?>

                                                <a href="<?= base_url('bap/delete/'.$bap['id']) ?>" data-toggle="modal"
                                                    data-target="#deleteModal">
                                                    <button class="btn btn-danger"><i class="fa fa-trash">
                                                            Delete</i>
                                                    </button>
                                                </a>
                                            </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <th class="invisible">No</th>
                                            <th class="invisible">Nama Dosen</th>
                                            <th class="invisible">NIDN</th>
                                            <th>Tahun Akademik</th>
                                            <th class="invisible">Program Studi</th>
                                            <th class="invisible">Mata Uji</th>
                                            <th class="invisible">BAP UAS</th>
                                            <th class="invisible">Tanggal Upload</th>
                                            <th class="invisible"></th>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF TABLE -->
                </div>
                <?php } ?>



                <!-- DELETE MODAL-->
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
                                <a class="btn btn-primary" href="<?= base_url('bap/hapus/'.$bap['id']) ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF DELETE MODAL -->

                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->