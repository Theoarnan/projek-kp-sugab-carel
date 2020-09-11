<?php
                        $no = 1;
                        foreach ($barangs as $barang) {
                        ?>
                            <tr>
                                <td style="text-align:center;"><?= $no++ ?>.</td>
                                <td style="text-align:center;"><?= $barang->nama_barang ?></td>
                                <td style="text-align:center;"><?= $barang->kd_kategori ?></td>
                                <td style="text-align:center;"><?= $barang->isbn ?></td>
                                <td style="text-align:center;"><?= $barang->halaman ?></td>
                                <td style="text-align:center;"><?= $barang->status_display ?></td>
                            </tr>
                        <?php
                        }
                        ?>