def nilai(total_nilai):
  if total_nilai > 79:
    print(f"Selamat kamu mendapatkan nilai {total_nilai}")
  elif total_nilai < 50 :
    print(f"Kamu gagal dalam ujian, \nKamu mendapatkan nilai {total_nilai}, \nSilahkan melaksanakan remidi \nUntuk memperbaiki nilai")
  else:
    print(f"Kamu mendapatkan nilai {total_nilai}, \nSemangat terus ya belajarnya ")

total_nilai = int(input("Silahkan masukkan hasil dari ujian kamu!: "))
nilai(total_nilai)