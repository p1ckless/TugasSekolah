using System;
namespace PBO
{
    public class pasien
    {
        private string nama;
        private int umur;
        private string diagnosa;
      

        public void setData(string nama, int umur, string diagnosa)
        {
            this.nama = nama;
            this.umur = umur;
            this.diagnosa = diagnosa;
        }

        public void getData()
        {
            Console.WriteLine($"nama = {nama}, umur =  {umur}, diagnosa = {diagnosa}");
        }
    }
}