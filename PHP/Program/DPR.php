<?php
class DPR {
    private $id;
    private $nama;
    private $bidang;
    private $partai;

    public function __construct($id, $nama, $bidang, $partai) {
        $this->id = $id;
        $this->nama = $nama;
        $this->bidang = $bidang;
        $this->partai = $partai;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($newId) {
        $this->id = $newId;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama($newNama) {
        $this->nama = $newNama;
    }

    public function getBidang() {
        return $this->bidang;
    }

    public function setBidang($newBidang) {
        $this->bidang = $newBidang;
    }

    public function getPartai() {
        return $this->partai;
    }

    public function setPartai($newPartai) {
        $this->partai = $newPartai;
    }
}
?>
