
using System;
using PBO;

class Program
{
    static void Main()
    {
        string pilihan = "";

        while (pilihan != "3")
        {
            Console.WriteLine("Input angka 1 untuk Menambah Pasien");
            Console.WriteLine("Input angka 2 untuk Melihat Riwayat Pasien");
            Console.WriteLine("Input angka 3 untuk Keluar dari Program");
            Console.Write("Masukkan Pilihanmu!: ");

            pilihan = Console.ReadLine().Trim();

            if (pilihan == "1")
            {
                Console.Write("Masukkan Nama: ");
                string nama = Console.ReadLine();

                Console.Write("Masukkan Umur: ");
                int umur = int.Parse(Console.ReadLine());

                Console.Write("Masukkan Diagnosa: ");
                string diagnosa = Console.ReadLine();

                Pasien pasienBaru = new Pasien();
                pasienBaru.setData(nama, umur, diagnosa);
                pasienBaru.tambahPasien();
                pasienBaru.riwayatPasien();

                Console.WriteLine("Data Pasien Berhasil Disimpan!");

                Console.WriteLine("Tekan Enter untuk melanjutkan...");
                Console.ReadLine();
            }
            else if (pilihan == "2")
            {
                Console.WriteLine("Daftar Pasien:");

                foreach (Pasien pasien in Pasien.daftarPasien)
                {
                    pasien.getData();
                }

                Console.Write("Masukkan Nama Pasien: ");
                string cariPasien = Console.ReadLine();

                foreach (Pasien pasien in Pasien.daftarPasien)
                {
                    if (pasien.cariNama() == cariPasien)
                    {
                        pasien.getData();
                        pasien.riwayatPasien();
                    }
                }

                Console.WriteLine("Tekan Enter untuk melanjutkan...");
                Console.ReadLine();
            }
            else if (pilihan == "3")
            {
                break;
            }
        }

        Console.WriteLine("Terimakasih sudah menggunakan Program ini :)");
    }
}