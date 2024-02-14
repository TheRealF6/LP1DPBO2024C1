<html>
<head>
    <title>Program Manajemen Anggota DPR</title>
</head>
<body>
    <h1>Program Manajemen Anggota DPR</h1>
    <p>Selamat datang di Program Manajemen Anggota DPR</p>
    <?php
    // require_once 'DPR.php';

    function showData($anggotaDPR) {
        $idWidth = 2;
        $namaWidth = 4;
        $bidangWidth = 6;
        $partaiWidth = 6;
        $fotoWidth = 5;

        foreach ($anggotaDPR as $member) {
            $idWidth = max($idWidth, strlen((string)$member->getId()));
            $namaWidth = max($namaWidth, strlen($member->getNama()));
            $bidangWidth = max($bidangWidth, strlen($member->getBidang()));
            $partaiWidth = max($partaiWidth, strlen($member->getPartai()));
            // $fotoWidth = max($fotoWidth, strlen($member->getFoto()));
        }

        echo "<table border='1'>";
        echo "<tr>";
        printf("<th>%-" . $idWidth . "s</th>", "ID");
        printf("<th>%-" . $namaWidth . "s</th>", "Nama");
        printf("<th>%-" . $bidangWidth . "s</th>", "Bidang");
        printf("<th>%-" . $partaiWidth . "s</th>", "Partai");
        printf("<th>%-" . $fotoWidth . "s</th>", "Foto");
        echo "</tr>";

        foreach ($anggotaDPR as $member) {
            echo "<tr>";
            printf("<td>%-" . $idWidth . "d</td>", $member->getId());
            printf("<td>%-" . $namaWidth . "s</td>", $member->getNama());
            printf("<td>%-" . $bidangWidth . "s</td>", $member->getBidang());
            printf("<td>%-" . $partaiWidth . "s</td>", $member->getPartai());
            // printf("<td><img src='%-" . $fotoWidth . "s' width='100' height='100'></td>", $member->getFoto());
            echo "</tr>";
        }

        echo "</table>";
    }

    function addData(&$anggotaDPR) {
        $newId = $_POST['id'];
        $newNama = $_POST['nama'];
        $newBidang = $_POST['bidang'];
        $newPartai = $_POST['partai'];
        $newFoto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($newFoto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        $anggotaDPR[] = new DPR($newId, $newNama, $newBidang, $newPartai, $newFoto);
        echo "Data anggota berhasil ditambah.<br>";
    }

    function modifyData(&$anggotaDPR) {
        $idToEdit = $_POST['id'];
        $newNama = $_POST['nama'];
        $newBidang = $_POST['bidang'];
        $newPartai = $_POST['partai'];
        $newFoto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($newFoto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        foreach ($anggotaDPR as &$member) {
            if ($member->getId() == $idToEdit) {
                $member = new DPR($idToEdit, $newNama, $newBidang, $newPartai, $newFoto);
                echo "Data anggota berhasil diubah.<br>";
                return;
            }
        }
        echo "ID anggota tidak ditemukan.<br>";
    }

    function deleteData(&$anggotaDPR) {
        $idToDelete = $_POST['id'];
        foreach ($anggotaDPR as $key => $member) {
            if ($member->getId() == $idToDelete) {
                $fotoToDelete = $member->getFoto();
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($fotoToDelete);
                unlink($target_file);
                unset($anggotaDPR[$key]);
                $anggotaDPR = array_values($anggotaDPR);
                echo "Data anggota berhasil dihapus.<br>";
                return;
            }
        }
        echo "ID anggota tidak ditemukan.<br>";
    }

    $anggotaDPR = [
        new DPR(1, "Budi", "Ketua", "Partai_Sosialis", "budi.jpg"),
        new DPR(2, "Andi", "Wakil_Ketua", "Partai_Buruh", "andi.jpg"),
        new DPR(3, "Tono", "Sekretaris", "Partai Konservatif", "tono.jpg"),
        new DPR(4, "Joni", "Bendahara", "Partai_Liberal", "joni.jpg")
    ];

    showData($anggotaDPR);

    $command = "";
    if (isset($_POST['command'])) {
        $command = ($_POST['command']);
    }
    switch ($command) {
        case "ADD":
            addData($anggotaDPR);
            break;
        case "MODIFY":
            modifyData($anggotaDPR);
            break;
        case "DELETE":
            deleteData($anggotaDPR);
            break;
        default:
            echo "Perintah tidak valid.<br>";
    }
    ?>
    <!-- <form method="post" action="index.php" enctype="multipart/form-data">
        <p>Pilih perintah:</p>
        <input type="radio" name="command" value="ADD"> ADD
        <input type="radio" name="command" value="MODIFY"> MODIFY
        <input type="radio" name="command" value="DELETE"> DELETE
        <br>
        <p>Masukkan ID:</p>
        <input type="number" name="id">
        <p>Masukkan nama:</p>
        <input type="text" name="nama">
        <p>Masukkan bidang:</p>
        <input type="text" name="bidang">
        <p>Masukkan partai:</p>
        <input type="text" name="partai">
        <p>Masukkan foto:</p>
        <input type="file" name="foto">
        <br>
        <input type="submit" value="Submit">
    </form> -->
</body>
</html>
