<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!-- Breadcrumb Menu -->
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Royalty</li>
            </ol>
        </nav>
    </div>

    <!-- Tombol tambah -->
    <div class="row">
        <div class="col text-center ">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/royalty/create" class="btn btn-lg btn-block btn-primary">Tambah Report Royalty</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Search bar + Alert panel -->
    <div class="row">
        <div class="col-5">
            <h3 class="mt-4 mb-4"><b>Daftar Royalty</b></h3>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Judul, Penulis, Total . . . " aria-describedby="button-addon2" name="keyword" autofocus>
                    <button class="btn btn-outline-secondary" type="submit" name="search">Cari / Reset</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <?php if (session()->getFlashdata('pesantambah')) : ?>
                <div class="alert alert-success text-center" role="alert">
                    <?= session()->getFlashdata('pesantambah'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesanhapus')) : ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= session()->getFlashdata('pesanhapus'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tabel Menu -->
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover mb-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Total</th>
                        <th scope="col">Lampiran</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col" class="mx-0 px-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($currentPage - 1)) ?>
                    <?php foreach ($royalty as $r) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $i++; ?></th>
                            <td class="text-break col-4"><?= $r['buku']; ?></td>
                            <td class="text-break"><?= $r['penulis']; ?></td>
                            <td>Rp <?= $r['total']; ?></td>
                            <td class="text-center"><?= (empty($r['lampiran'])) ? 'Tidak ada' : 'Ada'; ?></td>
                            <td class="text-center text-break"><?= $r['dibuat']; ?></td>
                            <td>
                                <div class="col text-center ">
                                    <a href="/royalty/<?= $r['slug']; ?>" class="btn btn-outline-info">Details</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('royalty', 'royalty_pagination') ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>