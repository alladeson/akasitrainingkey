<div class="header-top-area">
    <div class="container-fluid">
        <div class="header-top-inner">
            <div class="row align-items-center">
                <div class="col-xl-9 col-lg-9 d-none d-lg-block">
                    <div class="header-top-icon">
                        <a href="tel:(603)8527935"><i class="fas fa-phone"></i>(603) 852 79 35</a>
                        <a href="mailto:akasi-commercial@akasigroup.com"><i class="fal fa-envelope"></i>akasi-commercial@akasigroup.com</a>
                        <i class="fal fa-map-marker-alt"></i><span>1045 Elm St Suite 204, Manchester, NH 03101 USA</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                    <div class="header-top-login d-flex f-right">
                        <div class="header-user-login p-relative">
                            <span><a class="user-btn-sign-up" @if (Cookie::get('currency') == 'fcfa' || Cookie::get('currency') == null) href="{{route('settings.set.currency').'?currency=eur'}}" @endif @if (Cookie::get('currency') == 'eur') style="color: blue;" @endif>EUR</a></span>
                            <span><a class="user-btn-sign-up" @if (Cookie::get('currency') == 'eur' || Cookie::get('currency') == null) href="{{route('settings.set.currency').'?currency=fcfa'}}" @endif @if (Cookie::get('currency') == 'fcfa') style="color: blue;" @endif>FCFA</a></span>
                        </div>
                        <div class="header-social d-none d-lg-block">
                            <a href="https://www.facebook.com/profile.php?id=61550846039048" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/Akasi_LearningK" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/akasi_learningk/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/akasi-learning-key" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
