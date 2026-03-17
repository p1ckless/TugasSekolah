print("====================================")
print("= SELAMAT DATANG DI ATM SEDERHANA =")
print("====================================")

saldo = int(input("Silahkan Masukkan jumlah saldo terakhir Kamu! Rp:"))

while True:
  print("Masukkan angka 1 Untuk melihat Saldo! ")
  print("Masukkan angka 2 Untuk menarik Saldo! ")
  print("Masukkan angka 3 Untuk memasukkan Saldo! ")
  print("Masukkan angka 4 Untuk untuk Keluar! ")
  
  pilihan = input("Silahkan masukkan angka untuk Pengoperasian! : ")
  if pilihan == '1':
    print(f"Jumlah saldo kamu adalah Rp{saldo}")
#----------------------------------
  elif pilihan == '2':
    tarik_saldo = int(input("Silahkan masukkan jumlah Saldo yang \ningin Ditarik :Rp"))
    if tarik_saldo > saldo:
      print(f"Anda tidak memiliki saldo sebesar Rp{tarik_saldo}")
    elif tarik_saldo < 1:
      print("Silahkan masukkan angka yang Valid!")
    else:
      saldo -= tarik_saldo
      print(f"Sisa saldo Kamu adalah Rp{saldo}")
#----------------------------------
  elif pilihan == '3':
    masukkan_saldo = int(input("Silahkan masukkan jumlah Saldo \nYang ingin Disetorkan! :Rp"))
    if masukkan_saldo < 1:
      print("Silahkan masukkan angka yang Valid!")
    else:
      saldo += masukkan_saldo
      print(f"Kamu berhasil mensetor uang sebanyak Rp{masukkan_saldo},\n Jumlah saldo sekarang adalah Rp{saldo}")
#----------------------------------
  elif pilihan == '4':
    break

print("Terimakasih, semoga hari mu menyenangkan ")