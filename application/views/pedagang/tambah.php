<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">DATA PEDAGANG</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Pedagang</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Tambah Pedagang</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card">
                    <h5 class="card-header">Tambah Data Pedagang</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <?php echo form_open_multipart('pedagang/tambah', 'id="myForm"'); ?>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label"> Nama Pedagang</label>
                            <input id="inputText3" type="text" name="nama_pedagang" class="form-control">
                            <?= form_error('nama_pedagang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Nik</label>
                            <input id="inputText3" type="text" name="nik" class="form-control" maxlength="16" onkeypress="return hanyaAngka(event)" placeholder="Nik (16 Angka)">
                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Rekening</label>
                            <input id="inputText3" type="text" name="no_rekening" class="form-control">
                            <?= form_error('no_rekening', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tanggal Lahir</label>
                            <input id="inputText3" type="date" name="tgl_lahir" class="form-control">
                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Alamat</label>
                            <input id="inputText3" type="text" name="alamat" class="form-control">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Lapak</label>
                            <input id="inputText3" type="text" name="no_lapak" class="form-control">
                            <?= form_error('no_lapak', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="input-select">Sektor</label>
                            <select class="form-control" id="input-select" name="sektor">
                                <option value="" selected disabled>-- Pilih Sektor --</option>
                                <?php
                                foreach ($sektor as $data) : ?>
                                    <option value="<?= $data->id_sektor ?>"><?= $data->nama_sektor ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('pedagang') ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>