<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2>Barcode Barang</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barangs->barcode_barang, $generator::TYPE_CODE_128)) . '" style="width: 230px; height: 50px;">';
                        ?>
                        <br>
                        <?= $barangs->barcode_barang ?>
                    </div>
                    <div class="card-footer">
                        <a href="<?= site_url('Barang/printBarcode/' . $barangs->id_barang) ?>" target="_blank" class="btn btn-lg btn-danger"><i class="fas fa-print"></i>
                            Print
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>