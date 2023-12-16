@extends('navbar.navbar')

<template>
    @section('content')
    <div class="bg-white w-full h-full">
        <div class="flex flex-col justify-start ml-20 mb-[-150px]">
            <h1 class="text-3xl mt-8">Tambah Data Keterlambatan {{ Auth::user()->name }}</h1>
            <p class="text-[15px] mt-2 ml-[2px]">Home / <span class="font-bold">Data Keterlambatan</span> </p>
            <h1 class="text-2xl text-blue-200 mt-8"><span class="font-bold text-3xl text-blue-300">{{ $studentLate->name }}</span> |
                {{ $studentLate->nis }} | {{ $studentLate->rombel->rombel }} | {{ $studentLate->rayon->rayon}}</h1>
        </div>
        <div class="mt-12 ml-16 mr-12 flex flex-row">
            <?php 
                $no = 1;    
            ?>
            @foreach ($lateAll as $data)
            <div class="data-card w-[25%] h-auto bg-blue-100 rounded-md mt-[180px] ml-4">
                <div class=" justify-start ml-4">
                    <h1 class="text-3xl mt-4">Keterlambatan Ke-{{$no++}}</h1>

                    <div class="reason ml-4 mb-4">
                        <p class="text-2xl mt-2"> {{$data->date_time_late}}</p>
                        <p class="text-2xl mt-2"> {{$data->information}}</p>
                    </div>
                    
                    <div class="center-img flex justify-center pb-4">
                        <img class="w-[300px] h-auto" src="{{asset('images/'. $data->bukti)}}" alt="">
                    </div>
                </div>
            </div>
            @if ($loop->iteration % 4 === 0 && $loop->remaining)
                </div>
                <div class="mt-[-100px] ml-16 mr-12 flex flex-row w-[92%]">
            @endif
            @endforeach  
        </div>  
    </div>
    <div class="padding-bottom pb-20"></div>
@endsection
</template>