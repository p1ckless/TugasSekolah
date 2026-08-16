String input;

do
{
    Console.Write("Masukkan angka random(ketik 'stop' untuk memberhentikan program) : ");
    input = Console.ReadLine();
    if (input != "stop")
    {
        int angka = int.Parse(input);

        if (angka % 2 == 0)
        {
            Console.WriteLine("Angkamu genap");
        }
        else
        {
            Console.WriteLine("Angkamu ganjil");
        }
    }

} while (input != "stop");