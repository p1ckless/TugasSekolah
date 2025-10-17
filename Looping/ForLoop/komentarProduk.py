komentar_baik = ["bagus", "baik", "memuaskan"]
komentar_buruk = ["jelek", "buruk", "mengecewakan"]

# print(komentar_baik)
# print(komentar_buruk)

hasil_komentar = input("Silahkan beri komentar tentang produk yang \nsudah Anda Beli! :").lower()

kata_kata = hasil_komentar.split()

hasil_komentar_positif = 0
hasil_komentar_negatif = 0

for a in  kata_kata:
  if a in komentar_baik:
    hasil_komentar_positif += 1

for a in kata_kata:
  if a in komentar_buruk:
    hasil_komentar_negatif += 1

if hasil_komentar_positif > hasil_komentar_negatif:
  print(f"Terimakasih sudah memberikan \nkomentar yang Positif ! ")

elif hasil_komentar_negatif > hasil_komentar_positif:
  print(f"Terimakasih sudah memberikan komentar anda, \nKami akan mendengar komentar anda untuk kedepannya! ")

else:
  print("Terimakasih sucah memberikan komentar!")