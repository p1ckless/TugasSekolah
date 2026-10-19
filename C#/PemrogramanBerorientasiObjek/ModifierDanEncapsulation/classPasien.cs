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

        public void tambahPasien () 
        {
          Pasien pasienBaru = new Pasien();
          pasienBaru.setData(nama, umur, diagnosa);
          daftarPasien.Add(pasienBaru);
        }

        public void getData()
        {
            Console.WriteLine($"nama = {nama}, umur =  {umur}, diagnosa = {diagnosa}");
        }
    }
}