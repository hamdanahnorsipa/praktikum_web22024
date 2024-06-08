@extends('layouts.main') 
@section('content') 
    <div class="container"> 
        <div class="card my-4"> 
            <div class="card-header"> 
                Tambah Mahasiswa 
            </div> 
            <div class="card-body"> 
                <form action="{{Route('mahasiswa.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group"> 
                        <label for="">Jurusan</label> 
                        <select name="jurusan" id="" class="form-control"> 
                            <option value="">-Pilih-</option> 
                            <option value="TI">TI</option> 
                            <option value="SI">SI</option> 
                        </select> 
                    </div> 
                    <div class="form-group"> 
                        <label for="">NPM</label> 
                        <input type="text" name="npm" class="form-control"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="">Nama</label> 
                        <input type="text" name="nama" class="form-control"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="">Tanggal</label> 
                        <input type="date" name="tanggal_lahir" class="form-control"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="">Foto</label> 
                        <input type="file" name="foto" class="form-control"> 
                    </div>  
            </div> 
            <div class="card-footer"> 
                <div class="float-end"> 
                    <a href="{{Route('mahasiswa.index')}}" class="btn btn-light">Kembali</a> 
                    <button type="submit" class="btn btn-primary">Simpan Data</button> 
                </div> 
            </div>
            </form>
        </div> 
    </div> 
@endsection