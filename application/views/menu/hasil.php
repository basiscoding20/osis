<?php
$dataPoints = array();

foreach ($tb_kandidat as $kandidat) {
    $row = array();
    $cek = $this->db->get_where('users', ['nis' => $kandidat['nis']])->row_array();
    $row['label'] = $cek['nama'];
    $row['y'] = $kandidat['suara'];
    $dataPoints[] = $row;
}

// $dataPoints = array(
//     // foreach($tb_kandidat as $kandidat) :
//     array("label" => "Food + Drinks", "y" => 590),
//     array("label" => "Activities and Entertainments", "y" => 261),
//     array("label" => "Health and Fitness", "y" => 158),
//     array("label" => "Shopping & Misc", "y" => 72),
//     array("label" => "Transportation", "y" => 191),
//     array("label" => "Rent", "y" => 573),
//     array("label" => "Travel Insurance", "y" => 126)
//     // endforeach;
// );

?>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
                text: "e-Voting Ketua OSIS SMA PGRI 1 Kota Serang"
            },
            subtitles: [{

                text: "JL. Ciwaru Raya No.55 Serang, Cipare, Kec. Serang, Kota Serang Prov. Banten"
            }],
            data: [{
                type: "pie",
                showInLegend: "true",
                legendText: "{label}",
                indexLabelFontSize: 14,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "#,##0",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<div class="container mt-5">
    <div id="chartContainer" style="height: 650px; width: 100%;"></div>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <table border="1" align="center">
                <tr>
                    <?php foreach ($kelas as $kn) : ?>
                        <td class="p-2"><strong><?= $kn['nama_kelas']; ?></strong></td>
                        <?php $id_kelas = $kn['id_kelas']; ?>
                        <td>
                            <table>
                                <?php foreach ($tb_kandidat as $kdt) : ?>
                                    <tr>
                                        <?php $users = $this->db->get_where('users', ['nis' => $kdt['nis']])->row_array(); ?>
                                        <td><?= $users['nama']; ?></td>
                                        <td> : </td>

                                        <?php $id_kandidat = $kdt['no_kandidat']; ?>
                                        <?php $jumlahProbabilitasBerdasarkanKelas = $this->db->get_where('probabilitas', ['id_kelas' => $id_kelas])->num_rows(); ?>
                                        <?php $jumlahProbabilitasBerdasarkanKelasdanKandidat = $this->db->get_where('probabilitas', ['id_kelas' => $id_kelas, 'no_kandidat' => $id_kandidat])->num_rows(); ?>
                                        <?php if ($jumlahProbabilitasBerdasarkanKelas > 0 && $jumlahProbabilitasBerdasarkanKelasdanKandidat > 0) : ?>
                                            <?php $hasil  = ($jumlahProbabilitasBerdasarkanKelasdanKandidat / $jumlahProbabilitasBerdasarkanKelas) * 100;  ?>
                                        <?php else : ?>
                                            <?php $hasil = 0; ?>
                                        <?php endif; ?>
                                        <td><?= number_format((float) $hasil, 2, '.', ''); ?> %</td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </td>
                    <?php endforeach; ?>
                </tr>

            </table>
        </div>
    </div>
    <div class="container mt-5 text-center">
        <?php $datestring = '%Y';
        $time = time();
        $count = $this->db->query("SELECT MAX(suara) AS nilai  FROM kandidat")->result_array();
        $year = mdate($datestring, $time); ?>
        <?php foreach ($count as $data) : ?>
            <?php $pemenang = $this->db->get_where('kandidat', ['suara' => $data['nilai']])->row_array(); ?>

            <?php foreach ($tb_kandidat as $kandidat) : ?>
                <?php if ($data['nilai'] == $kandidat['suara']) : ?>
                    <?php $nama_pemenang = $this->db->get_where('users', ['nis' => $kandidat['nis']])->row_array(); ?>
                    <h3 class="mt-5">Selamat.... <strong><?= $nama_pemenang['nama']; ?></strong> atas terpilihnya menjadi ketua OSIS </h3>
                    <h3>SMA PGRI 1 Kota Serang Periode <?= $year; ?></h3>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
<script src="<?= base_url('assets/js/canvasjs.min.js') ?>"></script>