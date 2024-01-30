<!-- load JS -->
<script src="js/jquery-3.2.1.slim.min.js"></script>         <!-- https://jquery.com/ -->
<script src="slick/slick.min.js"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
<script src="js/anime.min.js"></script>                     <!-- http://animejs.com/ -->
<script src="js/main.js"></script>
<script>

    function setupFooter() {
        var pageHeight = $('.tm-site-header-container').height() + $('footer').height() + 100;

        var main = $('.tm-main-content');

        if($(window).height() < pageHeight) {
            main.addClass('tm-footer-relative');
        }
        else {
            main.removeClass('tm-footer-relative');
        }
    }

    /* DOM is ready
    ------------------------------------------------*/
    $(function(){

        setupFooter();

        $(window).resize(function(){
            setupFooter();
        });

        $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright
    });

</script>
