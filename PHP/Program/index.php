<?php
require_once 'DPR.php';

function showData($anggotaDPR) {
    $idWidth = 3;
    $namaWidth = 4;
    $bidangWidth = 6;
    $partaiWidth = 6;

    foreach ($anggotaDPR as $member) {
        $idWidth = max($idWidth, strlen((string)$member->getId()));
        $namaWidth = max($namaWidth, strlen($member->getNama()));
        $bidangWidth = max($bidangWidth, strlen($member->getBidang()));
        $partaiWidth = max($partaiWidth, strlen($member->getPartai()));
    }

    echo "+-" . str_repeat("-", $idWidth) . "-+-" . str_repeat("-", $namaWidth) . "-+-" . str_repeat("-", $bidangWidth) . "-+-" . str_repeat("-", $partaiWidth) . "-+\n";
    printf("| %-" . $idWidth . "s | %-" . $namaWidth . "s | %-" . $bidangWidth . "s | %-" . $partaiWidth . "s |\n", "ID", "Nama", "Bidang", "Partai");
    echo "+-" . str_repeat("-", $idWidth) . "-+-" . str_repeat("-", $namaWidth) . "-+-" . str_repeat("-", $bidangWidth) . "-+-" . str_repeat("-", $partaiWidth) . "-+\n";

    foreach ($anggotaDPR as $member) {
        printf("| %-" . $idWidth . "d | %-" . $namaWidth . "s | %-" . $bidangWidth . "s | %-" . $partaiWidth . "s |\n", $member->getId(), $member->getNama(), $member->getBidang(), $member->getPartai());
    }

    echo "+-" . str_repeat("-", $idWidth) . "-+-" . str_repeat("-", $namaWidth) . "-+-" . str_repeat("-", $bidangWidth) . "-+-" . str_repeat("-", $partaiWidth) . "-+\n";
}

function addData(&$anggotaDPR) {
    $newId = readline("Masukkan ID: ");
    $newNama = readline("Masukkan nama: ");
    $newBidang = readline("Masukkan bidang: ");
    $newPartai = readline("Masukkan partai: ");
    $anggotaDPR[] = new DPR($newId, $newNama, $newBidang, $newPartai);
    echo "Data anggota berhasil ditambah.\n";
}

function modifyData(&$anggotaDPR) {
    $idToEdit = readline("Masukkan ID anggota yang ingin diubah: ");
    $newNama = readline("Masukkan nama baru: ");
    $newBidang = readline("Masukkan bidang baru: ");
    $newPartai = readline("Masukkan partai baru: ");
    foreach ($anggotaDPR as &$member) {
        if ($member->getId() == $idToEdit) {
            $member = new DPR($idToEdit, $newNama, $newBidang, $newPartai);
            echo "Data anggota berhasil diubah.\n";
            return;
        }
    }
    echo "ID anggota tidak ditemukan.\n";
}

function deleteData(&$anggotaDPR) {
    $idToDelete = readline("Masukkan ID anggota yang ingin dihapus: ");
    foreach ($anggotaDPR as $key => $member) {
        if ($member->getId() == $idToDelete) {
            unset($anggotaDPR[$key]);
            $anggotaDPR = array_values($anggotaDPR);
            echo "Data anggota berhasil dihapus.\n";
            return;
        }
    }
    echo "ID anggota tidak ditemukan.\n";
}

echo "Selamat datang di Program Manajemen Anggota DPR\n";

$anggotaDPR = [
    new DPR(1, "Budi", "Ketua", "Partai_Sosialis"),
    new DPR(2, "Andi", "Wakil_Ketua", "Partai_Buruh"),
    new DPR(3, "Tono", "Sekretaris", "Partai Konservatif"),
    new DPR(4, "Joni", "Bendahara", "Partai_Liberal")
];

showData($anggotaDPR);

$command = "";
while ($command != "CLOSE") {
    $command = strtoupper(readline("\nMasukkan perintah (SHOW, ADD, MODIFY, DELETE, CLOSE): "));
    switch ($command) {
        case "SHOW":
            showData($anggotaDPR);
            break;
        case "ADD":
            addData($anggotaDPR);
            break;
        case "MODIFY":
            modifyData($anggotaDPR);
            break;
        case "DELETE":
            deleteData($anggotaDPR);
            break;
        case "CLOSE":
            break;
        default:
            echo "Perintah tidak valid.\n";
    }
}

echo "Program ditutup. Terima kasih!\n";
?>