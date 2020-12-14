<table border="1" cellpadding="5px">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Angkatan</th>
        <th>Aksi</th>
    </tr>
    <?php
    include "koneksi.php";
    $hasil = mysqli_query(
        $konek,
        "select * from mahasiswa order by NIM asc"
    );
    $no = 0;
    foreach ($hasil as $key => $data) {

        $no++;
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['NIM']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['prodi']; ?></td>
            <td><?php echo $data['angkatan']; ?></td>
            <td>
                <button id="<?php echo $data['NIM']; ?>" class="edit"> Edit </button>
                <button id="<?php echo $data['NIM']; ?>" class="hapus"> Hapus </button>
            </td>
        </tr>
    <?php  } ?>
</table>
<script type='text/javascript'>
    $(document).on('click', '.hapus', function() {
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "hapus.php",
            data: {
                id: id
            },
            success: function() {
                $('#tampil_data').load("tampil.php");
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });
    $(document).on('click', '.edit', function() {
        var id = $(this).attr('id');
        var nim = document.getElementsByName('NIM')[0].value;
        var nama = document.getElementsByName('nama')[0].value;
        var prodi = document.getElementsByName('prodi')[0].value;
        var angkatan = document.getElementsByName('angkatan')[0].value;
        $.ajax({
            type: 'POST',
            url: "update.php",
            data: {
                id: id,
                nim: nim,
                nama: nama,
                prodi: prodi,
                angkatan: angkatan

            },
            success: function() {
                $('#tampil_data').load("tampil.php");
            },
            error: function(response) {
                console.log(response.responseText);
            }
        });
    });
</script>