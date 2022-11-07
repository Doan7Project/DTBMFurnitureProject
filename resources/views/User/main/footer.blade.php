<!-- JavaScript Bundle with Popper -->
<style>
    /*---------------------
          Footer
        -----------------------*/
    
    
    .footer {
        background: #5ea0aa;
        /* background: #17a2b8; */
        padding-top: 30px;
        padding-bottom: 0;
        font-family: "Cairo", sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    
    .footer__about {
        margin-bottom: 30px;
    }
    
    .footer__about ul li {
        font-size: 14px;
        color: white;
        line-height: 36px;
        list-style: none;
        font-family: "Cairo", sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    
    .footer__about__logo {
        margin-bottom: 15px;
    }
    
    .footer__about__logo a {
        display: inline-block;
    }
    
    .footer__widget {
        margin-bottom: 30px;
        overflow: hidden;
    }
    
    .footer__widget h6 {
        color: #1c1c1c;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .footer__widget ul {
        width: 50%;
        float: left;
    }
    
    .footer__widget ul li {
        list-style: none;
        font-family: "Cairo", sans-serif;
        -webkit-font-smoothing: antialiased;
        color: white;
    
    }
    
    .footer__widget ul li a {
        /* color: #1c1c1c; */
        font-size: 14px;
        line-height: 32px;
        color: white;
        text-decoration: none;
    
    }
    
    .footer__widget ul li a:hover {
        transform: scale(2.0);
    }
    
    .footer__widget p {
        font-size: 14px;
        color: #1c1c1c;
        margin-bottom: 30px;
    }
    
    .footer__widget form {
        position: relative;
        margin-bottom: 30px;
    }
    
    .footer__widget form input {
        width: 100%;
        font-size: 16px;
        padding-left: 20px;
        color: #1c1c1c;
        height: 46px;
        border: 1px solid #ededed;
    }
    
    .footer__widget form input::placeholder {
        color: #1c1c1c;
    }
    
    .footer__widget form button {
        position: absolute;
        right: 0;
        top: 0;
        padding: 0 26px;
        height: 100%;
    }
    
    .footer__widget .footer__widget__social a {
        display: inline-block;
        height: 41px;
        width: 41px;
    
        font-size: 16px;
        color: #C0C0C0;
        /* border: 1px solid #ededed; */
        /* border-radius: 50%; */
        line-height: 38px;
        text-align: center;
        /* background: #ffffff; */
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
        margin-right: 10px;
        margin-bottom: 7px;
    }
    
    d .footer__widget .footer__widget__social a:last-child {
        margin-right: 0;
    }
    
    .footer__widget .footer__widget__social a:hover {
        /* background: #17a2b8;
       
        border-color: #ffffff; */
        transform: scale(1.2);
        color: #ffffff;
    }
    
    
    
    .footer__copyright {
        border-top: 1px solid #ebebeb;
        padding: 15px 0;
        overflow: hidden;
        margin-top: 20px;
    }
    
    .footer__copyright__text {
        font-size: 14px;
        color: white;
        float: left;
        line-height: 25px;
    }
    
    .footer__copyright__payment {
        float: right;
    }
    
    .links {
        padding-top: 30px;
    }
    
    .sologan {
        color: #FFDAB9;
        font-family: "Noto Nastaliq Urdu rev=1" !important;
        font-style: normal;
        font-stretch: normal;
        line-height: initial;
        font-size: 27px;
    font-weight: bold;
    }
    </style>
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href=""><img src="images/mim.png" width="200px" alt=""></a>
                        </div>
                        <ul>
                            <li><b style="color: #FFDAB9">Address:</b> 590 Cách mạng tháng 8 - district 3- HCM city</li>
                            <li><b style="color: #FFDAB9">Phone:</b> +65 11.188.888</li>
                            <li><b style="color: #FFDAB9">Email:</b> hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1 links">
                    <div class="footer__widget">
    
                        <ul>
                            <h6 style="color: #FFDAB9">Links</h6>
                            <li><a href="#">Home</a></li>
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="{{ url('/contact') }}">Contact us</a></li>
                            <li><a href="#">Furniture menu</a></li>
    
    
                        </ul>
                        <ul>
                            <h6 style="color: #FFDAB9">Policy</h6>
                            <li><a href="#">Payment policy</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                            <li><a href="#">Warranty Policy</a></li>
    
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 links ">
                    <div class="footer__widget">
    
                        <div class="footer__widget__social">
                            <ul>
                                <li> <a href="#"><i class="fa fa-facebook"></i> </a>Facebook</li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a>Instagram</li>
                                <li> <a href="#"><i class="fa fa-twitter"></i> </a>Twitter</li>
                                <li> <a href="#"><i class="fa fa-linkedin"></i> </a>Linkedin</li>
                                <li> <a href="#"><i class="fa fa-medium"></i> </a>Medium</li>
    
                            </ul>
    
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="sologan ">Change the look of your house, change the perspective of others</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="" target="_blank">DTBM</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="images/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
    
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    
   @include('User.main.js')