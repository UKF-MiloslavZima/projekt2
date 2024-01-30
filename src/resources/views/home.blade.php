<!DOCTYPE html>
<html lang="en">
@include('parts.header')

<body>
<div id="tm-bg"></div>
<div id="tm-wrap">
    <div class="tm-main-content">
        <div class="container tm-site-header-container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-md-col-xl-6 mb-md-0 mb-sm-4 mb-4 tm-site-header-col">
                    <div class="tm-site-header">
                        <h1 class="mb-4">POP design</h1>
                        <img src="img/underline.png" class="img-fluid mb-4">
                        <p>New HTML Template with pop up pages and use this layout for your website</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="content">
                        <div class="grid">
                            @include('parts.welcome')
                            @include('parts.team')
                            @include('parts.work')
                            @include('parts.contact')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p class="small tm-copyright-text">Copyright &copy; <span class="tm-current-year">2020</span> Your Company.

                Design: <a rel="nofollow" href="https://www.tooplate.com" class="tm-text-highlight">Tooplate</a></p>
        </footer>
    </div> <!-- .tm-main-content -->
</div>
@include('parts.footer')

</body>
</html>
