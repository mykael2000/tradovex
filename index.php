<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="images/favicon.png">
    <meta content="Tradovex: Bitcoin and digital asset infrastructure" />
    <meta name="description"
        content="Tradovex is the global leader in Bitcoin and blockchain technologies, building the foundations for the financial infrastructure of the future." />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/glightbox.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/flatpickr.min.css">


    <title>Tradovex - Home</title>
    <style>
    @media only screen and (max-width: 600px) {
        #field {
            display: none;
        }
    }

    @media only screen and (min-width: 992px) {
        #field-mobile {
            display: none;
        }
    }
    </style>
</head>

<body>

    <div style="background-color:#fff;" class="site-mobile-menu site-navbar-target">
        <div style="background-color:#fff;" class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div style="background-color:#fff;" class="site-mobile-menu-body"></div>
    </div>

    <nav style="background-color:#fff; padding-top: 10px;" class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <a href="index.html" class="logo m-0 float-start"><img src="tradovexlogo.png"><span
                                    class="text-primary"></span></a>
                        </div>
                        <div class="col-6 text-center ">
                            <ul class="text-black js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li><a class="text-black" href="index.php">Home</a></li>
                                <li><a class="text-black" href="about.php">About Us</a></li>

                                <li><a class="text-black" href="faq.php">FAQ</a></li>
                                <li><a class="text-black" href="index.php#plans">Investment Plans</a></li>
                                <li><a class="text-black" href="contact.php">Contact Us</a></li>
                                <li>
                                    <div id="google_translate_element"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-4 text-end">
                            <a href="#"
                                class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                <span></span>
                            </a>

                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                <li style="padding: 5px;"><a style="background: transparent; border: 1px solid #0f0b85;"
                                        class="text-black btn btn-outline-white-reverse me-4"
                                        href="dash/auth/login.php">Sign
                                        in</a></li>
                                <li style="padding: 5px;"><a style="color: #fff; background-color: #0f0b85;"
                                        class="btn btn-outline-white-reverse me-4" href="dash/auth/register.php">Get
                                        Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero overlay">
        <!-- <img src="images/blob.svg" alt="" class="img-fluid blob"> -->
        <div class="container">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-lg-8 text-center text-lg-start pe-lg-5">
                    <h1 style="font-size: 35px" class="heading text-white mb-3" data-aos="fade-up">
                        <br><br>User-trusted<br>
                        cryptocurrency trading platform
                    </h1>
                    <p style="font-size: 18px; font-weight: 700;" class="text-white mb-8" data-aos="fade-up"
                        data-aos-delay="100">
                        Tradovex is the global leader in Bitcoin and blockchain technology, Real-time and dynamic market
                        statistics,
                        precise candlesticks and custom indicator tools
                        help you to grasp clear trends.
                        <br><br>
                        Our program, unlike any other, guarantees fix daily interest for investors regardless of
                        market conditions.
                    </p>
                    <div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
                        <a style="background-color: #ffc107; border-radius: 25px;" href="dash/auth/register.php"
                            class="btn btn-outline-white-reverse me-4">Register Now</a>

                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="img-wrap">
                        <!-- <img width="60%" height="50%" src="images/screen-s1.png" alt="Image" class="img-fluid rounded"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>

        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
            async>
        {
            "symbols": [{
                    "proName": "FOREXCOM:SPXUSD",
                    "title": "S&P 500"
                },
                {
                    "proName": "FOREXCOM:NSXUSD",
                    "title": "US 100"
                },
                {
                    "proName": "FX_IDC:EURUSD",
                    "title": "EUR to USD"
                },
                {
                    "proName": "BITSTAMP:BTCUSD",
                    "title": "Bitcoin"
                },
                {
                    "proName": "BITSTAMP:ETHUSD",
                    "title": "Ethereum"
                }
            ],
            "showSymbolLogo": true,
            "colorTheme": "dark",
            "isTransparent": true,
            "displayMode": "adaptive",
            "locale": "en"
        }
        </script>
    </div>
    <!-- TradingView Widget END -->
    <div class="container align-items-center">
        <div class="d-flex flex-column flex-sm-row-reverse justify-content-center align-content-center">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                    {
                        "symbol": "BINANCE:BTCUSDT",
                        "width": "100%",
                        "height": "300",
                        "locale": "en",
                        "dateRange": "12M",
                        "colorTheme": "dark",
                        "isTransparent": false,
                        "autosize": false,
                        "largeChartUrl": ""
                    }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                    {
                        "symbol": "BINANCE:ETHUSDT",
                        "width": "100%",
                        "height": "300",
                        "locale": "en",
                        "dateRange": "12M",
                        "colorTheme": "dark",
                        "isTransparent": false,
                        "autosize": false,
                        "largeChartUrl": ""
                    }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                    {
                        "symbol": "BINANCE:BNBUSDT",
                        "width": "100%",
                        "height": "300",
                        "locale": "en",
                        "dateRange": "12M",
                        "colorTheme": "dark",
                        "isTransparent": false,
                        "autosize": false,
                        "largeChartUrl": ""
                    }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>

        </div>
    </div>

    <div class="section">
        <div class="container">
            <h2 style="font-weight: 900; color: #fff;" class="text-center font-weight-bold text-white">International
                Trading Platform
            </h2>
            <h6 class="text-center mb-4">Various coins and diversified coin information. Crypto-crypto, fiat-crypto and
                margin trading. Professional tape and depth.</h6>
            <div class="row justify-content-center">
                <div id="field" class="col-lg-8 ps-lg-2">

                    <div class="d-flex mb-3 service-alt">
                        <div style="padding-right: 200px;">
                            <img height="300px" width="300px" src="images/gl.png">
                        </div>
                        <div>
                            <h3 class="text-white" style="color: #fff;">Global Layout</h3>
                            <p style="font-weight: 700; font-size: 20px;">Many countries have set up local trading
                                service
                                centers to create multi business forms as one；The senior experts team in the financial
                                industry has completed the development, elaborating every detail to ensure the safe,
                                stable
                                and efficient operation of the trading platform</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div style="padding-right: 200px;">
                            <h3 class="text-white" style="color: #fff;">Security System</h3>
                            <p style="font-weight: 700; font-size: 20px;">Professional distributed architecture and anti
                                DoS
                                attack system, separation of hot and cold wallets, multi-dimensional protection of user
                                assets；Offline cold storage,multisignature, Multidimensional certification,ten years
                                financial security team, Multiple security of assets</p>
                        </div>
                        <div>
                            <img height="300px" width="300px" src="images/ss.png">
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div style="padding-right: 200px;">
                            <img height="300px" width="300px" src="images/ste.png">
                        </div>
                        <div>
                            <h3 class="text-white" style="color: #fff;">Smooth Trading Experience</h3>
                            <p style="font-weight: 700; font-size: 20px;">Using an efficient matchmaking and trading
                                engine
                                to ensure a smooth trading experience, it can process millions of orders per second and
                                pay
                                for the smooth and stable operation of more than 20 million online users；UI：Carefully
                                polished details, UI, Strict control of interaction details, Trading can also be a
                                visual
                                enjoyment</p>
                        </div>
                    </div>

                </div>
                <div id="field-mobile" class="col-lg-8 ps-lg-2">

                    <div class="mb-3 service-alt">
                        <div class="d-flex justify-content-center">
                            <img height="150px" width="150px" src="images/gl.png">
                        </div>
                        <div>
                            <h3 class="text-white" style="color: #fff; font-weight:800;">Global Layout</h3>
                            <p style="font-weight: 700; font-size: 15px;">Many countries have set up local trading
                                service
                                centers to create multi business forms as one；The senior experts team in the financial
                                industry has completed the development, elaborating every detail to ensure the safe,
                                stable
                                and efficient operation of the trading platform</p>
                        </div>
                    </div>

                    <div class="mb-3 service-alt">
                        <div class="d-flex justify-content-center">
                            <img height="150px" width="150px" src="images/ss.png">
                        </div>
                        <div>
                            <h3 class="text-white" style="color: #fff; font-weight:800;">Security System</h3>
                            <p style="font-weight: 700; font-size: 15px;">Professional distributed architecture and anti
                                DoS
                                attack system, separation of hot and cold wallets, multi-dimensional protection of user
                                assets；Offline cold storage,multisignature, Multidimensional certification,ten years
                                financial security team, Multiple security of assets</p>
                        </div>
                    </div>

                    <div class="mb-3 service-alt">
                        <div class="d-flex justify-content-center">
                            <img height="150px" width="150px" src="images/ste.png">
                        </div>
                        <div>
                            <h3 class="text-white" style="color: #fff; font-weight:800;">Smooth Trading Experience</h3>
                            <p style="font-weight: 700; font-size: 15px;">Using an efficient matchmaking and trading
                                engine
                                to ensure a smooth trading experience, it can process millions of orders per second and
                                pay
                                for the smooth and stable operation of more than 20 million online users；UI：Carefully
                                polished details, UI, Strict control of interaction details, Trading can also be a
                                visual
                                enjoyment</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-lg-2 mb-4 mb-lg-0">
                    <img height="500px" width="500px" src="images/section3-banner.2c166795.png" alt="Image"
                        class="img-fluid">
                </div>
                <div class="col-lg-5 pe-lg-5">
                    <div class="mb-5">
                        <h2 class="text-white h4">Our advantage</h2>
                        <p>Whether you are through our API, mobile application or website, Tradovex leading trading
                            engine can let you quickly trade safely.</p>
                    </div>
                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-wallet-fill me-4"></span>
                        </div>
                        <div>
                            <h3 class="text-white">High profits</h3>
                            <p>Greater market volatility service, High profits</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-pie-chart-fill me-4"></span>
                        </div>
                        <div>
                            <h3 class="text-white">High commission</h3>
                            <p>Greater market volatility service, High profits</p>
                        </div>
                    </div>

                    <div class="d-flex mb-3 service-alt">
                        <div>
                            <span class="bi-bag-check-fill me-4"></span>
                        </div>
                        <div>
                            <h3 class="text-white">Exchange index</h3>
                            <p>Docking mainstream exchange No longer operate the market</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div id="plans" class="section sec-services">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
                    <h2 class="heading text-white">Expanding Trades</h2>
                    <p>Our suite of technologies enhances the Bitcoin ecosystem, making it easier for individuals and
                        businesses with zero trading experience are successfully making profit.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up">

                    <div style="background-image: url('images/ross-sokolovski-UAFXj9dRpwo-unsplash.jpg')"
                        class="service text-center">
                        <div>

                            <div>
                                <h3 style="font-weight: 800;" class="text-white p-3 font-weight-bolder">ELITE PLAN</h3>
                                <p class="mb-4">Minimum: $300,000</p>
                                <p class="mb-4">Maximum: $6,000,000</p>
                                <p class="mb-4">42%</p>
                                <p class="mb-4">Instant Withdrawal</p>
                                <p><a style="border-radius: 25px;" href="dash/auth/register.php"
                                        class="btn btn-outline-primary py-2 px-3">Signup now</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div style="background-image: url('images/ross-sokolovski-UAFXj9dRpwo-unsplash.jpg')"
                        class="service text-center">
                        <div>
                            <h3 style="font-weight: 800;" class="text-white p-3 font-weight-bolder">ADVANCED PLAN</h3>
                            <p class="mb-4">Minimum: $80,000</p>
                            <p class="mb-4">Maximum: $299,999</p>
                            <p class="mb-4">32%</p>
                            <p class="mb-4">Instant Withdrawal</p>
                            <p><a style="border-radius: 25px;" href="dash/auth/register.php"
                                    class="btn btn-outline-primary py-2 px-3">Signup now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div style="background-image: url('images/ross-sokolovski-UAFXj9dRpwo-unsplash.jpg')"
                        class="service text-center">
                        <div>
                            <h3 style="font-weight: 800;" class="text-white p-3 font-weight-bolder">STANDARD PLAN</h3>
                            <p class="mb-4">Minimum: $10,000</p>
                            <p class="mb-4">Maximum: $79,999</p>
                            <p class="mb-4">23%</p>
                            <p class="mb-4">Instant Withdrawal</p>
                            <p><a style="border-radius: 25px;" href="dash/auth/register.php"
                                    class="btn btn-outline-primary py-2 px-3">Signup now</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">

                    <div style="background-image: url('images/ross-sokolovski-UAFXj9dRpwo-unsplash.jpg')"
                        class="service text-center">
                        <div>
                            <h3 style="font-weight: 800;" class="text-white p-3 font-weight-bolder">BASIC PLAN</h3>
                            <p class="mb-4">Minimum: $699</p>
                            <p class="mb-4">Maximum: $9,999</p>
                            <p class="mb-4">19%</p>
                            <p class="mb-4">Instant Withdrawal</p>
                            <p><a style="border-radius: 25px;" href="dash/auth/register.php"
                                    class="btn btn-outline-primary py-2 px-3">Signup now</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- <div class="section sec-cta overlay" style="background-image: url('images/img-3.jpg')">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-5" data-aos="fade-up" data-aos-delay="0">
				<h2 class="heading">Wanna Talk To Us?</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
			</div>
			<div class="col-lg-5 text-end" data-aos="fade-up" data-aos-delay="100">
				<a href="#" class="btn btn-outline-white-reverse">Contact us</a>
			</div>
		</div>
	</div>
