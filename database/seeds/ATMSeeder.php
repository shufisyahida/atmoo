<?php

use Illuminate\Database\Seeder;

class ATMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Margonda 1','alamat' => 'Jl. Margonda Raya,Pancoran MAS,Kota Depok, Jawa Barat 16431','lat' => '-6.390869','lng' => '106.825202','status' => '1']);
        DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Gedung H FPsi UI','alamat' => 'Gedung H Fakultas Psikologi Universitas Indonesia Depok, Jawa Barat, Indonesia','lat' => '-6.363603','lng' => '106.831157','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Margonda 2','alamat' => 'Jl. Margonda Raya No. 2, Depok, Jawa Barat, Indonesia','lat' => '-6.366928','lng' => '106.834937','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'ITC Depok','alamat' => 'Jl. MARGONDA RAYA No. 56, Depok, Jawa Barat, Indonesia','lat' => '-6.392591','lng' => '106.822996','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Bank Mandiri Kelapa Dua','alamat' => 'Jl. Raya Akses UI No. 88 C, Kelapa Dua,Tugu, Cimanggis,Tugu,Cimanggis, Kota Depok, Jawa Barat 16951','lat' => '-6.354763','lng' => '106.845605','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Mini Market Brimob Kelapa Dua','alamat' => 'Jl. Akses UI,Kepala Dua,Kota Depok, Jawa Barat 16451','lat' => '-6.354978','lng' => '106.848641','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Indomaret Kober','alamat' => 'Jl. Margonda Raya No.345, Beji, Kota Depok, Jawa Barat 16424','lat' => '-6.364356','lng' => '106.833725','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Gedung Pascasarjana FEUI','alamat' => 'Gedung Pascasarjana Fakultas Ekonomi,Jl. Lingkar Kampus raya,Kukusan,Beji, Kota Depok, Jawa Barat 16424','lat' => '-6.361478','lng' => '106.825146','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '4','nama_atm' => 'Kampus FEUI','alamat' => 'Gedung Baru Pasca Sarjana Fakultas Ekonomi,Kampus Universitas Indonesia, Jl. Prof. Dr. Sumitro Djoyohadikusumo,UI - Fakultas Ekonomi dan Bisnis,Jawa Barat','lat' => '-6.361284','lng' => '106.825337','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '7','nama_atm' => 'Kampus FEUI','alamat' => 'Gedung Pasca Sarjana Fakultas Ekonomi Universitas Indonesia','lat' => '-6.361403','lng' => '106.825472','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '38','nama_atm' => 'Kampus FEUI','alamat' => 'Gedung Pasca Sarjana Fakultas Ekonomi Universitas Indonesia','lat' => '-6.361464','lng' => '106.825534','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '20','nama_atm' => 'Kampus FEUI','alamat' => 'Jl. Lingkar Kampus UI,Gedung B Fakultas Ekonomi Universitas Indonesia,Jawa Barat 16424','lat' => '-6.361660','lng' => '106.825613','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '81','nama_atm' => 'Engineering Center','alamat' => 'Engineering Center Fakultas Teknik UI,Depok,Jawa Barat 16431','lat' => '-6.362056','lng' => '106.824867','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '81','nama_atm' => 'Kampus FEUI','alamat' => 'Fakultas Ekonomi UI, Kampus UI Depok,Jl. Yun Hap,Jawa Barat 16424','lat' => '-6.360202','lng' => '106.826126','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Kampus FEUI','alamat' => 'Fakultas Ekonomi UI, JL Lingkar Kampus Raya, Komplek Kampus UI,16424','lat' => '-6.360192','lng' => '106.826574','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Engineering Center','alamat' => 'Engineering Center Fakultas Teknik UI,Depok,Jawa Barat 16431','lat' => '-6.362056','lng' => '106.824867','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '81','nama_atm' => 'Kampus FTUI','alamat' => 'Fakultas Teknik, Kampus UI,Jawa Barat 16431','lat' => '-6.361955','lng' => '106.824435','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'Kampus FEUI','alamat' => 'Gedung Pascasarjana Fakultas Ekonomi,Jl. Lingkar Kampus raya,Jawa Barat 16424','lat' => '-6.361475','lng' => '106.825139','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '4','nama_atm' => 'Kampus C FISIP UI','alamat' => 'Gedung C Fisip UI Depok, Depok, Jawa Barat','lat' => '-6.362143','lng' => '106.829281','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Kampus FISIP UI','alamat' => 'Kampus FISIP UI,Beji,Jawa Barat 16424','lat' => '-6.363117','lng' => '106.829057','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Kampus FPsi UI','alamat' => 'Fakultas Psikologi Universitas Indonesia (UI), JL Lingkar Kampus Raya, Kampus Baru UI,16424','lat' => '-6.363527','lng' => '106.831068','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '9','nama_atm' => 'Kampus FPsi UI','alamat' => 'Fakultas Psikologi Universitas Indonesia (UI), JL Lingkar Kampus Raya, Kampus Baru UI,16424','lat' => '-6.363711','lng' => '106.831258','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Perpustakaan Pusat UI','alamat' => 'Perpustakaan Pusat Universitas Indonesia,Jalan Lingkar Ui,Kota Depok, Jawa Barat 16424','lat' => '-6.365582','lng' => '106.829750','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Kampus FHUI','alamat' => 'Kampus Baru UI Fakultas Hukum UI, JL Lingkar Kampus Raya,16424','lat' => '-6.363805','lng' => '106.827868','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Kampus FKM UI','alamat' => 'Fakultas Kesehatan Masyarakat Universitas Indonesia (UI), JL Lingkar Kampus Raya, Komplek Kampus UI,16424','lat' => '-6.370169','lng' => '106.829711','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '20','nama_atm' => 'Departemen Fisika MIPA UI','alamat' => 'Fakultas MIPA Universitas Indonesia (UI), JL Lingkar Kampus Raya, Kampus Baru UI,16424','lat' => '-6.369497','lng' => '106.826997','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '18','nama_atm' => 'Kampus FMIPA UI','alamat' => 'Fakultas MIPA Universitas Indonesia (UI), JL Lingkar Kampus Raya, Kampus Baru UI,16424','lat' => '-6.369861','lng' => '106.826855','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '82','nama_atm' => 'Alfamart Margonda','alamat' => 'Jl. Margonda Raya No.515 ,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.361594','lng' => '106.833243','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Alfamart Margonda','alamat' => 'Jl. Margonda Raya No.515 ,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.361594','lng' => '106.833243','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '58','nama_atm' => 'ATM Center Margo City','alamat' => 'Jl. Margonda Raya No.358,Beji,Kota Depok, Jawa Barat 16432','lat' => '-6.360824','lng' => '106.833390','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '4','nama_atm' => 'Alfamidi Margonda','alamat' => 'Jl. Margonda Raya No.470,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.362986','lng' => '106.833779','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'margonda 3','alamat' => 'Kantor Cabang Pembantu Depok Pondok Cina, JL. Raya Margonda, No. 345 D','lat' => '-6.362823','lng' => '106.833894','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '20','nama_atm' => 'Margonda 4','alamat' => 'Jl. Margonda Raya No.290,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.363036','lng' => '106.834052','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '13','nama_atm' => 'Margonda Residence','alamat' => 'No. 224 C,Jl. Margonda Raya,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.364136','lng' => '106.833975','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '25','nama_atm' => 'Margonda 5','alamat' => 'Jalan Margonda Raya No. 485,Beji,Depok,Jawa Barat 16423','lat' => '-6.364148','lng' => '106.833498','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '58','nama_atm' => 'Margonda 6','alamat' => 'Jl. Margonda Raya,Beji,Kota Depok, Jawa Barat 16431','lat' => '-6.364399','lng' => '106.833467','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '14','nama_atm' => 'Margonda 7','alamat' => 'JL Margonda Raya, No. 389 B, Pondok Cina,16424','lat' => '-6.364505','lng' => '106.834162','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '23','nama_atm' => 'Shell Margonda','alamat' => 'Jalan Margonda Raya No.469 Beji, Kota Depok, Jawa Barat 16424','lat' => '-6.365061','lng' => '106833653','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '4','nama_atm' => 'SPBU Coco Margonda','alamat' => 'Jl. Margonda Raya No. 346 Rt. 01/02,Spbu Coco 31-16401,Indonesia 16423','lat' => '-6.364803','lng' => '106.834011','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '81','nama_atm' => 'RSU Bunda Margonda','alamat' => 'RSU Bunda Margonda No. 28,Jl. Margonda Raya,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.365318','lng' => '106.834272','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'RSU Bunda Margonda','alamat' => 'RSU Bunda Margonda No. 28,Jl. Margonda Raya,Beji,Kota Depok, Jawa Barat 16425','lat' => '-6.365383','lng' => '106.834631','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'RSU Bunda Margonda','alamat' => 'RSU Bunda Margonda No. 28,Jl. Margonda Raya,Beji,Kota Depok, Jawa Barat 16426','lat' => '-6.365378','lng' => '106.834693','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '2','nama_atm' => 'Alfamidi Margonda 2','alamat' => 'Alfamidi,Jl. Margonda Raya No.24,Kota Depok, Jawa Barat 16424','lat' => '-6.365931','lng' => '106.834124','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '2','nama_atm' => 'Bank BRI (samping Martabak Kubang)','alamat' => 'Jl. Margonda Raya,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.366462','lng' => '106.834127','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'RM Simpang Raya','alamat' => 'Rumah Makan Simpang Raya, JL Margonda Raya, No. 19','lat' => '-6.366077','lng' => '106.834596','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '9','nama_atm' => 'Bank BTN Margonda','alamat' => 'Jl. Margonda Raya,Beji,Kota Depok, Jawa Barat 16424','lat' => '-6.366639','lng' => '106834136','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'Alfamart Kober','alamat' => 'Jl. Margonda Raya No.7-8,Beji,Kota Depok, Jawa Barat 16425','lat' => '-6.366814','lng' => '106.834048','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'ATM Center Margo City','alamat' => 'Jl. Margonda Raya No.358,Beji,Kota Depok, Jawa Barat 16432','lat' => '-6.360824','lng' => '106.833390','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '2','nama_atm' => 'ATM Center Margo City','alamat' => 'Jl. Margonda Raya No.358,Beji,Kota Depok, Jawa Barat 16433','lat' => '-6.360824','lng' => '106.833390','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'ATM Center Margo City','alamat' => 'Jl. Margonda Raya No.358,Beji,Kota Depok, Jawa Barat 16434','lat' => '-6.360824','lng' => '106.833390','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '12','nama_atm' => 'ATM Center Margo City','alamat' => 'Jl. Margonda Raya No.358,Beji,Kota Depok, Jawa Barat 16435','lat' => '-6.360824','lng' => '106.833390','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '81','nama_atm' => 'ATM Center Margo City','alamat' => 'Jl. Margonda Raya No.358,Beji,Kota Depok, Jawa Barat 16436','lat' => '-6.360824','lng' => '106.833390','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '3','nama_atm' => 'ATM Center Depok Town Square','alamat' => 'Depok Town Square, Blok GE, JL. Margonda,Kemirimuka,Beji,Kota Depok 16424','lat' => '-6.372485','lng' => '106.832524','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '1','nama_atm' => 'ATM Center Depok Town Square','alamat' => 'Depok Town Square, Blok GE, JL. Margonda,Kemirimuka,Beji,Kota Depok 16425','lat' => '-6.372485','lng' => '106.832524','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '2','nama_atm' => 'ATM Center Depok Town Square','alamat' => 'Depok Town Square, Blok GE, JL. Margonda,Kemirimuka,Beji,Kota Depok 16426','lat' => '-6.372485','lng' => '106.832524','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '4','nama_atm' => 'ATM Center Depok Town Square','alamat' => 'Depok Town Square, Blok GE, JL. Margonda,Kemirimuka,Beji,Kota Depok 16427','lat' => '-6.372485','lng' => '106.832524','status' => '1']);
    	DB::table('atm')->insert(['id_bank' => '5','nama_atm' => 'ATM Center Depok Town Square','alamat' => 'Depok Town Square, Blok GE, JL. Margonda,Kemirimuka,Beji,Kota Depok 16428','lat' => '-6.372485','lng' => '106.832524','status' => '1']);







    }	
}
