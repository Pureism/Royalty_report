<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">


    <!-- Breadcrumb Menu -->
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/royalty">Royalty</a></li>
                <li class="breadcrumb-item" aria-current="page">Tambah Royalty</li>
            </ol>
        </nav>
    </div>

    <!-- Form Menu -->
    <div class="row">
        <div class="col">
            <form class="col-9" action="/royalty/save" method="post" enctype="multipart/form-data">
                <?php csrf_field(); ?>
                <h3 class="mt-4 mb-4"><b>Tambah Royalty</b></h3>
                <div class="row mb-3">
                    <label for="id_order" class="col-sm-2 col-form-label">Order</label>
                    <div class="col-sm-10">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="id_order" name="id_order" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Order List
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="buku" class="col-sm-2 col-form-label">Buku</label>
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <input type="text" class="form-control <?= ($validation->hasError('buku')) ? 'is-invalid' : ''; ?>" id="buku" name="buku" placeholder="Judul buku" value="<?= old('buku'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('buku'); ?>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" placeholder="Penulis" value="<?= old('penulis'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('penulis'); ?>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="cetak" class="col-sm-2 col-form-label">Jumlah Cetak</label>
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <input type="number" class="form-control <?= ($validation->hasError('cetak')) ? 'is-invalid' : ''; ?>" id="cetak" name="cetak" placeholder="Jumlah cetak" value="<?= old('cetak'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('cetak'); ?>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col">
                        <ul class="list-group list-group-flush">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="number" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" placeholder="Harga Buku" value="<?= old('harga'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Detail</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" rows="3" id="deskripsi" name="deskripsi" placeholder="Catatan Royalty" value="<?= old('deskripsi'); ?>" autofocus><?= old('deskripsi'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" id="lampiran" name="lampiran">
                        <div class="invalid-feedback">
                            <?= $validation->getError('lampiran'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-3">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>