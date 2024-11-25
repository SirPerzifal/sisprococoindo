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
    transform: translateY(-20px);
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
    width: 20%;
    padding: 8px;
    margin-top: 5px;
    background-color: #0e4375;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    margin-left: 10px;
    text-align: center; 
    transform: translateX(220px);
}

.btn-update:hover {
    background-color: #063361;
}

</style>

<div class="mainbar">
    <div class="container">
        <div class="header">
            <h2>Form Edit Data Pegawai</h2>
        </div>

        <div class="form-container">
            <form>
                <div class="form-main">
                    <!-- Bagian kiri (Form Input) -->
                    <div class="form-inputs">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="tgl-join">Tgl Join</label>
                                <input type="text" id="tgl-join" value="12 September 2024" >
                            </div>
                            <div class="form-group">
                                <label for="tgl-out">Tgl Out</label>
                                <input type="text" id="tgl-out" value="12 September 2024" >
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" value="Marcella Corazon" >
                            </div>
                            <div class="form-group">
                                <label for="id">ID Pegawai</label>
                                <input type="text" id="id" value="CAS234" >
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="position">Posisi</label>
                                <input type="text" id="position" value="Operator" >
                            </div>
                            <div class="form-group">
                                <label for="department">Departemen</label>
                                <input type="text" id="department" value="Produksi" >
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="status-kepegawaian">Status Kepegawaian</label>
                                <input type="text" id="status-kepegawaian" value="PKWT" >
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" id="status" value="Aktif" >
                            </div>
                        </div>
        
                        <button type="submit" class="btn-update">Update</button>
                    </div>
        
                    <!-- Bagian kanan (Foto Profil) -->
                    <div class="profile-picture">
                        <img src="{{asset('img/hi logo.png') }}" alt="Foto Profil" id="profile-image">
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</main>
    
    
    
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>


</script> 