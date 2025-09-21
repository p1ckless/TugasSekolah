fotocopy_yang_diperlukan = int(input("Masukkan Lembar yang Ingin di Fotocopy! : "))

harga = 250 * fotocopy_yang_diperlukan 

if fotocopy_yang_diperlukan >= 150:
  harga = 250 * 149 + 200 * (fotocopy_yang_diperlukan - 149)
  
print(f"Uang yang diperlukan untuk membayar Fotocopy adalah : Rp{harga}")