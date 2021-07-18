<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/royalty">Royalty</a></li>
                <li class="breadcrumb-item" aria-current="page">Detail Royalty</li>
            </ol>
        </nav>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2><b>Detail Reports <?= $royalty['slug']; ?>_<?= $royalty['id_royalty']; ?></b></h2>
                            <small class="text-muted align-middle">Updated <?= $diubah; ?></small>
                        </div>
                        <div class="col  text-end">
                            <br>
                            <small class="text-muted">Created <?= $royalty['dibuat']; ?></small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <h4>Judul Buku</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted">A second item</p>
                        </li>
                        <h4>Penulis</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted">A second item</p>
                        </li>
                        <h4>Jumlah Cetak</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted">A second item</p>
                        </li>
                        <h4>Total Royalty</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted">A second item</p>
                        </li>
                        <h4>Catatan</h4>
                        <li class="list-group-item mb-3"><?= $royalty['deskripsi']; ?></li>
                        <h4>Lampiran</h4>
                        <li class="list-group-item"><img src="/img/<?= $royalty['lampiran']; ?>.jpg" alt=""></li>
                        <li class="list-group-item"></li>
                    </ul>
                </div>
                <div class="card-body text-end">
                    <a href="#" class="btn btn-warning">Ubah</a>
                    <a href="#" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>