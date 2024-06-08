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
                <div class="card-body">
                    <div class="row">
                    <div class="col-md"> 
                    <form action="{{Route('mahasiswa.search')}}">
                        <input type="text" class="form-control" name="keyword" value="{{old('keyword')}}"
                        placeholder="cari berdasarkan nama / NPM">
                    </form>
                    </div>
                <div class="col-md"> 
                    <div class="float-end">
                    <a href="{{Route('mahasiswa.print')}}" class="btn btn-success" target="__blank"> Cetak Data </a>
                    <a href="{{Route('mahasiswa.create')}}" class="btn btn-primary"> +Tambah Data</a> 
                </div> 
            </div>
            <br> 
            <div class="table-responsive">
            <table class="table"> 
            <thead> 
                <tr> 
                <td>No</td> 
                <td>Jurusan</td> 
                <td>NPM</td> 
                <td>Nama</td> 
                <td>Tanggal Lahir</td> 
                <td>Foto</td> 
                <td>Aksi</td> 
                </tr> 
            </thead>
            <tbody>
                @foreach($mahasiswa as $data)
                <tr>
                <td>{{$loop->iteration}}</td> 
                <td>{{$data->jurusan}}</td> 
                <td>{{$data->npm}}</td> 
                <td>{{$data->nama}}</td> 
                <td>{{Carbon\carbon::parse($data->tanggal_lahir)->format('d-m-Y')}}</td> 
                <td>
                    <img src ="{{asset('storage/foto/'.$data->foto)}}" alt="" width="50">
                </td> 
                <td>
                    <div class="text-center">
                        <form action="{{Route('mahasiswa.destroy',$data->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{Route('mahasiswa.edit',$data->id)}}" class="btn btn-info">Edit</a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table> 
    </div> 

@endsection