</div> -->


    <!-- <div class="section sec-portfolio bg-light pb-5	">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 mx-auto text-center ">
				<h2 class="heading text-primary mb-3" data-aos="fade-up" data-aos-delay="0">Case Studies</h2>
				<p class="mb-4" data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>

				<div id="post-slider-nav" data-aos="fade-up" data-aos-delay="200">
					<button class="btn btn-primary py-2" class="prev" data-controls="prev">Prev</button>
					<button class="btn btn-primary py-2" class="next" data-controls="next">Next</button>
				</div>

			</div>
		</div>
	</div>

	<div class="post-slider-wrap" data-aos="fade-up" data-aos-delay="300">



		<div id="post-slider" class="post-slider">
			<div class="item">
				<a href="case-study.html" class="card d-block">
					<img src="images/img-1.jpg" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="images/img-2.jpg" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="images/img-3.jpg" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="images/img-4.jpg" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</a>
			</div>

			<div class="item">
				<a href="case-study.html" class="card">
					<img src="images/img-1.jpg" class="card-img-top" alt="Image">
					<div class="card-body">
						<h5 class="card-title">Behind the word mountains</h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
					</div>
				</a>
			</div>
		</div>
	</div>


</div> -->

    <!-- <div class="section sec-testimonial bg-light">
	<div class="container">
		<div class="row mb-5 justify-content-center">
			<div class="col-lg-6 text-center">
				<h2 class="heading text-primary">Testimonials</h2>
			</div>

		</div>


		<div class="testimonial-slider-wrap">
			<div class="testimonial-slider" id="testimonial-slider">
				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('images/img-4.jpg')">

						</div>
						<div class="text">
							<blockquote>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">John Campbell</strong>
								<span>CEO & Co-founder</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('images/img-3.jpg')">

						</div>
						<div class="text">
							<blockquote>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">John Campbell</strong>
								<span>CEO & Co-founder</span>
							</div>
						</div>
					</div>
				</div>

				<div class="item">
					<div class="testimonial-half d-lg-flex bg-white">
						<div class="img" style="background-image: url('images/img-2.jpg')">

						</div>
						<div class="text">
							<blockquote>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							</blockquote>
							<div class="author">
								<strong class="d-block text-black">John Campbell</strong>
								<span>CEO & Co-founder</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->



    <!-- <div class="section sec-news">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-7">
				<h2 class="heading text-primary">Latest News</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4">
				<div class="card post-entry">
					<a href="single.html"><img src="images/img-1.jpg" class="card-img-top" alt="Image"></a>
					<div class="card-body">
						<div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
						<h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						<p class="mt-5 mb-0"><a href="#">Read more</a></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card post-entry">
					<a href="single.html"><img src="images/img-2.jpg" class="card-img-top" alt="Image"></a>
					<div class="card-body">
						<div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
						<h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						<p class="mt-5 mb-0"><a href="#">Read more</a></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card post-entry">
					<a href="single.html"><img src="images/img-3.jpg" class="card-img-top" alt="Image"></a>
					<div class="card-body">
						<div><span class="text-uppercase font-weight-bold date">Jan 20, 2021</span></div>
						<h5 class="card-title"><a href="single.html">Behind the word mountains</a></h5>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						<p class="mt-5 mb-0"><a href="single.html">Read more</a></p>
					</div>
				</div>
			</div>


		</div>
	</div>
