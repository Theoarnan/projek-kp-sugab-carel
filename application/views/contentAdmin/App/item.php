<?php
$no = 1;
if ($item->num_rows() > 0) {
    foreach ($item->result() as $k => $data) { ?>
        <tr data-id="<?= $data->id_barang ?>">
            <!-- <td><?= $no++ ?></td> -->
            <td><?= $data->barcode_barang ?></td>
            <td><?= $data->nama_barang ?></td>
            <td id="harga_item"><?= formatRupiah($data->harga_barang) ?></td>
            <td id="quantity" style="text-align:center;"><?= $data->quantity ?></td>
            <td id="tot-item"><?= $data->total_item ?></td>
            <td style="text-align:center;">
                <button id="hapus-item" data-itemid="<?= $data->item_id ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr>
        
       </tr>';
} ?>