# Function dengan nilai balik / return
pendapatan = 2000000
saldoPerusahaan = 5000000

def tambahPendapatan(saldoAwal, tambahSaldo):
  saldoAwal += tambahSaldo
  return saldoAwal

def salamPembuka(namaAdmin, namaPerusahaan):
  global saldoPerusahaan
  print("==========================")
  print(f"Selamat datang Di {namaPerusahaan}")
  print("===========================")
  print(f"Hello, {namaAdmin}")
  user_input = input(f"Pendapatan Perusahaan kemarin sebesar Rp{pendapatan} \nApakah anda ingin menginput pendapatan hari ini? (Y/n)")
  
  if user_input == "y":
    pendapatan_baru = int(input("Silahkan masukkan pendapatan hari ini! :"))
    
    saldoPerusahaan = tambahPendapatan(saldoPerusahaan, pendapatan_baru)
    
    print(f"Pendapatan hari ini sebesar Rp{pendapatan_baru} \n Saldo perusahaan sekarang adalah Rp{saldoPerusahaan}")
  
  else:
   print("Saldo hari ini belum direkap")


daftar_admin = {"1234" : "Pickless", "6767" : "Griezmann "}
admin = input("Silahkan masukkan kode Admin! :")
admin = daftar_admin[admin]
salamPembuka(admin, "PT Sigma")