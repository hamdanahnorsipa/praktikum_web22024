@extends('layouts.main') 
@push('css') 
<style> 

</style> 
@endpush 
@section('content') 
    <div class="container"> 
        <div class="card my-4"> 
            <div class= card> 
                <div class="card-header"> 
                Data Mahasiswa 
                </div> 
                <div class="input-group flex-nowrap"> 
                    <input type="text" class="form-control" placeholder="Cari  berdasarkan nama dan jurusan" aria-label="Cari" aria-describedby="addon-wrapping"> 
                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span> 
                <div> 
                    <button type="button" class="btn btn-success"> Cetak Data </button>
                    <button type="button" class="btn btn-primary"> +Tambah </button> 
                </div> 
            </div> 
            <table class="table"> 
            <thead> 
                <tr> 
                <th scope="col">No</th> 
                <th scope="col">Jurusan</th> 
                <th scope="col">NPM</th> 
                <th scope="col">Nama</th> 
                <th scope="col">Tanggal Lahir</th> 
                <th scope="col">Foto</th> 
                <th scope="col">Aksi</th> 
                </tr> 
            </thead> 
            </table> 
    </div> 

@endsection