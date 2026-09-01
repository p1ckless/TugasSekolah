import 'dart:io';

void main() {
  print("Masukkan angka :");
  num angka = int.parse(stdin.readLineSync()!);

  if (angka == 1) {
    print("RPL");
  }
  else if (angka == 2) {
    print("TKJ");
  }
  else if (angka == 3) {
    print("Animasi");
  }
  else {
    print("Masukkan angka yg sesuai");
  }
}