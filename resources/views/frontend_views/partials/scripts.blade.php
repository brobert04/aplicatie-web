<!-- inject:js -->
<script src="{{asset('../frontend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{asset('../frontend/assets/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{asset('../frontend/assets/js/demo.js')}}"></script>
<!-- End custom js for this page-->
<script>
    let search = document.querySelector('#search')
    let searchBar = document.querySelector('#searchBar')
    search.addEventListener('click', function(){
        searchBar.hidden = !searchBar.hidden
    })
</script>
@yield('custom-js')
