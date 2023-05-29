                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->session->flashdata('message')?>
                    <?php if($this->session->userdata('role_id') == 3){ ?>
                    <!-- BUTTON -->
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                class="fa fa-plus"></i>
                            Tambah Data
                        </button>
                        <a href="<?php echo base_url().'surat/down_survei' ?>">
                            <button type="button" class="btn btn-info"><i class="fa fa-download"></i>
                                Download Template Surat Pengajuan
                            </button></a>
                    </div>
                    <!-- END OF BUTTON -->
                    <?php } ?>

                    <!-- TABEL SURAT PENGAJUAN SURVEI -->
                    <div class="card shadow mb-4">
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h3 class="m-0 font-weight-bold text-primary text-center">SURAT PENGAJUAN SURVEI</h3>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <div class="table-responsive mb-4">
                                    <table id="example" class="table table-striped table-bordered table-hover"
                                        style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>NPM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Program Studi</th>
                                                <th>Surat Pengajuan</th>
                                                <th>Tanggal Upload</th>
                                                <th>Surat Balasan</th>
                                                <th class="invisible"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no =1; foreach($data as $row): ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $row->n_id ?></td>
                                                <td><?= $row->name ?></td>
                                                <td><?= $row->prodi ?></td>
                                                <td><?= $row->filename ?></td>
                                                <td><?= $row->date_created ?></td>
                                                <td><?php if($row->balasan != 'empty'){ ?>
                                                    <?= anchor('surat/download_balasan/'.$row->id,'<button class="btn 
                                                    btn-primary"><i
                                                    class="fa fa-download"> Download</i></button>'); }?>
                                                    <?= $row->balasan ?>
                                                </td>
                                                <td>
                                                    <?= anchor('surat/download/'.$row->id,'<button class="btn 
                                                    btn-primary"><i
                                                    class="fa fa-download"> Download</i></button>'); ?>
                                                    <?= anchor('surat/view_edit/'.$row->id, '<button class="btn 
                                                    btn-info"><i class="fa fa-edit"> Edit</i></button>'); ?>
                                                    <a href="<?= base_url('surat/hapus/'.$row->id) ?>"
                                                        data-toggle="modal" data-target="#deleteModal">
                                                        <button class="btn btn-danger"><i class="fa fa-trash">
                                                                Delete</i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <th class="invisible">No</th>
                                            <th class="invisible">NPM</th>
                                            <th class="invisible">Nama Mahasiswa</th>
                                            <th class="invisible">Surat Pengajuan</th>
                                            <th class="invisible">Tanggal Upload</th>
                                            <th class="invisible">Surat Balasan</th>
                                            <th class="invisible"></th>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF TABLE -->

                    <!-- MODAL -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="exampleModalLabel">
                                        UPLOAD SURAT PENGAJUAN SURVEI
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?= form_open_multipart('surat/upload');?>
                                    <input type="hidden" class="form-control-rounded form-control" name="npm" id="npm"
                                        value="<?= $user['n_id']; ?>">
                                    <div class=" form-group">
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
                                        <input type="hidden" class="form-control-rounded form-control" name="balasan"
                                            id="balasan" value="empty">
                                    </div>

                                    <div class="form-group">
                                        <label for="filename">Upload Surat Pengajuan</label>
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
                                        href="<?= base_url('surat/hapus/'.$get['id']) ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END OF DELETE MODAL -->


                <!-- End of Main Content -->
                </div>