@extends('layouts.app')

@section('content')
<style>
    /* Mainbar */
.mainbar {
    flex: 1%;
    background-color: #D9D9D9 !important;
    padding-top: 20px; /* Jarak dari topbar */
    margin-left: 235px;
    height: 100vh;
    width: calc(100% - 235px);
    font-family: 'Inter', sans-serif; !important;
}

.container {
    padding: 20px;
    background-color:#F7F7F7;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    width: 94%;
    height: 97%;
    margin-left: 40px;
    font-family: 'Inter', sans-serif;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    
}

.header h2 {
    font-size: 16px;
    margin: 0;
    color: #636362;
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
    text-align: center;
    transform: translateX(375px);
}

.profile-pic img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

//* Container Utama */
.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: 0 auto;
}

.form-main {
    display: flex;
    gap: 20px;
}

.form-inputs {
    flex: 2;
    
}

.profile-picture {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Gambar foto profil */
#profile-image {
    width: 150px;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #ccc;
}

/* Mengatur layout dua kolom menggunakan grid */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
}

.form-group label {
    font-size: 12px;
    margin-bottom: 8px;
    color: #636362;
    font-weight: 500;
}

.form-group input {
    width: :75%;
    padding: 8px;
    font-size: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #636362;
    font-weight: 400;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
}

/* Tombol Update */
.btn-update {
    width: 98%;
    padding: 8px;
    background-color: #0e4375;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-left: 10px;
    text-align: center; 
}

.btn-update:hover {
    background-color: #063361;
}

.custom-select {
    position: relative;
    font-family: 'Inter', sans-serif;
}

.custom-select select {
    display: none; /* Hides the original select element */
}

/* Styled container */
.select-selected {
    background-color: #f9f9f9;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    color: #636362;
    position: relative;
    text-align: left;
    width: 100%;
}

.select-selected:after {
    content: "\25BC"; /* Down arrow */
    font-size: 14px;
    color: #636362;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
}

/* Dropdown Items (Hidden by Default) */
.select-items {
    display: none;
    position: absolute;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    z-index: 99;
    max-height: 200px;
    overflow-y: auto;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.select-items div {
    padding: 10px;
    cursor: pointer;
    font-size: 14px;
    color: #636362;
}

.select-items div:hover {
    background-color: #e9e9e9;
}

/* Show Dropdown when active */
.select-selected.select-arrow-active + .select-items {
    display: block;
}
.custom-select select {
    display: none; /* Menyembunyikan elemen asli */
}
.select-selected {
    cursor: pointer;
}
.select-items {
    max-height: 200px;
    overflow-y: auto;
}
.select-hide {
    display: none;
}
.profile-picture {
    display: flex;
    flex-direction: column; /* Mengatur elemen di dalamnya berurutan secara vertikal */
    align-items: center;    /* Pusatkan elemen di tengah secara horizontal */
    gap: 10px;              /* Jarak antara gambar dan tombol */
}

#profile-image {
    width: 150px;       /* Atur ukuran gambar */
    height: 200px;      /* Sesuaikan ukuran gambar */
    object-fit: cover;  /* Pastikan gambar tidak terdistorsi */
    border-radius: 10px;
    border: 2px solid #ccc;
}

.btn-update-foto {
    padding: 8px;
    width:100px;
    background-color: #0e4375;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    text-align: center;
}

.btn-update-foto:hover {
    background-color: #063361;
}

</style>

