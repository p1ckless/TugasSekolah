rata_level = int(input("Masukkan rata-rata Level anggota Guild! :"))
anggota_aktif = int(input("Masukkan jumlah anggota Guild yang Aktif! :"))

if rata_level > 50 and anggota_aktif > 50:
  peringkat = "S"
elif 30 <= rata_level <= 50 and anggota_aktif > 30:
  peringkat = "A"
else:
  peringkat = "C"
  
  
print(f"Peringkat Guild kamu adalah {peringkat}")