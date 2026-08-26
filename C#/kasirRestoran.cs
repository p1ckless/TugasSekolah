int totalBayar = 0;
string pilihan = " ";

while (pilihan != "6")
{
    Console.WriteLine("=== Menu Yang Tersedia ===");
    Console.WriteLine("1. Nasi Goreng, Rp15.000");
    Console.WriteLine("2. Ayam Goreng, Rp12.000");
    Console.WriteLine("3. Es Teh, Rp4.000");
    Console.WriteLine("4. Es Jeruk Hangat, Rp3.000");
    Console.WriteLine("5. Es Milo, Rp6.000");
    Console.WriteLine("==========================");
    Console.WriteLine("Masukkan nomor 6 untuk keluar dari program");

    Console.Write("Masukkan pilihanmu : ");
    pilihan = Console.ReadLine().Trim();
    if (pilihan == "6")
    {
        break;
    }
    int nomor_menu = int.Parse(pilihan);
    string nama_menu = " ";
    int harga_menu = 0;

    if (nomor_menu == 1)
    {
        nama_menu = "Nasi Goreng";
        harga_menu = 15000;
    }
    else if (nomor_menu == 2)
    {
        nama_menu = "Ayam Goreng";
        harga_menu = 12000;
    }
    else if (nomor_menu == 3)
    {
        nama_menu = "Es Teh";
        harga_menu = 4000;
    }
    else if (nomor_menu == 4)
    {
        nama_menu = "Es Jeruk Hangat";
        harga_menu = 3000;
    }
    else if (nomor_menu == 5)
    {
        nama_menu = "Es Milo";
        harga_menu = 6000;
    }
    else
    {
        Console.WriteLine("Masukkan nomor yang valid");
        continue;
    }
    Console.Write("Masukkan jumlah pesanan kamu : ");
    int jumlah_pesanan = int.Parse(Console.ReadLine());
    int total_bayar = jumlah_pesanan * harga_menu;
    totalBayar += total_bayar;

    Console.WriteLine("==========================================");
    Console.WriteLine("Pesanan kamu adalah" + " " + nama_menu);
    Console.WriteLine("Jumlah pesanan kamu" + " " + jumlah_pesanan);
    Console.WriteLine("Total Bayar" + " " + total_bayar);
    Console.WriteLine("==========================================");
}

Console.WriteLine("==========================================");
Console.WriteLine("Total seluruh pembayaran mu adalah Rp:" + " " + totalBayar);
Console.WriteLine("==========================================");