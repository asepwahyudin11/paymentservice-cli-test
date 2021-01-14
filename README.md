# paymentservice-cli-test
`asepwahyudin11/paymentservice-cli-test` adalah aplikasi REST API Sederhana Payment Service, yang terdiri dari 2 endpoint:
1. Create data transaksi pembayaran
2. Get status transaksi pembayaran

## Quick Installation
Buka Command Line / Git Bash kemudian jalankan perintah dibawah di direktori tujuan untuk melakukan instalasi:
```
git clone https://github.com/asepwahyudin11/paymentservice-cli-test.git
```
Setelah proses selesai maka aplikasi telah berhasil didownload, dan siap untuk dijalankan.

## Migration
Sebelum menjalankan aplikasi, kita perlu melakukan migration database terlebih dahulu. Pastikan mysql sudah diaktifkan, untuk saya sendiri menggunakan XAMPP dalam menjalankan aplikasi ini.
Buka Command Line dan masuk ke direktori aplikasi lalu jalankan perintah berikut:
```
php migration-cli.php
```
Perintah tersebut sudah menjalankan migrasi data berupa:
- Membuat database dengan nama "dbpaymentservice"
- Membuat 2 tabel yang terdiri dari tabel "transactions" dan "transaction_histories"
- Menambahkan 2 sample data ke dalam tabel

## Write History
Untuk menambahkan history transaksi dapat dilakukan dengan format `php transaction-cli.php {reference_id} {status}`.
Buka Comman Line lalu jalankan perintah berikut untuk menambahkan history transaksi:
```
php transaction-cli.php 1 Paid
```
Perintah tersebut akan menambahkan history transaksi ke-1 berstatus "Paid"

## Endpoint 1 : Create Transaction
Jalankan aplikasi REST Client seperti Postman, API Tester, dll untuk mencoba endpoint dari aplikasi ini. Sesuaikan method menjadi `POST` lalu rubahlah URL dengan endpoint berikut:
```
http://localhost:8080/paymentservice-cli-test/api/create.php
```
Adapun parameter yang perlu disertakan yaitu:
- invoice_id
- item_name
- amount
- payment_type
- customer_name
- merchant_id
Endpoint tersebut akan membuat data transaksi baru serta history default berstatus "Pending"

## Endpoint 2 : Get Status Transaction
Sesuaikan method menjadi `POST` lalu rubahlah URL dengan endpoint berikut:
```
http://localhost:8080/paymentservice-cli-test/api/get-status.php
```
Adapun parameter yang perlu disertakan yaitu:
- reference_id
- merchant_id
Endpoint tersebut akan memeriksa status terakhir berdasarkan reference_id dan merchant_id
