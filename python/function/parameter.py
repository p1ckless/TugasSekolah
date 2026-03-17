# Function dengan parameter 

def salamPembuka(namaAdmin, namaPerusahaan):
  print("==========================")
  print(f"Selamat datang Di {namaPerusahaan}")
  print("===========================")
  print(f"Hello, {namaAdmin}")
  
daftar_admin = {"1234" : "Pickless", "6767" : "Griezmann "}
admin = input("Silahkan masukkan kode Admin! :")
admin = daftar_admin[admin]
salamPembuka(admin, "PT Sigma")