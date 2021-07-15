<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-4 mb-4">Daftar Report Royalty</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="col-6 text-center">Detail Report</th>
                        <th scope="col">Pengirim</th>
                        <th scope="col">Lampiran</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col" class="mx-0 px-0"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo veritatis delectus ipsam doloremque nihil possimus debitis officia sed, repudiandae aliquid aliquam voluptatum nam aut magni quisquam. Hic culpa nulla ab.</td>
                        <td>Otto</td>
                        <td>Tidak ada</td>
                        <td>15 Juli 2021</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary">Ubah</button>
                                <button type="button" class="btn btn-outline-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>