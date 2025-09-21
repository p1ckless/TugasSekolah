total_belanja = int(input("Masukan total Belanja! :Rp"))
waktu = int(input("masukkan waktu belanja(0-23) :"))

if 7 <= waktu < 9:
  potongan = 20000
  biaya_ongkir = "Gratis Ongkir!"
else:
  potongan = 0
  biaya_ongkir = "Gratis Ongkir!"
  
potongan_belanja = total_belanja - potongan

print("========HASIL BELANJA========")
print(F"Hasil belanja Rp{total_belanja}")
print(F"Anda mendapatkan potongan sebesar Rp{potongan}!")
print(F"And mendapatkan Voucher {biaya_ongkir}")
print(f"Total akhir belanja {potongan_belanja}")