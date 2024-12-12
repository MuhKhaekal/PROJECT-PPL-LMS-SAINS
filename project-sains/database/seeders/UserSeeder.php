<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = 
        [
            ['name' => 'Aulia Adha Putri', 'email' => 'auliaadha@gmail.com', 'nim' => 'H071211055', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Ardika', 'email' => 'ardika@gmail.com', 'nim' => 'H071221002', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Rahmatia', 'email' => 'rahmatia@gmail.com', 'nim' => 'H071221004', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nurhaliza Alawiah Syah', 'email' => 'nurhaliza@gmail.com', 'nim' => 'H071221008', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Andi Alisha Faiqihah', 'email' => 'andialisha@gmail.com', 'nim' => 'H071221010', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nabila Athira', 'email' => 'nabilaathira@gmail.com', 'nim' => 'H071221012', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nur Amalia', 'email' => 'nuramalia@gmail.com', 'nim' => 'H071221016', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Laode Fahmi Hidayat', 'email' => 'laodefahmi@gmail.com', 'nim' => 'H071221022', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Rasyad Bimasatya', 'email' => 'rasyadbima@gmail.com', 'nim' => 'H071221024', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Affandi', 'email' => 'muhdaffandi@gmail.com', 'nim' => 'H071201094', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Farah Dwi Aulia Chandrika', 'email' => 'farahaulia@gmail.com', 'nim' => 'H071221001', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Iswari', 'email' => 'muhammadiswari@gmail.com', 'nim' => 'H071221007', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nurul Alya', 'email' => 'nurulalya@gmail.com', 'nim' => 'H071221009', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Susanti', 'email' => 'susanti@gmail.com', 'nim' => 'H071221013', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Ihsanul Mumtaz', 'email' => 'ihsanulmumtaz@gmail.com', 'nim' => 'H071221015', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'A. Syaifullah Aksa', 'email' => 'syaifullahaksa@gmail.com', 'nim' => 'H071221017', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Dewa Ayu Eka Natalia Pratiwi', 'email' => 'dewaayu@gmail.com', 'nim' => 'H071221021', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Dewina Marchely Kasenda', 'email' => 'dewina@gmail.com', 'nim' => 'H071221047', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Sakinah Nurusyifa', 'email' => 'sakinahsyifa@gmail.com', 'nim' => 'H071221049', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Fahdel Putra Mustafa', 'email' => 'fahdelputra@gmail.com', 'nim' => 'H071221051', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Diana Aisyah Arfillah', 'email' => 'dianaaisyah@gmail.com', 'nim' => 'H071221053', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Zoel Ramadhan', 'email' => 'zoelramadhan@gmail.com', 'nim' => 'H071221059', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Ananda Eka Pratiwi', 'email' => 'anandaeka@gmail.com', 'nim' => 'H071221061', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Aditya Permana', 'email' => 'adityapermana@gmail.com', 'nim' => 'H071221063', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Izzata Clarissa Salsabila', 'email' => 'izzata@gmail.com', 'nim' => 'H071221065', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Khaerurrozikin', 'email' => 'khaerurrozikin@gmail.com', 'nim' => 'H071221069', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Saldan Rama', 'email' => 'saldanrama@gmail.com', 'nim' => 'H071221071', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Mario Alerian Rante Ta\'dung', 'email' => 'marioalerian@gmail.com', 'nim' => 'H071221075', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Ammar Tyo Pasaribu', 'email' => 'ammartyo@gmail.com', 'nim' => 'H071221079', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Ilham Syahfithrah Hendra', 'email' => 'ilhamhendra@gmail.com', 'nim' => 'H071221081', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Nabil Shadiq', 'email' => 'nabilshadiq@gmail.com', 'nim' => 'H071221083', 'role' => 'asisten', 'password' => bcrypt('12345678')],
            ['name' => 'Andi Muh. Haikal Lukman', 'email' => 'haikallukman@gmail.com', 'nim' => 'H071221089', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Adrian Hidayat', 'email' => 'adrianhidayat@gmail.com', 'nim' => 'H071221091', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Afifah Salsabila', 'email' => 'afifahsalsabila@gmail.com', 'nim' => 'H071221095', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Fadhil Abdillah', 'email' => 'fadhilabdillah@gmail.com', 'nim' => 'H071221097', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Khalizatul Jannah', 'email' => 'khalizatuljannah@gmail.com', 'nim' => 'H071221101', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Karina Minerva Romeda', 'email' => 'karinaromeda@gmail.com', 'nim' => 'H071221034', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Surya Agus Nanro', 'email' => 'suryaagus@gmail.com', 'nim' => 'H071221038', 'role' => 'asisten', 'password' => bcrypt('12345678')],
            ['name' => 'Kelvin', 'email' => 'kelvin@gmail.com', 'nim' => 'H071221042', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Najwa Hanana', 'email' => 'najwahanana@gmail.com', 'nim' => 'H071221046', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Natasya Indriani', 'email' => 'natasyaindriani@gmail.com', 'nim' => 'H071221054', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Ayu Widianti', 'email' => 'ayuwidianti@gmail.com', 'nim' => 'H071221056', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Mahendra Kirana M.B', 'email' => 'mahendrakirana@gmail.com', 'nim' => 'H071221058', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Ahmad Fauzhan Ramadhan B', 'email' => 'fauzhanramadhan@gmail.com', 'nim' => 'H071221062', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Zabryna Andiny', 'email' => 'zabrynaandiny@gmail.com', 'nim' => 'H071221066', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Ardiansyah Asrifah', 'email' => 'ardiansyah@gmail.com', 'nim' => 'H071221068', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nabila Nizia Rastriana Baru', 'email' => 'niziarastriana@gmail.com', 'nim' => 'H071221074', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Zulfikri Sadrah', 'email' => 'zulfikrisadrah@gmail.com', 'nim' => 'H071221082', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Imam Mahdi Samad', 'email' => 'imammahdi@gmail.com', 'nim' => 'H071221084', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'A.M. Fauzan Baihaqi Taufan', 'email' => 'fauzantaufan@gmail.com', 'nim' => 'H071221088', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nabilah Azzahrani Suhardiman', 'email' => 'azzahrani@gmail.com', 'nim' => 'H071221090', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Fara Aulia Al Aini Syam', 'email' => 'faraalaini@gmail.com', 'nim' => 'H071221092', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Mayko Raditya Wirawan', 'email' => 'maykowirawan@gmail.com', 'nim' => 'H071221096', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Rafli Dahlan', 'email' => 'raflidahlan@gmail.com', 'nim' => 'H071221104', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Attar Musharih Tasrief', 'email' => 'attartasrief@gmail.com', 'nim' => 'H071211014', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muchtar Adam Al-Hamid', 'email' => 'muchtaradam@gmail.com', 'nim' => 'H071211040', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Minhajul Yusri Khairi', 'email' => 'minhajulyusri@gmail.com', 'nim' => 'H071221006', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Alif Rezky Maulana', 'email' => 'alifrezky@gmail.com', 'nim' => 'H071221014', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Waliuddin', 'email' => 'waliuddin@gmail.com', 'nim' => 'H071221018', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Kelvin Leonardo Sianipar', 'email' => 'kelvinleonardo@gmail.com', 'nim' => 'H071221020', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Andi Ahmad Fa\'il Fudhayl', 'email' => 'andifailfudhayl@gmail.com', 'nim' => 'H071221026', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nadjwa Amalia Jufri', 'email' => 'nadjwaamalia@gmail.com', 'nim' => 'H071221028', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Joy Abrian Rantepasang', 'email' => 'joyrantepasang@gmail.com', 'nim' => 'H071221030', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Azka Sufirman Rahman', 'email' => 'azkasufirman@gmail.com', 'nim' => 'H071221032', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muh. Dafa Subhan', 'email' => 'dafasubhan@gmail.com', 'nim' => 'H071221036', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Putri Nakita Munsi', 'email' => 'putrinakita@gmail.com', 'nim' => 'H071221040', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Kefira Anaya Tangdiongga Sarira', 'email' => 'kefiraanaya@gmail.com', 'nim' => 'H071221044', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Andi Ahmad Salwan Farid', 'email' => 'andisalwan@gmail.com', 'nim' => 'H071221048', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Al Qadri', 'email' => 'alqadri@gmail.com', 'nim' => 'H071221052', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Kevin Al Gazali', 'email' => 'kevingazali@gmail.com', 'nim' => 'H071221060', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'A. Afif Alhaq', 'email' => 'afifalhaq@gmail.com', 'nim' => 'H071221064', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Zefanya Farrel Palinggi', 'email' => 'zefanyafarrel@gmail.com', 'nim' => 'H071221070', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Mifthahul Hoiri Bachrudin Basir', 'email' => 'mifthahulhoiri@gmail.com', 'nim' => 'H071221072', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Elza Aprilia Timang', 'email' => 'elzaaprilia@gmail.com', 'nim' => 'H071221076', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Andi Adnan', 'email' => 'andiadnan@gmail.com', 'nim' => 'H071221078', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muh. Adnan Putra Amiruddin', 'email' => 'adnanputra@gmail.com', 'nim' => 'H071221080', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Nabila Kharisma Syaputri', 'email' => 'nabilasyaputri@gmail.com', 'nim' => 'H071221086', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muh. Fahri', 'email' => 'muhfahri@gmail.com', 'nim' => 'H071221094', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Fauzan Bachtiar', 'email' => 'fauzanbachtiar@gmail.com', 'nim' => 'H071221098', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Siti Fathimah Azzahra', 'email' => 'fathimahazzahra@gmail.com', 'nim' => 'H071221100', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muh. Yusuf Fikry', 'email' => 'yusuffikry@gmail.com', 'nim' => 'H071221102', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Khaekal', 'email' => 'muh.khaekal@gmail.com', 'nim' => 'H071221039', 'role' => 'admin', 'password' => bcrypt('12345678')],
            ['name' => 'Muhammad Reza', 'email' => 'muh.reza@gmail.com', 'nim' => 'H071221037', 'role' => 'user', 'password' => bcrypt('12345678')],
            ['name' => 'Muh. Ilham Maulana Ramlan', 'email' => 'muh.ilhammaulana@gmail.com', 'nim' => 'H071221035', 'role' => 'asisten', 'password' => bcrypt('12345678')],
            ['name' => 'Muh. Taufan Sandi', 'email' => 'muh.taufan@gmail.com', 'nim' => 'H071221029', 'role' => 'asisten', 'password' => bcrypt('12345678')],

        
          
        
        ];
        
        foreach($users as $user) {
        User::create($user);
        }
    }
}
