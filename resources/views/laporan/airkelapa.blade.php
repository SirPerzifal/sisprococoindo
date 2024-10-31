@extends('layouts.app')

@section('content')
<style>
    /* Mainbar */
.mainbar {
    flex: 1%;
    background-color: #D9D9D9 !important;
    padding-top: 20px; /* Jarak dari topbar */
    margin-left: 235px;
    overflow-y: auto;
    height: calc(100vh - 70px);
    width: calc(100% - 235px);
    font-family: 'Inter', sans-serif; !important;
}

.container {
    padding: 20px;
    background-color:#F7F7F7;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    width: 95%;
    margin-left: 35px;
    font-family: 'Inter', sans-serif;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.header h2 {
    font-size: 16px;
    margin: 0;
    color: #636362;
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
    text-align: center;
}

.filters {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin: 20px 0;
    font-size: 12px;
}

/* Dropdown tanggal */
.filters select.pilihtanggal {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 12px;
    color: #636362;
    width: 135px;
   
}

/* Input pencarian dan ikon */
.filters .input-icon {
    position: relative;
    width: 250px;
     /* Lebar lebih pendek untuk input pencarian */
}

.filters input[type="text"] {
    width: 100%;
    height: 36px;
    padding: 8px 35px 8px 12px; /* Tambahkan padding untuk ikon */
    border: 1px solid #cc;
    border-radius: 5px;
    font-size: 12px;
    
}

.caridata{
    color: #636362 !important;
}

.filters .input-icon i {
    position: absolute;
    padding-right: 10px;
    top: 50%;
    color:#636362;
}

/* Tombol aksi */
.filters .actions {
    display: flex;
    gap: 10px;
    margin-left: auto;
}

.filters .actions button {
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 12px;
    gap: 10px;
}

.filters .actions .btn {
    background-color: #104367;
    color: white;
}

.filters .actions .btn.add {
    background-color: #71bc74;
    transform: translateX(-2px);
    
   
}

.filters .actions .btn.export {
    background-color: #e0b063;
    transform: translateX(-2px);
    
}
/* Tabel */
.table-container {
    overflow-x: auto;
    font-size: 11px;
}

table {
    width: 100%;
    border-collapse: collapse; /* Agar garis antar sel menyatu */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(230, 238, 241, 0.1);
    
}

table th, table td {
    padding: 10px;
    text-align: center;
    border: 1px solid #636362; /* Garis antar sel */
    color: #636362;
    font-size: 12px;
}

table th {
    border-bottom: 1px solid #636362; /* Garis tebal untuk header */
}

table td button {
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    background-color: #104367;
    color: white;
    font-size: 12px;
    
}

table td button.edit {
    background-color: #3498db;
}

table td button.delete {
    background-color: #e74c3c;
}

/* Pagination */
.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
}

.showing-entries {
    font-size: 12px;
    color: #636362;
}

.pagination {
    list-style: none;
    display: flex;
    gap: 7px;
}

.pagination li {
    display: inline-block;
}

.pagination button {
    background-color: #E6E3E3;
    border: 1px solid #ddd;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 7px;
    color: #636362;
    font-size: 12px;
}

.pagination button:hover {
    background-color:#104367;
    color: white;
    opacity: 85%;
}

.input-icon {
    position: relative;
    width: 100%;
    max-width: 100px; /* Sesuaikan dengan kebutuhan */
}

.input-icon i {
    position: absolute;
    right: 5px !important;/* Pindahkan ikon ke sisi kanan */
    top: 50%;
    transform: translateY(-50%);
    color: #636362; /* Warna ikon */
}

.input-icon input {
    width: 100%;
    padding: 10px 40px 10px 10px; /* Tambahkan padding kanan untuk ruang ikon */
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
    
}

.input-icon input:focus {
    border-color: #104367; /* Ubah warna border saat fokus */
}

