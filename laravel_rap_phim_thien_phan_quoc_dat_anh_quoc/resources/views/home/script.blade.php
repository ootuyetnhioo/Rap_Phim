<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./app.js"></script>
<script>
    function activePhimDangChieu() {
        if (document.getElementById("phimdangchieu").classList.contains('active') == false) {
            document.getElementById("phimdangchieu").classList.add("active");
            document.getElementById("phimsapchieu").classList.remove("active");
            document.getElementById("buttonphimdangchieu").classList.add("active");
            document.getElementById("buttonphimsapchieu").classList.remove("active");
        }
        /* else if (document.getElementById("phimdangchieu").classList.contains('active') == false && document
                   .getElementById("phimsapchieu").classList.contains('active') == true) {
                   document.getElementById("phimdangchieu").classList.remove("active");
               } */

    }

    function activePhimSapChieu() {
        if (document.getElementById("phimsapchieu").classList.contains('active') == false) {
            document.getElementById("phimsapchieu").classList.add("active");
            document.getElementById("phimdangchieu").classList.remove("active");
            document.getElementById("buttonphimsapchieu").classList.add("active");
            document.getElementById("buttonphimdangchieu").classList.remove("active");
        }
        /*  else if (document.getElementById("phimsapchieu").classList.contains('active') == false && document
                    .getElementById("phimdangchieu").classList.contains('active') == true) {
                    document.getElementById("phimsapchieu").classList.remove("active");
                } */

    }

    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        dot: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })
</script>
</body>

</html>
