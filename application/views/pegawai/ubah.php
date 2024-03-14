<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">DATA PEGAWAI</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data pegawai</a></li>

                                <li class="breadcrumb-item active" aria-current="page">ubah pegawai</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card">
                    <h5 class="card-header">Ubah Data pegawai</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <?php echo form_open_multipart('pegawai/ubah/' . $pegawai['id_user'], 'id="myForm"'); ?>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label"> Nama pegawai</label>
                            <input id="inputText3" type="text" name="nama_pegawai" class="form-control" value="<?= $pegawai['nama'] ?>">
                            <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Nama Pengguna</label>
                            <input id="inputText3" type="text" name="nama_pengguna" class="form-control" value="<?= $pegawai['username'] ?>">
                            <?= form_error('nama_pengguna', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Kata Sandi</label>
                            <input id="inputText3" type="password" name="kata_sandi" class="form-control" value="<?= $pegawai['password'] ?>">
                            <?= form_error('kata_sandi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Nomor Hp</label>
                            <input id="inputText3" type="text" name="no_hp" class="form-control" value="<?= $pegawai['no_hp'] ?>">
                            <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Alamat</label>
                            <input id="inputText3" type="text" name="alamat" class="form-control" value="<?= $pegawai['alamat'] ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Jabatan</label>
                            <select class="form-control selectric" id="level" name="level" required>
                                <option value="" selected disabled>Pilih</option>
                                <option value="Pegawai">Penagih</option>
                                <option value="Monitor">Monitoring</option>
                            </select>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="<?= base_url('pegawai') ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>