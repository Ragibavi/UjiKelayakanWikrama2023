@extends('navbar.navbarUser')

<template>
    @section('content')
    <div class="bg-blue-100 w-full h-full">
        <div class="flex flex-col justify-start ml-20 mb-[-150px]">
            <h1 class="text-3xl mt-8">Tambah Data Keterlambatan {{ Auth::user()->name }}</h1>
            <p class="text-[15px] mt-2 ml-[2px]">Home / <span class="font-bold">Data Keterlambatan</span> </p>
        </div>
        <div class="flex items-center justify-center">
            <div class="data-container w-[92%] h-auto bg-white rounded-md mt-[180px]">
                <div class="button mt-6">
                    <a href="{{ route('pages.dateLate.export')}}" class="w-[200px] h-[80px] rounded-md text-white px-3 py-2 text-x ml-2" style="background: rgb(243, 19, 19);">Export Data Keterlambatan</a>
                </div>
                <div class="data-late mt-6 ml-12 mr-12 flex justify-between items-center">
                    <div>
                        <a style="cursor: pointer" class="tampil-data active px-4" onclick="toggleTables(event, 1)">Keseluruhan Data</a>
                        <a style="cursor: pointer" class="tampil-data px-4 ml-2"  onclick="toggleTables(event, 2)">Rekapitulasi Data</a>
                        @if (Auth::check())
                @endif
                    </div>
                </div>
                <hr class="mt-2">
                
                <table id="table1" style="display:table" class="table-all table-full w-[92%] ml-14 mt-2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Informasi</th>
                        <th>Bukti</th>
                      </tr>
                    </thead>
                    <tbody class="">
                        <?php $no=1 ?>  
                        @foreach($lateStudent as $data)  
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $data->student->nis }}
                            <br>
                            {{  $data->student->name}}
                        </td>
                        <td>{{ $data->date_time_late}}</td>
                        <td>{{ $data->information}}</td>
                        <td><img class="w-[150px] h-auto" src="{{asset('images/'. $data->bukti)}}" alt=""></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <table id="table2" style="display:none;" class="table-all table-full w-[92%] ml-14 mt-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jumlah Keterlambatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; 
                        $names = []; 
                        foreach ($lateStudent as $data) : 
                            $nis = $data->student->nis; 
                            $name = $data->student->name; 
                            if (!array_key_exists($name, $names)) {
                                $names[$name] = ['count' => 1, 'data' => $data];
                            } else {
                                $names[$name]['count']++;
                            }
                        endforeach; 
                        foreach ($names as $name => $info) : ?>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $info['data']->student->nis; }}</td>
                                <td>{{ $name }}</td>
                                <td>{{ $info['count'] }}</td>
                                <td>
                                    <div class="button-container">
                                        <div class="edit-btn">
                                            <a href="{{ route('pages.dateLate.detail', $info['data']->student_id) }}" class="edit-button">Detail</a>
                                        </div>
                                            <div class="delete-btn">    
                                                @if($info['count'] >= 3)
                                                <a href="{{ route('pages.cetakPdf', $info['data']->student->id) }}" class="edit-button">Cetak PDF</a>
                                                @endif
                                            </div>
                                    </div>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>
        </div>    
    </div>
@endsection
</template>

<script>

    function toggleTables(event, activeTable) {
        const table1 = document.getElementById('table1');
        const table2 = document.getElementById('table2');
        
        if (activeTable === 1) {
            table1.style.display = '';
            table2.style.display = 'none';
         } else if (activeTable === 2) {
            table1.style.display = 'none';
            table2.style.display = '';
         }

        const elements = document.querySelectorAll('.tampil-data');
            elements.forEach(element => {
            element.classList.remove('active');
        });
        
        const clickedElement = event.target;
        clickedElement.classList.add('active');
    }

     
</script>

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