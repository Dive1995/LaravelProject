<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/plans.css">
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
                            @else
                            <li><a href="/login">Sign In</a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Showcase -->
                <div class="showcase">
                    <div class="showcase-text">
                        <h1>
                            Tariff Plans
                        </h1>
                      
                        <!-- <button class="btn-primary">Login</button> -->
                        <!-- <button class="btn-secondary">Register</button> -->
                    </div>
                    
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    </div>


    <div class="container">
        <div class="plans ">
            <h2>Domestic Purpose</h2>
            <p>This rate applies to supply of electricity used for domestic purposes in private residences.</p>

            <p> Utilities Commission of Sri Lanka has approved the revised tariffs based on Increasing block tariff with effect from 16th September, 2014.
            If the consumption is between 0-60 kWh per month the following tariffs will be applicable</p>



            <table border="1" cellpadding="1" cellspacing="1" style="width:650px">
                <tbody>
                    <tr>
                        <th ><span ><strong>Monthly Consumption (1) kWh</strong></span></th>
                        <th><span><strong>Unit Charge (Rs./kWh)</strong></span></th>
                        <th><span><strong><span>Fixed Charge (Rs./month)</span></strong></span></th>
                    </tr>
                    <tr>
                        <td >0-30</td>
                        <td>2.50</td>
                        <td>30.00</td>
                    </tr>
                    <tr>
                        <td>31-60</td>
                        <td>4.85</td>
                        <td>60.00</td>
                    </tr>
                </tbody>
            </table>


            <p>If the consumption is above 60 kWh per month the following tariffs will be applicable</p>


            <table border="1" cellpadding="1" cellspacing="1" style="width:650px">
                <tbody>
                    <tr>
                        <th><span><strong>Monthly Consumption (<sup>1</sup>) kWh</strong></span></th>
                        <th><span><strong>Unit charge (Rs/kWh)</strong></span></th>
                        <th><span><strong>Fixed charge (Rs/month)</strong></span></th>
                    </tr>
                    <tr>
                        <td>0-60</td>
                        <td>7.85</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>61-90</td>
                        <td>10.00</td>
                        <td>90.00</td>
                    </tr>
                    <tr>
                        <td>91-120</td>
                        <td>27.75</td>
                        <td>480.00</td>
                    </tr>
                    <tr>
                        <td>121-180</td>
                        <td>32.00</td>
                        <td>480.00</td>
                    </tr>
                    <tr>
                        <td>&gt;180</td>
                        <td>45.00</td>
                        <td>540.00</td>
                    </tr>
                </tbody>
            </table>



            <h2>General Purpose</h2>
            <p>Supply of electricity to be used in shops, offices, banks, warehouses, public buildings, hospitals, educational establishments, places of entertainment and other premises not covered under any other tariffs.</p>
            <p>This rate shall apply to supplies at each individual point of supply delivered and metered at 400/230 Volt nominal and where the contract demand is less than or equal to 42 kVA.</p>

            <table border="1" cellpadding="1" cellspacing="1" style="width:650px">
                <tbody>
                    <tr>
                        <th><span><strong>Consumption per month (kWh)</strong></span></th>
                        <th><span><strong>Energy Charge (LKR/kWh)</strong></span></th>
                        <th><span><strong>Fixed Charge (LKR/month)</strong></span></th>
                        <th><span><strong>Maximum Demand Charge per month (LKR/kVA)</strong></span></th>
                    </tr>
                    <tr>
                        <td>&lt;301</td>
                        <td>18.30</td>
                        <td colspan="1" rowspan="2" >240.00</td>
                        <td colspan="1" rowspan="2" >&ndash;</td>
                    </tr>
                    <tr>
                        <td>&gt;300</td>
                        <td>22.85</td>
                    </tr>
                </tbody>
            </table>
            


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