<footer id="react-footer" class="react-footer home-main">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 md-mb-30">
                    <div class="footer-widget footer-widget-1">
                        <div class="footer-logo white">
                            <a href="{{ route('app.landing') }}" class="logo-text">
                                <img src="{{ asset('app/images/orgup.png') }}" alt="Logo" width="80">
                            </a>
                        </div>
                        <h5 class="footer-subtitle">
                            Tingkatkan keterampilan manajemen organisasi dengan OrgUp! Akses kursus gratis, artikel, dan
                            forum diskusi.
                        </h5>
                        <ul class="footer-address">
                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg><a href="mailto:info@yourdmain.com"> info@orgup.my.id </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 md-mb-30">
                    <div class="footer-widget footer-widget-2">
                        <h3 class="footer-title">About Us</h3>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('app.about') }}">Tentang Kami</a></li>
                                <li><a href="{{ route('app.course.index') }}">Kelas Kami</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 md-mb-30">
                    <div class="footer-widget footer-widget-3">
                        <h3 class="footer-title">Useful Links</h3>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ route('app.article.index') }}">Artikel</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget footer-widget-4">
                        <h3 class="footer-title">
                            Subscribe
                        </h3>
                        <div class="footer3__form">
                            <p>Dapatkan notifikasi terbaru dari kami</p>
                            <form action="#">
                                <input type="email" placeholder="Enter your email">
                                <button class="footer3__form-1">
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="react-copy-left">© 2023 <a href="#">OrgUp.</a> All Rights Reserved</div>
        </div>
    </div>
</footer>
