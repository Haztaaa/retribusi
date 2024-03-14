<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">DATA sektor</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data sektor</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Tambah sektor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card">
                    <h5 class="card-header">Tambah Data sektor</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <?php echo form_open_multipart('sektor/tambah', 'id="myForm"'); ?>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label"> Nama sektor</label>
                            <input id="inputText3" type="text" name="nama_sektor" class="form-control">
                            <?= form_error('nama_sektor', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tagihan</label>
                            <input id="inputText3" type="text" name="tagihan" class="form-control">
                            <?= form_error('tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="input-select">Pilih Penagih (Pegawai)</label>
                            <select class="form-control" id="input-select" name="user">
                                <option value="" selected disabled>-- Pilih Pegawai --</option>
                                <?php
                                foreach ($user as $data) : ?>
                                    <option value="<?= $data->id_user ?>"><?= $data->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>



                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('sektor') ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>