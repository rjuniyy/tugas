<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>"
                        readonly>
                </div>
            </div>
            <?php if($this->session->userdata('role_id') == 2) { ?>
            <div class="form-group row">
                <label for="n_id" class="col-sm-2 col-form-label">NIDN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="n_id" name="n_id" value="<?= $user['n_id']; ?>">
                    <?= form_error('n_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <?php }if($this->session->userdata('role_id') == 3) { ?>

            <div class="form-group row">
                <label for="n_id" class="col-sm-2 col-form-label">NPM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="n_id" name="n_id" value="<?= $user['n_id']; ?>"
                        <?php if($user['editable']==0){ ?> readonly<?php } ?>>
                </div>
                <?= form_error('n_id', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <?php } ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/').$user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image" name>Choose file</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->