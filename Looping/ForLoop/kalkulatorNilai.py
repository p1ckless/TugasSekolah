mapel_yg_ingin_dihitung = int(input("Silahkan Masukkan jumlah Mata Pelajaran yang \nIngin Dihitung Rata-ratanya! : "))
nilai_total = 0

for a in range(mapel_yg_ingin_dihitung):
  nilai_mapel = float(input(f"Nilai Mata Pelajaran ke {a+1}: "))
  nilai_total += nilai_mapel
  
nilai_rata_rata = nilai_total / mapel_yg_ingin_dihitung

print(f"Rata-rata nilainya adalah: {nilai_rata_rata}! ")
print(f"Total nilai jika tidak di hitung Rata-rata adalah: {nilai_total}! ")