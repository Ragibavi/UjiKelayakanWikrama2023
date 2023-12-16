<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/dropdown.js')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
    <title>Rekam Keterlambatan | SMK WIKRAMA BOGOR</title>
</head>
<body>
  <nav class="bg-gray-800">
    <div class="max-w-auto mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between">
        <p class="text-white text-2xl ml-12 ">Rekam Keterlambatan</p>
        <div class="flex items-center flex-grow-0 mr-12">
          <a href="{{ route('pages.dashboardAdmin')}}" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium">Dashboard</a>
          <a href="#" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium relative group" id="data-master-link">
            Data Master
            <div class="dropdown-container mt-0 pt-5 ml-[110px]">    
              <div class="absolute z-10 hidden bg-white text-gray-700 w-[155px] h-[200px] rounded-md shadow-lg" id="data-master-dropdown">
                <a href="{{ route('pages.rombel')}}" class="dropdown-item w-[115px] block ml-[22.5px] px-4 py-2 text-sm hover:bg-gray-100 hover:scale-105">Data Rombel</a>
                <a href="{{ route('pages.rayon')}}" class="dropdown-item w-[115px] block ml-[22.5px] px-4 py-2 text-sm hover:bg-gray-100 hover:scale-105">Data Rayon</a>
                <a href="{{ route('pages.student')}}" class="dropdown-item w-[115px] block ml-[22.5px] px-4 py-2 text-sm hover:bg-gray-100 hover:scale-105">Data Siswa</a>
                <a href="{{ route('pages.user')}}" class="dropdown-item w-[115px] block ml-[22.5px] px-4 py-2 text-sm hover:bg-gray-100 hover:scale-105">Data User</a>
              </div>
            </div>
          </a>
          <a href="{{ route('pages.dateLate')}}" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium">Data Keterlambatan</a>
          <a href="{{ route('logout') }}" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium">Logout</a>
         
        </div>
      </div>
    </div>
  </nav>

    @yield('content')

      <style scoped>
        .dropdown-container {
          position: absolute;   
        }

        #data-master-dropdown::-webkit-scrollbar {
          display: none;
        }

        #data-master-dropdown {
          -ms-overflow-style: none;
          scrollbar-width: none;
          transition: max-height 0.5s ease-in-out;
          max-height: 0;
          overflow: auto;
        }

        #data-master-dropdown.show {
          max-height: 200px; 
        }


      </style>
</body>
</html>