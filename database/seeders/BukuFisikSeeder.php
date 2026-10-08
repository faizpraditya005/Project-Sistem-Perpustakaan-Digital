<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BukuFisik;

class BukuFisikSeeder extends Seeder
{
    public function run(): void
    {
        $buku = [
            ['kode_buku' => 'BKD-001', 'judul' => 'Manajemen Sumber Daya Manusia', 'penulis' => 'Raymond A.Noe', 'kategori' => 'Edisi 6 (Buku 1)', 'tahun' => 2013, 'stok' => 1],
            ['kode_buku' => 'BKD-002', 'judul' => 'Manajemen Sumber Daya Manusia', 'penulis' => 'Raymond A.Noe', 'kategori' => 'Edisi 6 (Buku 2)', 'tahun' => 2013, 'stok' => 1],
            ['kode_buku' => 'BKD-003', 'judul' => 'Operation Management 8e : Procceses and Value Chains', 'penulis' => 'Lee J. Krajewski', 'kategori' => 'Umum', 'tahun' => 2007, 'stok' => 1],
            ['kode_buku' => 'BKD-004', 'judul' => 'Management Information System : Managing The Digital Firm', 'penulis' => 'Kenneth C. Laudon', 'kategori' => 'Umum', 'tahun' => 2010, 'stok' => 1],
            ['kode_buku' => 'BKD-005', 'judul' => 'Management Accounting', 'penulis' => 'Don R Hansen', 'kategori' => 'Umum', 'tahun' => 2005, 'stok' => 1],
            ['kode_buku' => 'BKD-006', 'judul' => 'Organizational Behaviour', 'penulis' => 'Stephen P.Robbins', 'kategori' => 'Edisi 13', 'tahun' => 2009, 'stok' => 2],
            ['kode_buku' => 'BKD-007', 'judul' => 'Beyond Positivism : Economic Methodology in the Twentieth Century', 'penulis' => 'Bruce J.Caldwell', 'kategori' => 'Umum', 'tahun' => 1982, 'stok' => 1],
            ['kode_buku' => 'BKD-008', 'judul' => 'Perilaku Organisasi : Organizational Behaviour', 'penulis' => 'Stephen P.Robbins', 'kategori' => 'Edisi 12 (Buku 1)', 'tahun' => 2008, 'stok' => 1],
            ['kode_buku' => 'BKD-009', 'judul' => 'Perilaku Organisasi : Organizational Behaviour', 'penulis' => 'Stephen P.Robbins', 'kategori' => 'Edisi 12 (Buku 2)', 'tahun' => 2008, 'stok' => 1],
            ['kode_buku' => 'BKD-010', 'judul' => 'Gerakan Islam Simbolik', 'penulis' => 'Al-Zastrouw Ng', 'kategori' => 'Umum', 'tahun' => 2006, 'stok' => 1],
            ['kode_buku' => 'BKD-011', 'judul' => 'Sistem Politik Indonesia', 'penulis' => 'Arbi Sanit', 'kategori' => 'Umum', 'tahun' => 2012, 'stok' => 1],
            ['kode_buku' => 'BKD-012', 'judul' => 'Kebun Ilmu Taman Semangat', 'penulis' => 'Tetty Suharti', 'kategori' => 'Seri Budi Pekerti', 'tahun' => 1996, 'stok' => 1],
            ['kode_buku' => 'BKD-013', 'judul' => 'Aku Bukan Gadis kecil Lagi', 'penulis' => 'Ori Djoko Poernomo', 'kategori' => 'Seri Budi Pekerti', 'tahun' => 1996, 'stok' => 1],
            ['kode_buku' => 'BKD-014', 'judul' => 'Musim layang layang', 'penulis' => 'Foeza Me.Hutabarat', 'kategori' => 'Seri Budi Pekerti', 'tahun' => 1996, 'stok' => 1],
            ['kode_buku' => 'BKD-015', 'judul' => 'Test Iq Manajemen Anda', 'penulis' => 'Dr. marvelle S.Colby', 'kategori' => 'Umum', 'tahun' => 1999, 'stok' => 1],
            ['kode_buku' => 'BKD-016', 'judul' => 'Perilaku Organisasi', 'penulis' => 'Dr.H.A.Rusdiana, M.M', 'kategori' => 'cetakan 1', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-017', 'judul' => 'Komunikasi Antarpribadi', 'penulis' => 'Dr.Alo Liliweri, M.S', 'kategori' => 'cetakan 1', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-018', 'judul' => 'Kepemimpinan Pendidikan', 'penulis' => 'Drs. H. M. Daryanto', 'kategori' => 'cetakan 1', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-019', 'judul' => 'Manajemen Kurikulum', 'penulis' => 'Dr. Dr. H. A. Rusdiana, M.M', 'kategori' => 'cetakan 1', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-020', 'judul' => 'Etika Profesi Keguruan', 'penulis' => 'Dr. Shilphy A. Octavia, M.Pd.', 'kategori' => 'cetakan 1', 'tahun' => 2020, 'stok' => 2],
            ['kode_buku' => 'BKD-021', 'judul' => 'Manajemen Keuangan Daerah', 'penulis' => 'Dr. M. Abdul Halim, M.B.A., Ak.', 'kategori' => 'Edisi 4', 'tahun' => 2014, 'stok' => 2],
            ['kode_buku' => 'BKD-022', 'judul' => 'Hukum Administrasi Negara', 'penulis' => 'Prof. Dr. Ridwan HR', 'kategori' => 'Edisi Revisi', 'tahun' => 2016, 'stok' => 2],
            ['kode_buku' => 'BKD-023', 'judul' => 'Metologi Penelitian Kualitatif', 'penulis' => 'Prof. Dr. Lexy J. Moleong, M.A.', 'kategori' => 'Edisi Revisi', 'tahun' => 2017, 'stok' => 2],
            ['kode_buku' => 'BKD-024', 'judul' => 'Manajemen Pelayanan Publik', 'penulis' => 'Prof. Dr. Hardiyansyah, M.Si.', 'kategori' => 'Edisi Revisi', 'tahun' => 2018, 'stok' => 2],
            ['kode_buku' => 'BKD-025', 'judul' => 'Kebijakan Publik: Formulasi, Implementasi, dan Evaluasi', 'penulis' => 'Dr. Budi Winarno, M.A.', 'kategori' => 'Edisi Revisi', 'tahun' => 2012, 'stok' => 2],
            ['kode_buku' => 'BKD-026', 'judul' => 'Manajemen Risiko Organisasi Sektor Publik', 'penulis' => 'Dr. Supriyadi, M.Si.', 'kategori' => 'Umum', 'tahun' => 2019, 'stok' => 2],
            ['kode_buku' => 'BKD-027', 'judul' => 'Otonomi Daerah dan Pemerintahan Lokal', 'penulis' => 'Prof. Dr. Syamsuddin Haris', 'kategori' => 'Umum', 'tahun' => 2014, 'stok' => 1],
            ['kode_buku' => 'BKD-028', 'judul' => 'Sistem Informasi Manajemen Pemerintah Daerah', 'penulis' => 'Dr. Eko Indrajit', 'kategori' => 'Umum', 'tahun' => 2016, 'stok' => 1],
            ['kode_buku' => 'BKD-029', 'judul' => 'Tata Kelola Pemerintahan Yang Baik (Good Governance)', 'penulis' => 'Prof. Dr. Sedarmayanti, M.Pd.', 'kategori' => 'Umum', 'tahun' => 2017, 'stok' => 2],
            ['kode_buku' => 'BKD-030', 'judul' => 'Reformasi Birokrasi Indonesia', 'penulis' => 'Dr. Agus Dwiyanto', 'kategori' => 'Umum', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-031', 'judul' => 'Analisis Kebijakan Publik', 'penulis' => 'William N. Dunn', 'kategori' => 'Edisi 5', 'tahun' => 2018, 'stok' => 1],
            ['kode_buku' => 'BKD-032', 'judul' => 'Kepemimpinan Dalam Organisasi Sektor Publik', 'penulis' => 'Dr. Sondang P. Siagian', 'kategori' => 'Umum', 'tahun' => 2013, 'stok' => 2],
            ['kode_buku' => 'BKD-033', 'judul' => 'Pengembangan Organisasi dan Manajemen Perubahan', 'penulis' => 'Prof. Dr. Wibowo, S.E., M.Phil.', 'kategori' => 'Edisi 4', 'tahun' => 2016, 'stok' => 1],
            ['kode_buku' => 'BKD-034', 'judul' => 'Perencanaan Pembangunan Daerah', 'penulis' => 'Dr. Lincolin Arsyad', 'kategori' => 'Edisi 5', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-035', 'judul' => 'Evaluasi Kinerja Sumber Daya Manusia', 'penulis' => 'Prof. Dr. A.A. Anwar Prabu Mangkunegara', 'kategori' => 'Umum', 'tahun' => 2017, 'stok' => 2],
            ['kode_buku' => 'BKD-036', 'judul' => 'Hukum Kepegawaian Indonesia', 'penulis' => 'Sentra Hukum Indonesia', 'kategori' => 'Umum', 'tahun' => 2018, 'stok' => 2],
            ['kode_buku' => 'BKD-037', 'judul' => 'Manajemen Kinerja Sektor Publik', 'penulis' => 'Dr. Mahmudi, M.Si., Ak.', 'kategori' => 'Edisi 3', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-038', 'judul' => 'Sosiologi Birokrasi', 'penulis' => 'Dr. M. Miftah Thoha', 'kategori' => 'Umum', 'tahun' => 2014, 'stok' => 1],
            ['kode_buku' => 'BKD-039', 'judul' => 'Budaya Organisasi Kerja', 'penulis' => 'Prof. Dr. Taliziduhu Ndraha', 'kategori' => 'Umum', 'tahun' => 2012, 'stok' => 1],
            ['kode_buku' => 'BKD-040', 'judul' => 'Akuntabilitas Publik dan Transparansi', 'penulis' => 'Dr. Mardiasmo, M.B.A., Ak.', 'kategori' => 'Umum', 'tahun' => 2016, 'stok' => 2],
            ['kode_buku' => 'BKD-041', 'judul' => 'Inovasi Pelayanan Publik di Indonesia', 'penulis' => 'Dr. Tri Widodo W. Utomo', 'kategori' => 'Umum', 'tahun' => 2019, 'stok' => 2],
            ['kode_buku' => 'BKD-042', 'judul' => 'Manajemen Strategis Organisasi Sektor Publik', 'penulis' => 'Dr. Salusu, M.A.', 'kategori' => 'Edisi Revisi', 'tahun' => 2015, 'stok' => 1],
            ['kode_buku' => 'BKD-043', 'judul' => 'Hukum Ketenagakerjaan dan Kepegawaian', 'penulis' => 'Dr. Lalu Husni, S.H., M.Hum.', 'kategori' => 'Umum', 'tahun' => 2016, 'stok' => 2],
            ['kode_buku' => 'BKD-044', 'judul' => 'Pengawasan Internal Pemerintahan', 'penulis' => 'Dr. Bambang Pamungkas', 'kategori' => 'Umum', 'tahun' => 2017, 'stok' => 1],
            ['kode_buku' => 'BKD-045', 'judul' => 'Etika Birokrasi Publik', 'penulis' => 'Dr. Wahyudi Kumorotomo', 'kategori' => 'Umum', 'tahun' => 2013, 'stok' => 2],
            ['kode_buku' => 'BKD-046', 'judul' => 'Pengembangan Kompetensi ASN', 'penulis' => 'Pusbang Kompetensi BKN', 'kategori' => 'Umum', 'tahun' => 2020, 'stok' => 2],
            ['kode_buku' => 'BKD-047', 'judul' => 'Sistem Kompensasi dan Imbalan Kerja ASN', 'penulis' => 'Dr. Veithzal Rivai', 'kategori' => 'Umum', 'tahun' => 2015, 'stok' => 1],
            ['kode_buku' => 'BKD-048', 'judul' => 'Kepemimpinan Digital di Era Industri 4.0', 'penulis' => 'Dr. Rhenald Kasali', 'kategori' => 'Umum', 'tahun' => 2019, 'stok' => 2],
            ['kode_buku' => 'BKD-049', 'judul' => 'Manajemen Konflik Organisasi', 'penulis' => 'Dr. Soerjono Soekanto', 'kategori' => 'Umum', 'tahun' => 2014, 'stok' => 1],
            ['kode_buku' => 'BKD-050', 'judul' => 'Statistika untuk Penelitian Sosial dan Pemerintahan', 'penulis' => 'Prof. Dr. Sugiyono', 'kategori' => 'Edisi 28', 'tahun' => 2018, 'stok' => 2],
            ['kode_buku' => 'BKD-051', 'judul' => 'Aplikasi SPSS untuk Analisis Data Kepegawaian', 'penulis' => 'Prof. Dr. Singgih Santoso', 'kategori' => 'Umum', 'tahun' => 2019, 'stok' => 2],
            ['kode_buku' => 'BKD-052', 'judul' => 'Psikologi Industri dan Organisasi', 'penulis' => 'Dr. Sutarto Wijono', 'kategori' => 'Umum', 'tahun' => 2015, 'stok' => 1],
            ['kode_buku' => 'BKD-053', 'judul' => 'Teknik Penyusunan Peraturan Legislation Drafting', 'penulis' => 'Prof. Dr. Maria Farida Indrati', 'kategori' => 'Edisi Revisi', 'tahun' => 2020, 'stok' => 2],
            ['kode_buku' => 'BKD-054', 'judul' => 'Manajemen Sarana dan Prasarana Kantor', 'penulis' => 'Dr. Endang Lestari', 'kategori' => 'Umum', 'tahun' => 2016, 'stok' => 1],
            ['kode_buku' => 'BKD-055', 'judul' => 'E-Government dan Pelayanan Berbasis Teknologi', 'penulis' => 'Dr. Onno W. Purbo', 'kategori' => 'Umum', 'tahun' => 2017, 'stok' => 2],
            ['kode_buku' => 'BKD-056', 'judul' => 'Manajemen Diklat Berbasis Kompetensi', 'penulis' => 'Dr. Oemar Hamalik', 'kategori' => 'Umum', 'tahun' => 2016, 'stok' => 2],
            ['kode_buku' => 'BKD-057', 'judul' => 'Hukum Tata Negara Indonesia', 'penulis' => 'Prof. Dr. Jimly Asshiddiqie, S.H.', 'kategori' => 'Edisi Revisi', 'tahun' => 2015, 'stok' => 2],
            ['kode_buku' => 'BKD-058', 'judul' => 'Climbing The Competency Ladder', 'penulis' => 'R. Palan Ph.D.', 'kategori' => 'cetakan 2', 'tahun' => 2008, 'stok' => 1],
            ['kode_buku' => 'BKD-059', 'judul' => 'The Emotional Hostage : Rescuing Your Emotional Life', 'penulis' => 'Leslie Cameron-Bandler, Michael Lebeau', 'kategori' => 'cetakan 1', 'tahun' => 1986, 'stok' => 2],
        ];

        foreach ($buku as $item) {
            BukuFisik::updateOrCreate(
                ['kode_buku' => $item['kode_buku']],
                $item
            );
        }
    }
}