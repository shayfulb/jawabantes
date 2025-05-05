<?php
class Konversi
{
    private $angka;
    private $bilangan = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN");
    private $tingkat = array("", "RIBU", "JUTA", "MILYAR");

    public function __construct($angka)
    {
        $this->angka = $angka;
    }

    public function ubah()
    {
        if ($this->angka == 0) return "NOL";

        $hasil = "";
        $i = 0;
        $number = $this->angka;

        while ($number > 0) {
            $sisa = $number % 1000;
            if ($sisa != 0) {
                $hasil = $this->ubahRatusan($sisa) . " " . $this->tingkat[$i] . " " . $hasil;
            }
            $number = floor($number / 1000);
            $i++;
        }

        return trim(preg_replace('/\s+/', ' ', $hasil));
    }

    private function ubahRatusan($angka)
    {
        $hasil = "";

        $ratus = floor($angka / 100);
        $angka = $angka % 100;

        if ($ratus > 0) {
            if ($ratus == 1) {
                $hasil .= "SERATUS ";
            } else {
                $hasil .= $this->bilangan[$ratus] . " RATUS ";
            }
        }

        if ($angka > 0) {
            if ($angka < 10) {
                $hasil .= $this->bilangan[$angka];
            } else if ($angka < 20) {
                if ($angka == 10) {
                    $hasil .= "SEPULUH";
                } else if ($angka == 11) {
                    $hasil .= "SEBELAS";
                } else {
                    $hasil .= $this->bilangan[$angka - 10] . " BELAS";
                }
            } else {
                $puluh = floor($angka / 10);
                $satuan = $angka % 10;
                $hasil .= $this->bilangan[$puluh] . " PULUH ";
                if ($satuan > 0) {
                    $hasil .= $this->bilangan[$satuan];
                }
            }
        }

        return trim($hasil);
    }
}
?>