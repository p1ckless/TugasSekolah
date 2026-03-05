def tambahSiswa(daftar_siswa):
    nama = input("Masukkan nama siswa! :")
    kelas = input("Masukkan kelas siswa! :")
    try:
        nilai = float(input("Masukkan nilai siswa! :"))
    except ValueError:
        print("Input tidak valid, nilai harus berupa angka!")
        return daftar_siswa
    siswaBaru = {"nama": nama, "kelas": kelas, "nilai": nilai}
    daftar_siswa.append(siswaBaru)
    print(f"{nama}, berhasil ditambahkan di daftar siswa!")
    return daftar_siswa


def tampilkanSsiwa(daftar_siswa):
    if not daftar_siswa:
        print("data siswa belum terdaftar!")
        return
    
    print("Data Siswa")
    print("=" * 35)
    print("{:<15} {:<10} {:<5}".format("Nama", "Kelas", "Nilai"))
    print("=" * 35)
    for siswa in daftar_siswa:
        print("{:<15} {:<10} {:<5}".format(siswa["nama"], siswa["kelas"], siswa["nilai"]))
    
    print("=" * 35)

def hapusSiswa(daftar_siswa):
    for i in range(len(daftar_siswa)):
        if daftar_siswa[i]["nama"].lower() == nama_dihapus.lower():
            del daftar_siswa[i]
            print(f"{nama_dihapus}, berhasil dihapus dari daftar siswa!")
            return daftar_siswa
        
    print(f"{nama_dihapus}, tidak ditemukan di daftar siswa!)")


daftar_siswa = []
while True:
    print("Halaman manajemen data siswa")
    print("Ketik 1, untuk menginput data siswa baru!")
    print("Ketik 2, untuk menampilkan data siswa!")
    print("Ketik 3, untuk menghapus data siswa!")
    print("Ketik 4, untuk keluar dari program")

    pilihan_user = input("Silahkan masukkan pilihan anda! ")
    if pilihan_user == "1":
        daftar_siswa = tambahSiswa(daftar_siswa)
    elif pilihan_user == "2":
        tampilkanSsiwa(daftar_siswa)
    elif pilihan_user == "3":
        nama_dihapus = input("Masukkan nama siswa yang ingin dihapus: ")
        daftar_siswa = hapusSiswa(daftar_siswa)
    elif pilihan_user == "4":
        print("Berhasil keluar dari program.")
        break
    else:
        print("Input tidak valid, Silakan coba lagi.")