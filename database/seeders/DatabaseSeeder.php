<?php

namespace Database\Seeders;

use App\Models\profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username' => 'admin1',
            'role' => 'admin',
            'password' =>'2603',

        ]);
        User::create([
            'username' => 'operator1',
            'role' => 'operator',
            'password' =>'2603',

        ]);
        profile::create([
            'nama_sekolah'   => 'SMK YPC Tasikmalaya',
            'alamat'         => 'Jl. Raya Mangunreja No. 73, Cikunten Singaparna, Tasikmalaya, Jawa Barat 46414, Indonesia',
            'kepala_sekolah' => 'Drs. Ujang Sanusi, MM',
            'visi_misi'      => 'Visi: Menjadi sekolah unggulan yang menghasilkan lulusan siap kerja dan berkarakter.
                Misi:
                1. Meningkatkan kualitas pendidikan berbasis kompetensi.
                2. Mengembangkan soft skill dan karakter siswa.
                3. Meningkatkan kerja sama dengan industri.',
            'logo'           => 'public/asset/foto/images-removebg-preview.png',
            'foto'           => 'public/asset/foto/Quality Restoration-Ultra HD-smks-ypc-tasikmalaya (1).jpeg',
            'npsn'           => '1234567890',
            'kontak'         => '0265-123456',
            'deskripsi'      => 'SMK YPC Tasikmalaya adalah lembaga pendidikan menengah kejuruan yang fokus pada pengembangan kompetensi siswa agar siap menghadapi dunia industri. Sekolah ini memiliki fasilitas modern, tenaga pengajar berpengalaman, dan berbagai program ekstrakurikuler untuk mendukung pengembangan karakter siswa.',
            'tahun_berdiri' => 2005,
            'created_at' => now(),
            'updated_at' => now(),
              ]);
    }
}
