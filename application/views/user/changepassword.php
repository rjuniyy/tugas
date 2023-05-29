<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('user/changepassword'); ?>" method="post">
        <div class="col-lg-3">
            <div class="form-group row">
                <label for="current" class="col-form-label">Current Password</label>
                <input type="password" class="form-control" id="current" name="current">
                <?= form_error('current', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="form-group row">
                <label for="newpassword1" class="col-form-label">New Password</label>
                <input type="password" class="form-control" id="newpassword1" name="newpassword1">
                <?= form_error('newpassword1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="newpassword2" class="col-form-label">Confirm Password</label>
                <input type="password" class="form-control" id="newpassword2" name="newpassword2">
                <?= form_error('newpassword2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row justify-content-end">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </div>

    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->