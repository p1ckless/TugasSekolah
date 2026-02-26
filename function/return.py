# Function dengan nilai balik / return
pendapatan = 2000000
saldoPerusahaan = 5000000

def tambahSaldo(saldoAwal, tambahSaldo):
  saldoAwal += tambahSaldo
  return saldoAwal
  
def kurangSaldo(saldoAwal, kurangSaldo):
  saldoAwal -= kurangSaldo
  return saldoAwal

def salamPembuka(namaAdmin, namaPerusahaan):
  global saldoPerusahaan
  print("==========================")
  print(f"Selamat datang Di {namaPerusahaan}")
  print("===========================")
  print(f"Hello, {namaAdmin}")
  user_input = input(f"Pendapatan Perusahaan kemarin sebesar Rp{pendapatan} \nInput 1 jika ingin memasukkan saldo \nInput 2 jika ingin menarik saldo \nInput angka selain 1-2 untuk keluar!")
  
  if user_input == "1":
    saldo_baru = int(input("Silahkan masukkan pendapatan hari ini! :"))
    saldoPerusahaan = tambahSaldo(saldoPerusahaan, saldo_baru)
    print(f"Pendapatan hari ini sebesar Rp{saldo_baru} \nSaldo perusahaan sekarang adalah Rp{saldoPerusahaan}")
  
  elif user_input == "2":
    pengurangan_saldo = int(input("Silahkan masukkan jumlah saldo yang ingin ditarik! :"))
    saldoPerusahaan = kurangSaldo(saldoPerusahaan, pengurangan_saldo)
    print(f"Saldo berhasil ditarik sebesar Rp{pengurangan_saldo}, jumlah saldo sekarang adalah Rp{saldoPerusahaan}")
    
  else:
   print("Saldo hari ini belum direkap")


daftar_admin = {"1234" : "Pickless", "6767" : "Griezmann "}
admin = input("Silahkan masukkan kode Admin! :")
admin = daftar_admin[admin]
salamPembuka(admin, "PT Sigma")
