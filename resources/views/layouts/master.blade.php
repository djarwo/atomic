<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Atomic | {{ $data['setPageTitle'] == '' ? '' : $data['setPageTitle']}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/apps/css/custom.css') }}" rel="stylesheet" type="text/css">
        {{-- select2 --}}
        <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />    
        <!-- END THEME LAYOUT STYLES -->
        {{--<link rel="shortcut icon" href="favicon.ico" />--}}
        @yield('css')        
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
              ]) !!};           
        </script>
      </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
      @include('layouts.header')
         <div class="clearfix"> </div>
          <div id="loader" style="border-radius:50%;"></div>
        
            <div class="page-container">
                <div id="myDiv" class="animate-bottom">
                @include('layouts.sidebar')
                @yield('content')
            </div>
         </div>
      <script src="{{ asset('js/app.js') }}"></script>
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('assets/pages/scripts/moment.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('assets/global/plugins/initialjs/initial.min.js') }}"></script>
        {{-- select2 --}}
        <script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-markdown/lib/markdown.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/pages/scripts/form-validation.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                showPage();
            }); 

            function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
            }

            function search_menu() {
                var input, filter, ul, li, a, i,h1,h2;
                input = document.getElementById("search_menu");
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL");
                li = ul.getElementsByTagName("li");
                for (i  = 0; i < li.length; i++) {
                    a   = li[i].getElementsByTagName("a")[0];
                    h1  = li[i].getElementsByTagName("h3")[0];
                    if(!h1){
                        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                            var check           = false;
                        } else {
                            li[i].style.display = "none";
                            var check           = true;
                        }
                    }
                }

                if(check!=false){
                    $('li.heading').hide();
                }else{
                    $('li.heading').show();
                }
            }

            function convertToRupiah(objek) {
                separator = ".";
                a = objek.value;
                b = a.replace(/[^\d]/g,"");
                c = "";
                panjang = b.length; 
                j = 0; 
                for (i = panjang; i > 0; i--) {
                    j = j + 1;
                    if (((j % 3) == 1) && (j != 1)) {
                    c = b.substr(i-1,1) + separator + c;
                    } else {
                    c = b.substr(i-1,1) + c;
                    }
                }
                objek.value = c;
            }  

            function convertToRupiahJs(angka)
            {
                var rupiah = '';		
                var angkarev = angka.toString().split('').reverse().join('');
                for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
                return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
            }
            
            $(document).ready(function(){
                $('.profile').initial();
            });
            $(document).ready(function(){
                    setTimeout(function(){
                        $(".alert").fadeIn('slow');
                    }, 500);
                    setTimeout(function(){
                        $(".alert").fadeOut('slow');
                    }, 5000);

                    setTimeout(function(){
                        $(".error").fadeIn('slow');
                    }, 500);
                    setTimeout(function(){
                        $(".error").fadeOut('slow');
                    }, 5000);

                    setTimeout(function(){
                        $(".col-md-10.has-error").attr('class','col-md-10');
                    }, 10000);

                    setTimeout(function(){
                        $(".col-md-8.has-error").attr('class','col-md-8');
                    }, 10000);

                    setTimeout(function(){
                        $(".col-md-5.has-error").attr('class','col-md-5');
                    }, 10000);

                    setTimeout(function(){
                        $(".col-md-4.has-error").attr('class','col-md-4');
                    }, 10000);

                    setTimeout(function(){
                        $(".col-md-2.has-error").attr('class','col-md-2');
                    }, 10000);

                    setTimeout(function(){
                        $("form-group.has-error").attr('class','form-group');
                    }, 10000);

                    setTimeout(function(){
                        $(".col-md-1.has-error").attr('class','col-md-1');
                    }, 10000);

                    setTimeout(function(){
                        $(".text-danger").html('');
                    }, 10000);
                });
        </script>
        @yield('close_html')

        @yield('add_script')
    </body>
</html>
