<main class="col py-4 flex-grow-1">
         @if(session()->has('success'))

         <div class="alert alert-success">
         {{session()->get('success')}}
         </div>

         @endif
      @yield('content')
</main>