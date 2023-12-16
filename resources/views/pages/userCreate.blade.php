@extends('navbar.navbar')

<template>
    @section('content')
        <div class="bg-blue-100 w-full h-full">
            <div class="flex flex-col justify-start ml-20">
                <h1 class="text-3xl mt-8">Tambah Data User</h1>
                <p class="text-[15px] mt-2 ml-[2px]">Home / Data User / <span class="font-bold">Tambah Data User</span> </p>
            </div>
            <div class="flex items-center justify-center">
                <div class="form-container w-[92%] h-auto bg-white rounded-md">
                    <form action="{{route('pages.user.store')}}" method="POST">
                        <div class="space-y-12">
                          <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 ml-6 mr-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-full">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                                    <div class="mt-2">
                                      @csrf
                                      <input  type="text" id="name" name="name" rows="3" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nama"></input>
                                    </div>
                                  </div>

                                <div class="col-span-full">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                    <div class="mt-2">
                                      <input  type="email" id="email" name="email" rows="3" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Masukkan Email"></input>
                                    </div>
                                  </div>

                                <div class="col-span-full">
                                    <label for="Password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                    <div class="mt-2">
                                      <input type="password" id="password" name="password" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Masukkan Password">
                                    </div>
                                  </div>

                                <div class="col-span-full">
                                    <label for="rombel" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
                                    <div class="mt-2">
                                        <select name="role" class="block w-full rounded-md pl-3 border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
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