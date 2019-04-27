
@include('layouts.includes.head')  
<body>

    @include('layouts.includes.navbar')  

    <!-- Page content -->
    <div class="page-content">

        @include('layouts.includes.sidebar')  


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
         
            <!-- /page header -->

            
            @yield('content')
            

            <!-- Footer here -->
 
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    @include('layouts.includes.scripts')  
</body>

</html>