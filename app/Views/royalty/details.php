<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!-- Breadcrumb Menu -->
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/royalty">Royalty</a></li>
                <li class="breadcrumb-item" aria-current="page">Detail Royalty</li>
            </ol>
        </nav>
    </div>

    <!-- Card Menu -->
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2><b>Detail Reports <?= $royalty['slug']; ?></b></h2>
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
                            <p class="text-muted h4"><b><i>" <?= $royalty['buku']; ?> "</i></b></p>
                        </li>
                        <h4>Penulis</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted h4"><?= $royalty['penulis']; ?></p>
                        </li>
                        <h4>Harga Buku</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted">Rp <?= $royalty['harga']; ?></p>
                        </li>
                        <h4>Jumlah Cetak</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted"><?= $royalty['cetak']; ?> buah</p>
                        </li>
                        <h4>Total Royalty</h4>
                        <li class="list-group-item mb-3">
                            <p class="text-muted h4">Rp <?= $royalty['total']; ?></p>
                        </li>
                        <h4>Catatan</h4>
                        <li class="list-group-item mb-3"><?= $royalty['deskripsi']; ?></li>
                        <h4>Lampiran</h4>
                        <li class="list-group-item">
                            <?= (empty($royalty['lampiran'])) ? 'Tidak ada' : ''; ?>
                            <?php if (!empty($royalty['lampiran'])) : ?>
                                <table>
                                    <tr>
                                        <td>

                                            <img src="/image/<?= $royalty['lampiran']; ?>" class="lampiran" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <p><?= $royalty['lampiran']; ?></p>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                        </li>
                        <li class="list-group-item"></li>
                    </ul>
                </div>
                <div class="card-body text-end">
                    <a href="/royalty/edit/<?= $royalty['slug']; ?>" class="btn btn-warning">Ubah</a>
                    <form action="/royalty/<?= $royalty['id_royalty']; ?>" method="POST" class="d-inline" onclick="return confirm('Apakah anda yakin ?')">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>