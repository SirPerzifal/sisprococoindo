@extends('layouts.app')

@section('content')
<style>
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
.filters select.pilihtanggal,
.filters .input-icon input[type="text"] {
    padding: 8px 12px; /* Padding yang sama */
    height: 36px; /* Tinggi yang sama */
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 12px;
    color: #636362;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
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
.table-container {
        overflow-x: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(230, 238, 241, 0.1);
        font-size: 11px;
    }
    th, td {
        padding-right: 5px;
        padding-left: 5px;
        padding-bottom: 10px;
        padding-top: 10px;
        text-align: center;
        border: 1px solid #636362; /* Garis antar sel */
        color: #636362;
        vertical-align: middle;
    }
    th {
        background-color: #f0f0f0;
    }
    .merge-col {
        border-right: none;
    }
    .merge-col + td {
        border-left: none;
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
    .search-input::placeholder {
    color: #636362; /* Ganti dengan warna yang diinginkan */
    opacity: 1; /* Mengatur opasitas jika perlu */
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
</style>

<div class="mainbar">
    <div class="container">
        <div class="header">
            <h2>Card Stock Santan</h2>
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

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">Date<br>日期</th>
                        <th rowspan="2">Remark<br>评论</th>
                        <th rowspan="2">Making Product<br>制作产品</th>
                        <th rowspan="2">Fat<br>胖的</th>
                        <th rowspan="2">PH<br>酸碱度</th>
                        <th rowspan="2">Begin<br>开始</th>
                        <th colspan="2">IN<br>入库</th>
                        <th rowspan="2">Out<br>出库</th>
                        <th colspan="5">Remain<br>库存</th>
                        <th rowspan="2">Remark<br>评论</th>
                    </tr>
                    <tr>
                        <th>Bags<br>包</th>
                        <th>Box<br>盒子</th>
                        <th>5 kg</th>
                        <th>4 kg</th>
                        <th>3 kg</th>
                        <th>2 kg</th>
                        <th>1 kg</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- First Row -->
                    <tr>
                        <td></td>
                        <td>Sisa stock bulan Juli</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.385</td>
                        <td>1.108</td>
                        <td>277</td>
                        <td>5.540</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.662</td>
                        <td></td>
                        <td>Sisa 2 bags, Reject 1 bag, bocor 12 bags, 118 bags blm ketemu</td>
                    </tr>
                    <!-- Second Row -->
                    <tr>
                        <td>1</td>
                        <td>Produksi Tgl 24 Juli 2024</td>
                        <td>084324</td>
                        <td>26,0%</td>
                        <td>6,05</td>
                        <td>2.662</td>
                        <td>1.698</td>
                        <td>964</td>
                        <td>3.120</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>1.854</td>
                        <td></td>
                        <td>Reject 2 bags, Sample 3 bags, 31 bags tidak ketemu</td>
                    </tr>
                    <!-- Third Row -->
                    <tr>
                        <td>2</td>
                        <td>Produksi Tgl 23 Juli 2024</td>
                        <td>084324</td>
                        <td>28,0%</td>
                        <td>6,08</td>
                        <td>1.698</td>
                        <td>624</td>
                        <td>156</td>
                        <td>2.700</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>1.989</td>
                        <td></td>
                        <td>Sisa 2.837 bags</td>
                    </tr>
                    <!-- Fourth Row -->
                    <tr>
                        <td>5</td>
                        <td>Produksi Tgl 26 Juli 2024</td>
                        <td>084326</td>
                        <td>28,0%</td>
                        <td>6,04</td>
                        <td>1.854</td>
                        <td>540</td>
                        <td>135</td>
                        <td>10.820</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.530</td>
                        <td></td>
                        <td>Sisa 673 bags</td>
                    </tr>
                    <!-- Additional Rows (repeat the pattern based on provided data) -->
                    <tr>
                        <td>6</td>
                        <td>Produksi Tgl 26 Juli 2024</td>
                        <td>084326</td>
                        <td>28,0%</td>
                        <td>6,08</td>
                        <td>2.530</td>
                        <td>952</td>
                        <td>238</td>
                        <td>4.760</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>2.768</td>
                        <td></td>
                        <td>Sisa 1.737 bags</td>
                    </tr>
                    <!-- Continue adding rows in a similar fashion -->
                </tbody>
            </table>
        </div>
        
        <hr class="horizontalline1">
        <div class="pagination-container">
            <div class="showing-entries">
                Showing <span id="start">1</span> to <span id="end">5</span> from <span id="total">50</span> entries
            </div>
            <ul class="pagination">
                <li><button class="page-btn prev-btn" onclick="prevPage()">&#60;</button></li>
                <li><button class="page-btn" onclick="goToPage(1)">1</button></li>
                <li><button class="page-btn" onclick="goToPage(2)">2</button></li>
                <li><button class="page-btn" onclick="goToPage(3)">3</button></li>
                <li><button class="page-btn" onclick="goToPage(4)">4</button></li>
                <li><button class="page-btn next-btn" onclick="nextPage()">&#62;</button></li>
            </ul>
        </div>     
    </div>

    @endsection

    @section('scripts')
    <script>
   function goToPage(page) {
    if (page >= 1 && page <= totalPages) {
        currentPage = page;
        displayData();
        updatePagination();
    }
}

function updatePagination() {
    const buttons = document.querySelectorAll('.page-btn');
    buttons.forEach((button) => button.classList.remove('active'));

    const currentButton = document.querySelector(`.pagination .page-btn:nth-child(${currentPage + 1})`);
    if (currentButton) {
        currentButton.classList.add('active');
    }
}

// Load initial data
displayData();
updatePagination();

</script>
@endsection 