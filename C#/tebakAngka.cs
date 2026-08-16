Random rnd  = new Random();
int target = rnd.Next(1, 11);
int tebakkan;
int kesempatan = 3;

Console.WriteLine("Permainan tebak angka");

do
{
    Console.Write("Masukkan angka tebakkanmu : ");
    tebakkan = int.Parse(Console.ReadLine());

    if (tebakkan == target)
    {
        Console.WriteLine("Tebakkan Mu benar!");
    }
    else if (tebakkan > target)
    {
        Console.WriteLine("Tebakkan Mu terlalu besar");
    }
    else
    {
        Console.WriteLine("Tebakkan Mu terlalu kecil");
    }
    kesempatan--;
    Console.WriteLine("Kesempatan Mu tersisa" + " " + kesempatan +" " + "Kali");
} while (tebakkan != target && kesempatan > 0);