/* Modal container */
        .modal {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            z-index:899;
        }

        .modal-content {
            background-color: #f7f7f7;
            border-radius: 13px;
            width: 600px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        /* Header */
        .modal-content h2 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 30px;
            color: #636362;
        }

        /* Form elements */
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            right: 10px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            color: #636362;
            display: block;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 250px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-shadow: 1px 2px rgba(0, 0, 0, 0.05);
        }

        .form-group input[type="number"] {
            width: 100px;
        }

        .small-input {
            width: 150px;
        }

        .medium-input {
            width: 180px;
        }
.form-row{
    flex-direction: row;
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

        /* Timbangan section */
        .timbangan-container {
            margin-top: 20px;
            text-align: center;
        }

        .timbangan-container span {
            display: inline-block;
            margin-bottom: 10px;
            font-size: 14px;
            color: #636362;
        }

        .timbangan-inputs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .timbangan-inputs input[type="text"] {
            width: 40px;
            height: 40px;
            padding: 5px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Total label */
        .total-container {
            text-align: right;
            margin-bottom: 30px;
            font-size: 14px;
            color: #636362;
        }

        /* Submit button */
        .submit-btn {
            width: 35%;
            padding: 10px;
            border: none;
            background-color:#104367;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-left: auto;
            display: block;
            margin-right: auto;
            color: white;
        }

        .submit-btn:hover {
            background-color: #aaa;
        }

        /* Close button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        .horizontalline1 {
        /* Warna teks, tidak berpengaruh pada <hr> */
        border: none; /* Hapus border default */
        border-bottom: 0.5px solid #ccc;
         width: 100%; /* Lebar penuh */
         margin: 5px 0 15px 0; /* Margin atas, kanan, bawah, kiri */
        opacity: 0.5; /* Nilai opasitas (1 = tidak transparan) */
        padding-top: 20px;
}

.btn.export {
        display: flex;
        align-items: center; /* Mengatur ikon dan teks dalam satu baris */
       
        color: white; /* Mengatur warna teks menjadi putih */
        border: none; /* Menghapus border default */
         /* Menambahkan padding */
        cursor: pointer; /* Menambahkan kursor pointer */
    }

    .btn.export img {
      /* Jarak antara ikon dan teks */
        
        filter: brightness(0) invert(1);
      
   
    }

</style>

<div class="mainbar">
    <div class="container">
        <div class="header">
            <h2>Laporan Harian Hasil Kerja Sheller - Parer ( Air Kelapa )</h2>
        </div>

        <!-- Filter Section -->
        <div class="filters">
            <select class="pilihtanggal">
                <option>Pilih Tanggal</option>
                <option>12 Agustus 2024</option>
                <option>13 Agustus 2024</option>
            </select>
            <div class="input-icon">
                <input type="text"  placeholder="Cari Data" class="search-input">
                <i class="fas fa-search"></i> <!-- Ikon pencarian (search icon) -->
            </div>
            <div class="actions"> 
                <button class="btn export">
                   <img width="10" height="10" src="https://img.icons8.com/forma-thin/24/export.png" alt="export"/> Export
                </button>
                
                <button id="openFormBtn" class="btn add">+ Tambah Data</button>
            </div>
        </div>

        <!-- Table Section -->
       
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Sheller</th>
                        <th> S/P</th>
                        <th>Bruto</th>
                        <th>Potongan KRJ</th>
                        <th>Hasil Kerja</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>12 Agustus 2024</td>
                        <td>Marcella</td>
                        <td> S </td>
                        <td>50</td>
                        <td>150</td>
                        <td>300</td>
                        <td><button>Hasil Timbangan</button></td>
                        <td>
                            <button class="edit">Edit</button>
                            <button class="delete">Delete</button>
                        </td>
                    </tr>
                    <!-- Tambah data lainnya -->
                </tbody>
            </table>
        </div>
        

      

        <!-- Pagination Section -->
        <hr class="horizontalline1">
        <div class="pagination-container">
          
            <div class="showing-entries">
                Showing <span id="start"></span> to <span id="end"></span> from <span id="total"></span> entries
            </div>
            
            <ul class="pagination">
                <li><button onclick="prevPage()">&#60;</button></li>
                <li><button onclick="goToPage(1)">1</button></li>
                <li><button onclick="goToPage(2)">2</button></li>
                <li><button onclick="goToPage(3)">3</button></li>
                <li><button onclick="goToPage(4)">4</button></li>
                <li><button onclick="nextPage()">&#62;</button></li>
            </ul>
        </div>


    <!-- Modal -->
    <div class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>FORM INPUT HASIL KERJA SHELLER - PARER ( AIR KELAPA )</h2>
                <span class="close">&times;</span>
            </div>
           
            <div class="form-group">
                <div>
                    <label for="nama-sheller">Nama Pekerja</label>
                    <input class="small-input" type="text" id="nama-sheller" value="Marcella Corazon" >
                </div>
              
                <div>
                    <label for="tanggal-picker">Tanggal</label>
                    <input type="date" class="small-input" id="tanggal-picker">
                </div>
            </div>
            <div class="form-group">
            <div>
                <label for="departemen">Bagian</label>
                <input type="text" class="small-input" id="departemen" value="" >
            </div>
            
                <div class="form-row">
                    <div>
                        <label for="total-keranjang">Total Keranjang</label>
                        <input type="number" class="small-input" id="total-keranjang">
                    </div>
                <div>
                    <label for="tipe-keranjang">Tipe Keranjang</label>
                    <select id="tipe-keranjang" class= "small-input">
                        <option value="A">Keranjang Besar</option>
                        <option value="B">Keranjang Kecil</option>
                    </select>
                </div>
                </div> 
            </div>
          
    
            <!-- Timbangan section -->
            <div class="timbangan-container">
                <span>Hasil Timbangan Air Kelapa</span>
                <div class="timbangan-inputs">
                    <input type="text" id="timbangan1">
                    <input type="text" id="timbangan2">
                    <input type="text" id="timbangan3">
                    <input type="text" id="timbangan4">
                    <input type="text" id="timbangan5">
                    <input type="text" id="timbangan6">
                    <input type="text" id="timbangan7">
                    <input type="text" id="timbangan8">
                    <input type="text" id="timbangan9">
                    <input type="text" id="timbangan10">
                    <input type="text" id="timbangan11">
                    <input type="text" id="timbangan12">
                </div>
            </div>
    
            <!-- Total section -->
            <div class="total-container">
                <span>Total: 250 kg</span>
            </div>
    
            <!-- Submit button -->
            <button class="submit-btn">Kirim</button>
        </div>
    </div>
    
    <!-- Script to close the modal -->
    <script>
        document.querySelector('.close').addEventListener('click', function () {
            document.querySelector('.modal').style.display = 'none';
        });
    </script>
    
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>

// Sample data
const data = [
    { no: 1, tanggal: "12 Agustus 2024", nama: "Marcella", sp: "S", bruto: 50, potongan: 0, hasil: 150, detail: "Hasil Timbangan" },
    { no: 2, tanggal: "12 Agustus 2024", nama: "Zhuxin", sp: "P", bruto: 75, potongan: 0, hasil: null, detail: "Hasil Timbangan" },
    { no: 3, tanggal: "12 Agustus 2024", nama: "Monica", sp: "S", bruto: 25, potongan: 0, hasil: null, detail: "Hasil Timbangan" },
    { no: 4, tanggal: "12 Agustus 2024", nama: "Aurora", sp: "S", bruto: 240, potongan: 0, hasil: 240, detail: "Hasil Timbangan" },
    { no: 5, tanggal: "12 Agustus 2024", nama: "Layla", sp: "P", bruto: 125, potongan: 0, hasil: 250, detail: "Hasil Timbangan" },
    { no: 6, tanggal: "12 Agustus 2024", nama: "Sonya", sp: "S", bruto: 125, potongan: 0, hasil: null, detail: "Hasil Timbangan" },
    // Tambahkan lebih banyak data sesuai kebutuhan
];

const rowsPerPage = 5;
let currentPage = 1;
const totalPages = Math.ceil(data.length / rowsPerPage);

document.getElementById("total").innerText = data.length;

function displayData() {
    const tableBody = document.getElementById("table-body");
    tableBody.innerHTML = "";

    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage > data.length ? data.length : start + rowsPerPage;

    document.getElementById("start").innerText = start + 1;
    document.getElementById("end").innerText = end;

    for (let i = start; i < end; i++) {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${data[i].no}</td>
            <td>${data[i].tanggal}</td>
            <td>${data[i].nama}</td>
            <td>${data[i].sp}</td>
            <td>${data[i].bruto}</td>
            <td>${data[i].potongan}</td>
            <td>${data[i].hasil ? data[i].hasil : "-"}</td>
            <td><button>${data[i].detail}</button></td>
            <td><button>Edit</button><button>Delete</button></td>
        `;
        tableBody.appendChild(row);
    }
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        displayData();
    }
}

function nextPage() {
    if (currentPage < totalPages) {
        currentPage++;
        displayData();
    }
}

function goToPage(page) {
    if (page >= 1 && page <= totalPages) {
        currentPage = page;
        displayData();
    }
}

// Load initial data
displayData();

    // Ambil elemen modal dan tombol
    var modal = document.getElementById("modal");
    var btn = document.get


// Menambahkan event listener untuk tombol tambah anggota
document.querySelector('.add-member-btn').addEventListener('click', function() {
// Hitung jumlah anggota parer yang sudah ada
var currentCount = document.querySelectorAll('.anggota-block').length; 

// Nomor anggota parer berikutnya
var nextNumber = currentCount + 1;

// Buat elemen HTML untuk blok baru
var newBlock = `
    <div class="anggota-block">
         <div class="form-row">
        <div class="form-group">
            <label for="anggota-parer${nextNumber}">Anggota Parer ${nextNumber}</label>
            <input type="text" class="kotak" id="anggota-parer${nextNumber}" placeholder="Nama Anggota Parer">
        </div>

        
            <div class="form-group">
                <label for="total-keranjang${nextNumber}">Total Keranjang</label>
                <input type="number"  class="kotak" id="total-keranjang${nextNumber}" min="0">
            </div>
            <div class="form-group">
                <label for="tipe-keranjang${nextNumber}">Tipe Keranjang</label>
                <select id="tipe-keranjang${nextNumber}" class="custom-select">
                    <option value="A">Keranjang Besar</option>
                    <option value="B">Keranjang Kecil</option>
        
                </select>
            </div>
        </div>
        <span class="label-timbangan">Hasil Timbangan Air Kelapa</span>
        <div class="basket-container">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
            <input class="basket-input" type="text" value="">
        </div>
      <hr class="hori-line">  
    </div>
    
`;

// Tambahkan blok baru ke dalam anggota-parer-container
document.querySelector('#anggota-parer-container').insertAdjacentHTML('beforeend', newBlock);
});


document.getElementById('tanggal-picker').addEventListener('change', function() {
var selectedDate = new Date(this.value);
var year = selectedDate.getFullYear();
var month = selectedDate.getMonth() + 1; // Januari adalah 0
var day = selectedDate.getDate();

console.log('Tanggal dipilih: ' + year + '-' + month + '-' + day);
});


// Ambil elemen modal dan tombol close
var modal = document.getElementById('modal');
var openFormBtn = document.getElementById("openFormBtn");
var closeBtn = document.querySelector('.close');

// Fungsi untuk menutup modal
function closeModal() {
modal.style.display = 'none';
}

// Event listener untuk tombol close
closeBtn.addEventListener('click', closeModal);

// Opsional: Menutup modal ketika area luar modal diklik
window.addEventListener('click', function(event) {
if (event.target == modal) {
    closeModal();
}
});



</script>