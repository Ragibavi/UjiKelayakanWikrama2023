@extends('navbar.navbar')

<template>
    @section('content')
        <div class="bg-blue-100 w-full h-full">
            <div class="flex flex-col justify-start ml-20">
                <h1 class="text-3xl mt-8">Tambah Data Keterlambatan</h1>
                <p class="text-[15px] mt-2 ml-[2px]">Home / Data Keterlambatan / <span class="font-bold">Tambah Data Keterlambatan</span> </p>
            </div>
            <div class="bg-blue-100 w-full h-full flex items-center justify-center">
                <div class="form-container w-[92%] h-auto bg-white rounded-md mt-[-300px]">
                    <form action="{{route('pages.student.update', $students->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-12">
                          <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 ml-6 mr-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-full">
                                    <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NIS</label>
                                    <div class="mt-2">
                                      <input value="{{ $students->nis }}"  type="number" id="nis" name="nis" rows="3" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Masukkan NIS"></input>
                                    </div>
                                  </div>
                                  
                                <div class="col-span-full">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                                    <div class="mt-2">
                                      <input value="{{ $students->name }}"  type="text" id="name" name="name" rows="3" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nama "></input>
                                    </div>
                                  </div>

                                <div class="col-span-full">
                                    <label for="rombel" class="block text-sm font-medium leading-6 text-gray-900">Rombel</label>
                                    <div class="mt-2">
                                      <select name="rombel_id" id="rombel_id" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="{{ $students->rombel_id }}">{{ $students->rombel->rombel}}</option>
                                        @foreach($rombel as $data)
                                        <option value="{{ $data->id }}">{{ $data->rombel}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                <div class="col-span-full">
                                    <label for="rayon_id" class="block text-sm font-medium leading-6 text-gray-900">Rayon</label>
                                    <div class="mt-2">
                                        <select name="rayon_id" id="rayon_id" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="{{ $students->rayon_id }}">{{ $students->rayon->rayon}}</option>
                                            @foreach($rayon as $data)
                                            <option value="{{ $data->id }}">{{ $data->rayon}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                  </div>

                            </div>
                          </div>
                        </div>   
                        <div class="mt-6 flex items-center justify-end gap-x-6 mr-4">
                          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                      </form>
                </div>
            </div>
            
        </div>
    @endsection
</template>