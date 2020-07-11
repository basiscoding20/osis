<style>
    .canvasjs-chart-toolbar {
        visibility: hidden;
    }
</style>
<?php
$dataPoints = array();

foreach ($tb_kandidat as $kandidat) {
    $row = array();
    $cek = $this->db->get_where('users', ['nis' => $kandidat['nis']])->row_array();
    $row['label'] = $cek['nama'];
    $row['y'] = $kandidat['suara'];
    $dataPoints[] = $row;
}

?>
<!-- <div class="container">
    <a href="<?= base_url('home/') ?>" class="btn btn-warning btn-lg float-right mt-5">Hasil Sementara</a>

</div> -->
<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
                text: "E-voting Ketua OSIS SMA PGRI 1 Kota Serang"
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
        <div class="col-lg-12 mt-3">
            <table align="center" border="1" class="mt-5 mb-4">
                <tr>
                    <?php foreach ($tb_kandidat as $kan) : ?>
                        <?php $title = $this->db->get_where('users', ['nis' => $kan['nis']])->row_array(); ?>
                        <td class="p-2"><strong><?= $title['nama']; ?></strong> : <?= $kan['suara']; ?> suara</td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
    </div>
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

                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
<script src="<?= base_url('assets/js/canvasjs.min.js') ?>"></script>