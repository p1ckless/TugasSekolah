using System;
using PBO;

class Program
{
    static void Main()
    {
      pasien pasien1 = new pasien();
      pasien1.setData("Acar", 
                     17, 
                      "Meriang");
      pasien1.getData();
    }
}