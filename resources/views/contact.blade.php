<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/footer.css">
    <title>CEB</title>
</head>
<body>
     <!-- Header -->
     <div class="header">

        <div class="container">
            <!-- Navbar -->
            <div class="content">
                <div class="navbar">
                    <div class="logo">
                        <h1>Ceylon Electricity Board</h1>
                    </div>
                    <div class="navbar-links">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/dashboard">Dashboard</a></li>
                            @if (Auth::check())
                                <li><a href="/login">Sign In</a></li>
                            @else
                                <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                                </li>
                            @endif
                            
                            
                        </ul>
                    </div>
                </div>

                <!-- Showcase -->
                <div class="showcase">
                    <div class="showcase-text">
                        <h1>
                            CALL US!
                        </h1>
                        <p>
                            We’re Just One Call Away!
                        </p>
                        <button class="btn-primary">Login</button>
                        <button class="btn-secondary">Register</button>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    </div>

    <!-- contact -->
    <div class="container">
        <div class="contact">
            <h2>24/7 Service</h2>
            <p>Call our call center for all your electricity related needs. We are always at your service 24 hours, all 7 days of the week.</p>
            <div class="contact-grid grid">
                <div class="contact-table grid">
                    <p>
                        Call Center	
                    </p>
                    <p>
                        1987
                    </p>
                    <p>
                        General Numbers	
                    </p>
                    <p>
                        0112 324 471
                    </p>
                    <p>
                        General Manager’s Office	
                    </p>
                    <p>
                        0112 320 953
                    </p>
                    <p>
                        Distribution Division	
                    </p>
                    <p>
                        0112 335 922
                    </p>
                    <p>
                        Chairman’s Office	
                    </p>
                    <p>
                        0112 431 598
                    </p>
                    <p>
                        Transmission Division	
                    </p>
                    <p>
                        0112 395 735
                    </p>
                    <p>
                        Corporate Strategy Division	
                    </p>
                    <p>
                        0112 330 688
                    </p>
                    <p>
                        Asset Management Division	
                    </p>
                    <p>
                        0112 329 904
                    </p>
                </div>
                <img src="/images/ceb_map.jpeg" alt="">
            </div>
        </div>
    </div>

   

    <!-- footer -->
    <div class="footer">
        <div class="container grid">
            <h3>Copyright &copy; Electricity Board Sri Lanka 2021 </h3>
            <div class="navbar-links">
                 <ul>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="myceb.php">My CEB</a></li>
                    <li><a href="login.php">Sign In</a></li>
                </ul>
            </div>
        </div>
    </div>


</body>
</html>