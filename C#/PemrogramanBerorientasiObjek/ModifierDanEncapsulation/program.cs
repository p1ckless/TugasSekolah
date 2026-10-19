using System;
using PBO;

class program
{
  static void Main() 
  {
    // pasien 1
    Pasien pasien1 = new Pasien();
    pasien1.setData("Acar", 17, "Demam");
    pasien1.tambahPasien();

    // pasien 2
    Pasien pasien2 = new Pasien();
    pasien2.setData("Farel", 15, "Flu");
    pasien2.tambahPasien();

    // pasien 3
    Pasien pasien3 = new Pasien();
    pasien3.setData("Messi", 20, "Radang");
    pasien3.tambahPasien();

    foreach (Pasien pasien in Pasien.daftarPasien) 
    {
      pasien.getData();
    }
  }
}
  