</div> -->
    <div class="section sec-features">
        <div class="container ">
            <div class="row mb-5">
                <h2 class="text-white d-flex justify-content-center">How does Tradovex sercure user data?</h2>
                <p class="d-flex justify-content-center">On top of using the three key secure connection protocols
                    explained
                    above.
                    <br>Tradovex secures user data with tools from security services provider Cloudfare.
                    <br>including:
                </p>
            </div>

            <div class="row g-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-database-fill-lock" viewBox="0 0 16 16">
                            <path
                                d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1" />
                            <path
                                d="M3.904 9.223C2.875 8.755 2 8.007 2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-1.364-.125 2.988 2.988 0 0 0-2.197.731 4.525 4.525 0 0 0-1.254 1.237A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777M8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.09 0 .178 0 .266-.003A1.99 1.99 0 0 1 8 15zm0-1.5c0 .1.003.201.01.3A1.9 1.9 0 0 0 8 13c-1.573 0-3.022-.289-4.096-.777C2.875 11.755 2 11.007 2 10v-.839c.457.432 1.004.751 1.49.972C4.722 10.693 6.318 11 8 11c.086 0 .172 0 .257-.002A4.5 4.5 0 0 0 8 12.5" />
                            <path
                                d="M9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                        </svg>
                        <div style="padding-left: 10px;">
                            <h3 class="text-white">Web Application Firewall</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5" />
                        </svg>
                        <div style="padding-left: 10px;">
                            <h3 class="text-white">DDOS attack protection</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                            class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path
                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd"
                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
                        </svg>
                        <div style="padding-left: 10px;">
                            <h3 class="text-white">SSL/TLS encryption between visitors and origin servers.</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section sec-features">
        <div class="container">
            <h2 class="text-white d-flex justify-content-center">Setup an Account</h2>
            <p class="d-flex justify-content-center"> Start trading with ease
            </p>
            <div class="row g-5">
                <p>Get started with these easy steps</p>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature d-flex">
                        <i class="fa-solid fa-check-double"></i>
                        <div>
                            <span> Create a free account instantly with Tradovex. This process only takes 3 - 5 minutes
                                to
                                complete.
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature d-flex">
                        <i class="fa-solid fa-check-double"></i>
                        <div>
                            <span>Credit your wallet and start earning with Tradovex.
                            </span>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature d-flex">
                        <i class="fa-solid fa-check-double"></i>
                        <div>
                            <span>Credit your wallet and start earning with Tradovex.
                            </span>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a style="background-color: #ffc107; border-radius: 25px;" href="dash/auth/register.php"
                        class="btn btn-outline-white-reverse me-4">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section sec-features">
        <div class="container">
            <h2 class="text-white d-flex justify-content-center">Tradovex helps traders win regardless of market
                conditions
            </h2>
            <p class="row mb-5 p-2 d-flex justify-content-center">For every market condition, there’s a trading strategy
                that can profit from it. <br>Tradovex trading bots happen to be really good at reducing average
                acquisition
                costs, <br>directly increasing your profit margins from each trade.</p>
            <div class="row g-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature">
                        <h3 class="text-white">Bear markets</h3>
                        <p>Uses DCA Short bots to borrow and sell coin at the current price and buy them back at a lower
                            price</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature d-flex">
                        <div class="feature">
                            <h3 class="text-white">Bull markets</h3>
                            <p>Uses DCA Long bots to buy the natural dips and sell the spikes as the price rises over
                                time,
                                achieving a better average entry price for your positions</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature d-flex">
                        <div class="feature">
                            <h3 class="text-white">Sideways markets</h3>
                            <p>Uses Grid bots to pick up coin when they hit support levels and sell them when they’re
                                close
                                to resistance levels. This is just a small sample of the many paths you can take to make
                                profits by leveraging the power of the Tradovex trading platform</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature d-flex">
                        <div class="feature">
                            <h3 class="text-white">Trade Automation</h3>
                            <p>Our DCA, Grid, Options, and Futures bots are proven performers that execute your trading
                                strategy at scale. The market never sleeps, and neither do our bots.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature d-flex">
                        <div class="feature">
                            <h3 class="text-white">Automated trading platform</h3>
                            <p>With Tradovex, You can fully automate your trading, this way and it gives you the
                                opportunity
                                to trade, even as a complete beginner. For more advanced traders, it is a great way to
                                not
                                have to sit and watch your screen all day long. We offer a variety of different auto
                                trading
                                products to our clients, and we also support expert advisors trading bots.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section sec-features">
        <div class="container">
            <h2 class="text-white d-flex justify-content-center">How the referral program works
            </h2>
            <p class="row mb-5 p-2 d-flex justify-content-center">Tradovex believes there is no better advertisement
                than
                satisfied clients. No wonder that majority of our new clients are affiliates from our existing clients.
                We
                are proud that our clients like to recommend our financial service to others. Because of this, we are
                pleased to offer one of the strongest online affiliate programs in the financial service industry, with
                a
                high commission rate, customized tools and reports, and timely commission payouts. Tradovex is paying
                for
                the
                popularization of its investment program and anyone can be rewarded. To benefit from this, Create
                account
                and share your unique referral link and get 16% of payments made by your referrals who signed up using
                your
                link.
            </p>
            <p>Our referral program is built right into your dashboard, complete with analytics and banners to use
                across
                the Internet. Add that extra bonus to your portfolio by earning money from referrals on top of your
                trading profits!</p>
            <div class="row g-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature">
                        <h3 class="text-white">Open Account
                        </h3>
                        <p>To open an account, simply click on the “Register New Account” button on the main page. The
                            next
                            page is the registration form that you need to fill out. This shouldn’t take more than a few
                            minutes. Once you’ve done that, you’ll receive an email from us, and you’re done. You are
                            now an
                            official member of our platform !.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature d-flex">
                        <div class="feature">
                            <h3 class="text-white">MAKE YOUR FIRST DEPOSIT
                            </h3>
                            <p>To start growing your Capital, you need to make a deposit. You can do this from the
                                deposit
                                section of your account. There are 4 plans ranging from 19% - 42% Steady and Stable
                                return
                                on your investment. The minimum deposit amount is $699 to get your trading account
                                running,
                                and you are allowed to make as many deposits as you want. However, every deposit is not
                                treated as a separate investment, your investment plan will be upgraded when you meet
                                the
                                requirements on deposit to be on any of our specific plan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

include "includes/footer.php";

?>