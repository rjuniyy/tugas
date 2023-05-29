<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Input Jadwal Sidang</h1>
    <!-- <div class="col-lg-4">
        <div class="widget-header">
            <div class="row">
                <div class="col-lg">
                    <h4>Jadwal Sidang</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput">Nama</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <div class="form-group mb-4">
                    <label for="formGroupExampleInput2">NPM</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                <div class="form-group mb-4">
                    <label for="namaDosen">Nama Dosen</label>
                    <select class="custom-select form-control-rounded mb-4" name="namaDosen" id="namaDosen">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal"" name=" tanggal">
                </div>
                <div class=" form-group mb-4">
                    <label for="formGroupExampleInput2">Ruangan</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                <div class="form-group mb-4">
                    <label for="namaDosen">Nama Dosen</label>
                    <select class="custom-select form-control-rounded mb-4" name="namaDosen" id="namaDosen">
                        <option selected>Ruangan</option>
                        <option value="1">B001</option>
                        <option value="2">B002</option>
                        <option value="3">B003</option>
                    </select>
                </div>


                <input type="submit" name="time" class="mb-4 btn btn-button-7">

            </form>
        </div>
    </div> -->
    <?= $this->session->flashdata('message')?>
    <div class="row">
        <div class="col-lg-10 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <?= form_open_multipart('jadwal/insert');?>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control-rounded form-control" id="nama"
                                placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="npm">NPM</label>
                            <input type="text" class="form-control-rounded form-control" id="npm" placeholder="NPM"
                                name="npm" value="<?= set_value('npm'); ?>">
                            <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPassword4">Tanggal Sidang</label>
                            <input type="date" class="form-control-rounded form-control" id="tanggal" name="tanggal">
                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPassword4">Hari Sidang</label>
                            <input type="text" class="form-control-rounded form-control" id="hari" name="hari"
                                placeholder="Hari Sidang">
                            <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="namapenguji1">Nama Penguji 1</label>
                            <select class="form-control-rounded form-control" name="namapenguji1" id="namapenguji1">
                                <option value="" selected>Pilih Nama Penguji...</option>
                                <?php foreach($namadosen as $nd): ?>
                                <option value="<?= $nd->nama ?>"><?= $nd->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="namapenguji2">Nama Penguji 2</label>
                            <select class="form-control-rounded form-control" name="namapenguji2" id="namapenguji2">
                                <option value="" selected>Pilih Nama Penguji...</option>
                                <?php foreach($namadosen as $nd): ?>
                                <option value="<?= $nd->nama ?>"><?= $nd->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="jamawal">Jam Awal</label>
                            <input type="time" class="form-control-rounded form-control" name="jamawal" id="jamawal"
                                value="<?= set_value('jamawal'); ?>">
                            <?= form_error('jamawal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="jamakhir">Jam Akhir</label>
                            <input type="time" class="form-control-rounded form-control" name="jamakhir" id="jamakhir"
                                value="<?= set_value('jamakhir'); ?>">
                            <?= form_error('jamakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-4">
                            <label for="namapembimbing">Nama Pembimbing 1</label>
                            <select class="form-control-rounded form-control" name="namapembimbing1"
                                id="namapembimbing1">
                                <option value="" selected>Pilih Nama Pembimbing...</option>
                                <?php foreach($namadosen as $nd): ?>
                                <option value="<?= $nd->nama ?>"><?= $nd->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="namapembimbing">Nama Pembimbing 2</label>
                            <select class="form-control-rounded form-control" name="namapembimbing2"
                                id="namapembimbing2">
                                <option value="" selected>Pilih Nama Pembimbing...</option>
                                <?php foreach($namadosen as $nd): ?>
                                <option value="<?= $nd->nama ?>"><?= $nd->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ruangan">Ruang Sidang</label>
                            <select class="form-control-rounded form-control" id="ruangan" name="ruangan">
                                <option value="" selected>Pilih Ruangan...</option>
                                <?php foreach($ruang as $r): ?>
                                <option value="<?= $r->ruangan ?>"><?= $r->ruangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-rounded bg-success">Submit</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>