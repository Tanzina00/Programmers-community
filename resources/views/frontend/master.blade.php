@include('frontend.include.header')
@yield('top_menu')
  @yield('asksection')         

<section class="feature-section text-center">
                  <div class="container">
                    <div class="row">
                           {{-- Main Content --}}




@yield('maincontent')







     </div>
                    <!-- end of row --> 
                  </div> 
                  <!-- end of container-->    
                </section>
                <!-- end of featured-section -->
                <section class="footer">
                
@include('frontend.include.footer')

                </section>
                <!-- end of footer-section --> 


       <!-- end of container-fluid --> 
     </div>

 <!-- jQuery -->
      <script src="{{ URL::asset('frontend-style/js/jquery.js') }}"></script>
  <script src="{{ URL::asset('frontend-style/js/bootstrap.min.js')}}"></script>

    

     @yield('script')
    <script type="text/javascript">
         $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    </script>
   </body>

   </html>
