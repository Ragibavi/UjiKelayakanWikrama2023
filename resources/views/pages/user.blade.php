@extends('navbar.navbar')

<template>
    @section('content')
    <div class="bg-blue-100 w-full h-full">
        <div class="flex flex-col justify-start ml-20 mb-[-150px]">
            <h1 class="text-3xl mt-8">Tambah Data User {{ Auth::user()->name }}</h1>
            <p class="text-[15px] mt-2 ml-[2px]">Home / <span class="font-bold">Data User</span> </p>
        </div>
        <div class="flex items-center justify-center">
            <div class="data-container w-[92%] h-[500px] bg-white rounded-md mt-[180px]">
                <div class="button mt-6">
                    <a href="{{ route('pages.user.create')}}" class="w-[200px] h-[80px] rounded-md text-white px-3 py-2 text-x ml-12" style="background: rgb(0, 145, 255);">Tambah Data User</a>
                </div>
                <div class="data-late mt-6 ml-12 mr-12 flex justify-between items-center">
                    <div>
                    </div>
                    <div class="search">
                        <div class="search-input mr-4">
                            <input type="text" class="w-[200px] border px-4 rounded" placeholder="Search">
                        </div>
                    </div>
                </div>
                <hr class="mt-2">
                
                <table class="table-full w-[92%] ml-14 mt-2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>User_id</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="">
                        <?php $no=1 ?>
                        @foreach ($users as $data)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->password }}</td>
                        <td>
                            <div class="button-container">
                            <div class="edit-btn">
                                <a href="{{route('pages.user.edit', $data->id)}}" class="edit-button">Edit</a>
                            </div>
                            <form action="{{route('pages.user.destroy', $data->id)}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <div class="delete-btn">    
                                    <button type="submit" style="color: #ffffff;" class="delete-button" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </div>
                            </form>
                        </div>
                    </td>
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

    .button-container {
        display: flex;
        gap: 8px;
    }

.delete-button {
    display: inline-block;
    padding: 8px 12px;
    text-decoration: none;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}

.edit-button {
    display: inline-block;
    padding: 8px 12px;
    text-decoration: none;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}

.edit-btn{
    position: relative;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    height: 37px;
    transition: background-color 0.3s;
}

.delete-btn {
    position: relative;
    background-color: #e74c3c;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.delete-button:hover {
    background-color: #c0392b;
}

.delete-button:active {
    background-color: #922b21;
}

.edit-button:hover,
.delete-button:hover {
    filter: brightness(1.2);
}

.edit-button:active,
.delete-button:active {
    filter: brightness(0.8);
}

</style>