<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">DATA RETRIBUSI</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Retribusi</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Tambah Setoran</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card">
                    <h5 class="card-header">Tambah Data Retribusi (Lunas)</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <?php echo form_open_multipart('retribusilunas/tambah', 'id="myForm"'); ?>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label"> Nama Pedagang</label>
                            <select class="form-control select2" id="pedagang" name="pedagang">
                                <option value="" selected disabled>-- Pilih Pedagang --</option>
                                <?php
                                foreach ($pedagang as $data) : ?>
                                    <option value="<?= $data->id_pedagang ?>"><?= $data->nama_pedagang ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('nama_pedagang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Alamat</label>
                            <input id="alamat" type="text" name="alamat" class="form-control" readonly>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">No Lapak</label>
                            <input id="no_lapak" type="text" name="no_lapak" class="form-control" readonly>
                            <?= form_error('no_lapak', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Sektor</label>
                            <input id="sektor" type="text" name="sektor" class="form-control" readonly>
                            <?= form_error('sektor', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Tanggal pembayaran</label>
                            <input id="inputText3" type="date" name="tgl_pembayaran" class="form-control">
                            <?= form_error('tgl_pembayaran', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Jumlah</label>
                            <input id="inputText3" type="text" name="jumlah" class="form-control">
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('retribusilunas') ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>