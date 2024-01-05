@extends('navbar.navbarUser')

<template>
    @section('content')
    <div class="bg-blue-100 w-full h-full">
        <div class="flex flex-col justify-start ml-20 mb-[-150px]">
            <h1 class="text-3xl mt-8">Data Siswa {{ Auth::user()->name }}</h1>
            <p class="text-[15px] mt-2 ml-[2px]">Home / <span class="font-bold">Data Siswa</span> </p>
        </div>
        <div class="flex items-center justify-center">
            <div class="data-container w-[92%] h-auto bg-white rounded-md mt-[180px]">
                <div class="data-late mt-6 ml-12 mr-12 flex justify-between items-center">
                    <div>
                    </div>
                </div>
                <hr class="mt-2">
                
                <table class="table-full w-[92%] ml-14 mt-2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Rombel</th>
                        <th>Rayon</th>
                      </tr>
                    </thead>
                    <tbody class="">
                        <?php $no=1 ?>
                        @foreach ($total as $data)
                        <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->name}}</td>
                        <td>{{ $data->rombel->rombel}}</td>
                        <td>{{ $data->rayon->rayon}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>    
    </div>
    @endsection
</template>



<style scoped>

    .data-late a.tampil-data.active {
        color: rgb(0, 145, 255);
        
    }

    .table-full {
        border-collapse: collapse;
    }

    .table-full th, .table-full td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {background-color: rgb(0, 145, 255, .2);}

</style>
