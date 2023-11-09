<!DOCTYPE html>
<html lang="en" light>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   @include('sekolah.partials.link')
   <title>{{$title}}</title>
</head>

<body
   class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
   @include('sekolah.partials.navbar')
   @include('sekolah.partials.sidenav')

   <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14 min-h-screen ">
         @yield('content')
      </div>
   </div>

   @hasSection ('script')
   @yield('script')
   @endif
</body>

</html>