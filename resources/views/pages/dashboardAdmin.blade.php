@extends('navbar.navbar')

<template>
    @section('content')
        <div class="bg-blue-100 w-full h-full">
            <div class="flex flex-col justify-start ml-20">
                <h1 class="text-3xl mt-8">Dashboard</h1>
                <p class="text-[15px] mt-2 ml-[2px]">Home / Dashboard</p>
                <div class="flex flex-row mr-20">
                    <div class="basis-[50%] bg-white rounded-md h-[200px] mt-8 mr-4">
                        <p class="text-3xl ml-4 mt-2 " >Peserta Didik</p>
                        <p class="text-8xl ml-4 mt-2 "><ion-icon class="ml-4 mr-8 mt-2 text-7xl" name="person-outline"></ion-icon> {{ $students->count() }}</p>
                    </div>
                    <div class="basis-[23.5%] bg-white rounded-md h-[200px] mt-8 mr-4">
                        <p class="text-3xl ml-4 mt-2 " >Administrator</p>
                        <p class="text-8xl ml-4 mt-2 "><ion-icon class="ml-4 mr-8 mt-2 text-7xl" name="person-outline"></ion-icon>{{ App\Models\User::where('role', 'admin')->count() }} </p>
                    </div>
                    <div class="basis-[23.5%] bg-white rounded-md h-[200px] mt-8 ">
                        <p class="text-3xl ml-4 mt-2 " >Pembimbing Siswa</p>
                        <p class="text-8xl ml-4 mt-2 "><ion-icon class="ml-4 mr-8 mt-2 text-7xl" name="person-outline"></ion-icon>{{ App\Models\User::where('role', 'user')->count()}} </p>
                    </div>
                </div>
                <div class="flex flex-row mr-20">
                    <div class="basis-[51%] bg-white rounded-md h-[200px] mt-8 mr-4">
                        <p class="text-3xl ml-4 mt-2 " >Rombel</p>
                        <p class="text-8xl ml-4 mt-2 "><ion-icon class="ml-4 mr-8 mt-2 text-7xl" name="bookmark-outline"></ion-icon> {{ App\Models\Rombel::count()}}</p>
                    </div>
                    <div class="basis-[49%] bg-white rounded-md h-[200px] mt-8 mr-4">
                        <p class="text-3xl ml-4 mt-2 " >Rayon</p>
                        <p class="text-8xl ml-4 mt-2 "><ion-icon class="ml-4 mr-8 mt-2 text-7xl" name="bookmark-outline"></ion-icon> {{ App\Models\Rombel::count()}} </p>
                    </div>
                </div>
            </div>
        </div>

    @endsection
</template>