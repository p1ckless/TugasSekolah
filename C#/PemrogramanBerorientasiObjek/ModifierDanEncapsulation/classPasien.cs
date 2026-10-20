using System;
using System.Collections.Generic;
namespace PBO
{
    public class Pasien
    {
        private string nama;
        private int umur;
        private string diagnosa;
      
        public static List<Pasien> daftarPasien = new List<Pasien>();
      
        public void setData(string nama, int umur, string diagnosa)
        {
            this.nama = nama;
            this.umur = umur;
            this.diagnosa = diagnosa;
        }

        public void tambahPasien() 
        {
          daftarPasien.Add(this);
        }

        public static List<string> riwayat = new List<string>();
      
        public void riwayatPasien() 
        {
          riwayat.Add(diagnosa);
          Console.WriteLine("Riwayat Pasien");

          foreach (string diagnosa in riwayat) 
          {
            Console.WriteLine("- " + diagnosa);
          }
        }
      
       public string cariNama() 
       {
         return nama;
       }
      
        public void getData()
        {
            Console.WriteLine($"Nama : {nama}");
            Console.WriteLine($"Umur : {umur}");
            Console.WriteLine($"Diagnosa : {diagnosa}");
        }
    }
}