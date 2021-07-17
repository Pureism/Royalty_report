<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <form class="col-6 my-5" action="/royalty/save" method="post">
                <?php csrf_field(); ?>
                <h3 class="mt-4 mb-4"><b>Tambah Royalty</b></h3>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Detail</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Catatan Royalty" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="total" class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="number" class="form-control" id="total" name="total" placeholder="Total Royalty">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="lampiran" name="lampiran" placeholder="Catatan Royalty">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3 class="mt-4 mb-4"><b>Daftar Royalty</b></h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Detail Report</th>
                        <th scope="col">Total</th>
                        <th scope="col">Lampiran</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col" class="mx-0 px-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($royalty as $r) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $i++; ?></th>
                            <td class="text-break col-6"><?= $r['deskripsi']; ?></td>
                            <td>Rp <?= $r['total']; ?></td>
                            <td class="text-center">Tidak ada</td>
                            <td class="text-center text-break"><?= $r['dibuat']; ?></td>
                            <td>
                                <div class="col text-center">
                                    <button type="button" class="btn btn-outline-info">Details</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>