<div class="mainbar">
    <div class="container">
        <div class="header">
            <h2>Form Tambah Data Pegawai</h2>
        </div>

        <div class="form-container">
            <form>
                <div class="form-main">
                    <!-- Bagian kiri (Form Input) -->
                    <div class="form-inputs">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="tgl-join">Tgl Join</label>
                                <input type="date" id="tgl-join" value="">
                            </div>
                            <div class="form-group">
                                <label for="tgl-out">Tgl Out</label>
                                <input type="date" id="tgl-out" value="">
                            </div>
                        </div>
               
        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" value="">
                            </div>
                            <div class="form-group">
                                <label for="id">ID Pegawai</label>
                                <input type="text" id="id" value="" >
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="position">Posisi</label>
                                <div class="custom-select">
                                    <div class="select-selected">Pilih Posisi</div>
                                    <div class="select-items">
                                        <div>Operator</div>
                                        <div>Helper</div>
                                        <div>Sheller</div>
                                        <div>Parer</div>
                                        <div>HR</div>
                                        <div>Accounting</div>
                                        <div>Accounting Manager</div>
                                        <div>Production Manager</div>
                                        <div>Purchasing Staff</div>
                                        <div>Admin Gudang</div>
                                        <div>Admin Production</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="department">Departemen</label>
                                <div class="custom-select">
                                    <div class="select-selected">Pilih Departemen</div>
                                    <div class="select-items">
                                        <div>Kupas Kelapa</div>
                                        <div>Produksi</div>
                                        <div>Office</div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="status-kepegawaian">Status Kepegawaian</label>
                                <div class="custom-select">
                                    <div class="select-selected">Pilih Status</div>
                                    <div class="select-items">
                                        <div>PKWT</div>
                                        <div>KKWT</div>
                                        <div>Proyek</div>
                                        <div>Permanent</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" value="Aktif" readonly>
                            </div>
                        </div>
        
                        <button type="submit" class="btn-update">Tambah</button>
                    </div>
        
                    <!-- Bagian kanan (Foto Profil) -->
                    <div class="profile-picture">
                        <img src="{{asset('img/hi logo.png') }}" alt="Foto Profil" id="profile-image">
                        <input type="file" id="profile-input" accept="image/*" style="display: none;">
                        <button type="button" class="btn-update-foto" id="change-profile-btn">Ganti Profil</button>
                        <button type="button" class="btn btn-primary" id="btn-preview" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Tampilkan Data Pegawai -->
                        <table class="table table-bordered">
                            <tr>
                                <th>Tanggal Join</th>
                                <td id="preview-tgl-join">-</td>
                            </tr>
                            <tr>
                                <th>Tanggal Out</th>
                                <td id="preview-tgl-out">-</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td id="preview-nama">-</td>
                            </tr>
                            <tr>
                                <th>ID Pegawai</th>
                                <td id="preview-id">-</td>
                            </tr>
                            <tr>
                                <th>Posisi</th>
                                <td id="preview-posisi">-</td>
                            </tr>
                            <tr>
                                <th>Departemen</th>
                                <td id="preview-departemen">-</td>
                            </tr>
                            <tr>
                                <th>Status Kepegawaian</th>
                                <td id="preview-status-kepegawaian">-</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td id="preview-status">-</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4 text-center">
                        <!-- Preview Foto Profil -->
                        <img id="preview-foto" src="{{ asset('img/hi logo.png') }}" alt="Preview Foto" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var x, i, j, selElmnt, a, b, c;
    /* Look for any elements with the class "custom-select" */
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /* Create a new DIV that will act as the selected item */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* Create a new DIV that will contain the option list */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /* Create a new DIV that will act as an option item */
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {
                /* Update the original select box and the selected item */
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            /* When the select box is clicked, close any other select boxes, and open/close the current one */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }
    function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document, except the current select box */
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i);
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /* If the user clicks anywhere outside the select box, then close all select boxes */
    document.addEventListener("click", closeAllSelect);
});


document.addEventListener('DOMContentLoaded', function () {
    var changeProfileBtn = document.getElementById('change-profile-btn');
    var profileInput = document.getElementById('profile-input');
    var profileImage = document.getElementById('profile-image');

    // Ketika tombol "Ganti Profil" diklik
    changeProfileBtn.addEventListener('click', function () {
        profileInput.click(); // Memicu input file
    });

    // Ketika file dipilih
    profileInput.addEventListener('change', function () {
        var file = profileInput.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                profileImage.src = e.target.result; // Tampilkan gambar baru
            };
            reader.readAsDataURL(file);
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const btnPreview = document.getElementById('btn-preview');

    btnPreview.addEventListener('click', function () {
        // Ambil data dari form
        const tglJoin = document.getElementById('tgl-join').value || '-';
        const tglOut = document.getElementById('tgl-out').value || '-';
        const nama = document.getElementById('name').value || '-';
        const id = document.getElementById('id').value || '-';
        const posisi = document.querySelector('#position').value || '-';
        const departemen = document.querySelector('#department').value || '-';
        const statusKepegawaian = document.querySelector('#status-kepegawaian').value || '-';
        const status = document.getElementById('status').value || '-';
        const fotoSrc = document.getElementById('profile-image').src;

        // Isi data ke modal
        document.getElementById('preview-tgl-join').textContent = tglJoin;
        document.getElementById('preview-tgl-out').textContent = tglOut;
        document.getElementById('preview-nama').textContent = nama;
        document.getElementById('preview-id').textContent = id;
        document.getElementById('preview-posisi').textContent = posisi;
        document.getElementById('preview-departemen').textContent = departemen;
        document.getElementById('preview-status-kepegawaian').textContent = statusKepegawaian;
        document.getElementById('preview-status').textContent = status;
        document.getElementById('preview-foto').src = fotoSrc;
    });
});
</script> 