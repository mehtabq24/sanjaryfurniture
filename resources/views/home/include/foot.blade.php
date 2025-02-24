    <!-- Vendor JS-->
    <script src="{{ asset('home/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('home/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('home/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('home/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('home/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template JS -->
<script src="{{ asset('home/assets/js/main.js?v=5.6') }}"></script>
<script src="{{ asset('home/assets/js/shop.js?v=5.6') }}"></script>
<script>
$(document).ready(function () {
    // Get the last part of the URL (slug)
    const pathParts = window.location.pathname.split("/");
    const subcat = pathParts[pathParts.length - 1]; // e.g., "men-belt"

    if (subcat) {
        let activeSubcat = $(".subcategory[data-name='" + subcat + "']");
        if (activeSubcat.length) {
            let productList = activeSubcat.find(".collapse");
            productList.addClass("show");
            activeSubcat.addClass("active");

            let parentAccordion = activeSubcat.closest(".accordion-collapse");
            parentAccordion.addClass("show");
            parentAccordion.prev().find(".accordion-button").removeClass("collapsed").attr("aria-expanded", "true");
        }
    }
});


</script>
</body>
</html>