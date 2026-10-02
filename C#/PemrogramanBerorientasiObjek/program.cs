using PBO;

Fighter hero = new Fighter();
hero.name = "Aulus";
hero.health = 100;
hero.Level = 1;

Fighter hero2 = new Fighter();
hero2.name = "Lapu Lapu";
hero2.health = 75;
hero2.Level = 10;

Console.WriteLine($"Nama Hero: {hero.name}, Health Hero: {hero.health}, Level Hero {hero.Level}");
Console.WriteLine($"Nama Hero: {hero2.name}, Health Hero: {hero2.health}, Level Hero {hero2.Level}");

Console.WriteLine("Pengujian Method");
hero.Attack(hero2);
hero2.Attack(hero);
hero.Heal();

Console.WriteLine($"{hero.name} Memiliki sisa Health {hero.health}, Level terakhir adalah {hero.Level}");
Console.WriteLine($"{hero2.name} Memiliki sisa Health {hero2.health}, Level terakhir adalah {hero2.Level}");