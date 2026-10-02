using static System.Net.Mime.MediaTypeNames;

namespace PBO
{
    public class Fighter
    {
        public string name;
        public int health;
        public int Level;

        public void Attack(Fighter musuh)
        {
            if (this.Level == 0)
            {
                Console.WriteLine($"{this.name}, sudah Mati, dan tidak dapat melakukan Attack");
                return;
            }

            if (musuh.Level == 0)
            {
                Console.WriteLine($"{musuh.name}, sudah Mati, dan tidak dapat melakukan Attack");
                return;
            }

            int damage = this.Level * 10;
            Console.WriteLine($"{this.name} menyerang {musuh.name}");
            musuh.health -= damage;

            if (musuh.health <= 0)
            {
                musuh.health = 0;
                musuh.Level -= 1;
                Console.WriteLine($"{musuh.name} telah kehabisan health, Level akan dikurangi, Level saat ini adalah{musuh.Level}");

                if (musuh.Level <= 0)
                {
                    musuh.Level = 0;
                    Console.WriteLine($"{musuh.name} Sudah mati");
                }
            }
        }

        public void Heal()
        {
            if (this.Level <= 0)
            {
                Console.WriteLine($"{this.name}, sudah Mati, dan tidak dapat melakukan Healing");
                return;
            }

            if (this.health >= 100)
            {
                this.health = 100;
                Console.WriteLine($"{this.name}, sudah memiliki batas Healing, yaitu 100");
            }

            int Healing = this.Level * 5;
            this.health += Healing;

            if (this.health > 100)
            {
                this.health = 100;
            }

            Console.WriteLine($"{this.name} melakukan penyembuhan, sebesar {Healing}");
        }
    }
}