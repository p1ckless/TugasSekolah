
using System;
using PBO;

class Program
{
    static void Main()
    {
        string pilihan = "";

        while (pilihan != "3")
        {
            Console.WriteLine("============ Pilihan Yang Tersedia ============");
            Console.WriteLine("Input angka 1 untuk Menambah Pasien");
            Console.WriteLine("Input angka 2 untuk Melihat Riwayat Pasien");
            Console.WriteLine("Input angka 3 untuk Keluar dari Program");
            Console.WriteLine("===============================================");
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

                Console.WriteLine("Data Pasien Berhasil Disimpan!");

                Console.WriteLine("Tekan Enter untuk melanjutkan...");
                Console.ReadLine();
            }
            else if (pilihan == "2")
            {
                Console.WriteLine("Daftar Pasien");

                foreach (Pasien pasien in Pasien.daftarPasien)
                {
                    pasien.getData();
                }

                Console.Write("Masukkan Nama Pasien: ");
                string cariPasien = Console.ReadLine().ToLower();

                while(true) 
                {
                  bool namaDitemukan = false;
                  
                  foreach(Pasien pasien in Pasien.daftarPasien) 
                  {
                    if (pasien.cariNama().ToLower() == cariPasien) 
                    {
                      pasien.getData();
                      pasien.riwayatPasien();

                      namaDitemukan = true;
                      break;
                    }
                  }
                  
                    if (namaDitemukan) 
                    {
                      break;
                    }

                    Console.WriteLine("Nama Pasien Tidak Ditemukan!");
                    Console.Write("Masukkan Nama Pasien Lagi: ");
                    cariPasien = Console.ReadLine().ToLower();
                }

                
                Console.WriteLine("Tekan Enter untuk melanjutkan...");
                Console.ReadLine();
            }
            else if (pilihan == "3")
            {
                break;
            }
            else 
            {
              Console.WriteLine("Masukkan angka yang valid!");
              continue;
            }
        }

        Console.WriteLine("Terimakasih sudah menggunakan Program ini :)");
    }
}