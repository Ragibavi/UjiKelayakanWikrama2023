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
          <a href="{{ Route('pages.user.dashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium">Dashboard</a>
          <a href="{{ Route('pages.user.student')}}" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium">Data Siswa</a>
          <a href="{{ Route('pages.user.dateLate')}}" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium">Data Keterlambatan</a>
          <a href="{{ route('logout') }}" class="text-gray-300 hover:text-white px-3 py-2 text-xl mt-1 rounded-md text-sm font-medium">Logout</a>
        </div>
      </div>
    </div>
  </nav>

    @yield('content')
</body>
</html>