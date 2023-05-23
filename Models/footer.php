<footer class="footer" style="margin-top: 10%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6" style="margin-right:12%;">
                <div class="widget">
                    <img src="assets/img/logo.png" alt="about" />
                    <p>Rruga Fehmi Agani, 10000, Prishtinë, Kosovë</p>
                    <h6><span>Call us: </span>(+383) 45 208 766</h6>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget">
                    <h4>Account</h4>
                    <ul>
                        <li><a href="<?php if(isset($_SESSION['user'])) {echo 'user.php?mode=info';} else {echo '#';} ?>">My Account</a></li>
                        <li><a href="<?php if(isset($_SESSION['user'])) {echo 'watchlist.php';} else {echo '#';} ?>">Watchlist</a></li>
                        <li><a href="<?php if(isset($_SESSION['user'])) {echo 'watchlist.php';} else {echo '#';} ?>">Collections</a></li>
                        <li><a href="faq.php">Ask Questions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget">
                    <h4>Copyright ©</h4>
                    <p>FlixFeast is a Free Movies and Tv-Shows catalog site with zero ads. We give you info without having to register or paying. We are also trying to bring rating and content watching/downloading. </p>
                    <p><i><b>© FlixFeast</b></i></p>
                    <p>Made and Owned By <i><b>BEBEÇ</b></i></p>
                </div>
            </div>
        </div>
        <hr />
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="copyright-content">
                        <a href="#" class="scrollToTop">
                            Back to top<i class="icofont icofont-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>