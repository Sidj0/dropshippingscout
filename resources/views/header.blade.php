 <!-- Preloader Start -->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon"><img src="{{ asset('images/logo.svg') }}" alt="Loading Icon"></div>
    </div>
</div>
<!-- Preloader End -->

<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu Start -->
                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu" style="background: #FFFFFF; border: 1px solid #E3E7FC; border-radius: 31px;">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            
                            <!-- Tools Dropdown Start -->
                            <li class="nav-item submenu"><a class="nav-link" href="#">Tools</a>
                                <ul class="dropdown toolsItem">
                                    <!-- Left Section -->
                                    <li class="dropdown-section left-section">
                                        <a href="{{ route('pages.show', ['slug' => $pages->where('view_name', 'product-scouting')->first()->slug]) }}"><h6>Product Scouting</h6>
                                        <p>Find your fellow competitors, identify the unique selling proposition of your product.</p></a>
                                        <a href="{{ route('pages.show', ['slug' => $pages->where('view_name', 'competitor-monitoring')->first()->slug]) }}"><h6>Competitor Monitoring</h6>
                                        <p>Find your fellow competitors, identify the unique selling proposition of your product.</p></a>
                                        <a href="{{ route('pages.show', ['slug' => $pages->where('view_name', 'suppliers-scouting')->first()->slug]) }}"><h6>Suppliers Scouting</h6>
                                        <p>Find your fellow competitors, identify the unique selling proposition of your product.</p></a>
                                      
                                      <!--   <a href="{{ route('pages.show', ['slug' => $pages->where('view_name', 'tool')->first()->slug]) }}"><h6>Free Tools</h6>
                                        <p>Explore our free tools.</p></a>
                                       -->
                                   
                                    </li>
<!-- Right Section -->
<li class="dropdown-section right-section">
    <h6 style="color: #A5A7AA; font-size: 11px;">Paid Tools</h6>

    <!-- eBay Section -->
    <a href="#" class="dropdown-link toggle-section" onclick="toggleVisibility(event, 'ebay-pages')">
        <img src="{{ asset('images/header icons/ebay.svg') }}" alt="eBay Logo" class="icon"> 
        <span class="tools-arrow">&#9654;</span> <!-- Right-pointing arrow -->
    </a>
    <div class="pages-list" style="display: none;" id="ebay-pages">
        <a class="dropdown-link" href="#">Product Research</a>
        <a class="dropdown-link" href="#">Competitor Research</a>
        <a class="dropdown-link" href="#">Category Research</a>
        <a class="dropdown-link" href="#">Best eBay Items</a>
        <a class="dropdown-link" href="#">Title Builder</a>
    </div>

    <!-- Shopify Section -->
    <a href="#" class="dropdown-link toggle-section" onclick="toggleVisibility(event, 'shopify-pages')">
        <img src="{{ asset('images/header icons/shopify.svg') }}" alt="Shopify Logo" class="icon">
        <span class="tools-arrow">&#9654;</span> <!-- Right-pointing arrow -->
    </a>
    <div class="pages-list" style="display: none;" id="shopify-pages">
        <a class="dropdown-link" href="#">Product Research</a>
        <a class="dropdown-link" href="#">Competitor Research</a>
        <a class="dropdown-link" href="#">Best Competitor</a>
    </div>
</li>


                                </ul>
                            </li>
                            <!-- Tools Dropdown End -->

                            <!-- Resources Dropdown Start -->
                            <li class="nav-item submenu"><a class="nav-link" href="#">Resources</a>
                                <ul class="dropdown">
                                    <li class="dropdown-section">
                                        <a href="{{ url('blogs')}}" class="resource-link">
                                            <div class="resource-item">
                                                <img src="{{ asset('images/header icons/blog.svg') }}" alt="Blog Icon" class="resource-icon">
                                                <div>
                                                    <h6>Blog</h6>
                                                    <p>Find insights and updates on our blog.<br>Stay informed with the latest trends.</p>
                                                </div>
                                            </div>
                                        </a>
                                       

                                        <a href="{{ url('faqs') }}" class="resource-link">
                                            <div class="resource-item">
                                                <img src="{{ asset('images/header icons/faq.svg') }}" alt="FAQs Icon" class="resource-icon">
                                                <div>
                                                    <h6>FAQ's</h6>
                                                    <p>Find answers to frequently asked<br>questions and get support.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <!-- Resources Dropdown End -->

                            <li class="nav-item"><a class="nav-link" href="https://app.dropshippingscout.com/pricing">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('pages.show', ['slug' => $pages->where('view_name', 'affiliate')->first()->slug]) }}">Affiliate</a></li>
                          
                            <div class="magicButtons">
                                <a href="https://app.dropshippingscout.com/pricing">
                                    <button class="custom-btn btn-12"><span>For 1$!</span><span>Start now</span></button></a>
                            <a href="https://app.dropshippingscout.com/login"><button class="custom-btn btn-10">login</button></a>
                           </div>

                        </ul>
                    </div>
                    <!-- Let’s Start Button Start -->
                    <div class="header-btn d-inline-flex">
                        <a href="https://app.dropshippingscout.com/login" style="position: relative; display: inline-block; z-index: 1; overflow: hidden; padding: 15px 45px 15px 20px; font-weight: bold; color: #1E3F5B">Login</a>
                        <a href="https://app.dropshippingscout.com/pricing" class="btn-default" style="background: #3545D6; border: 1px solid #3545D6; border-radius: 8px;">Start $1 Trial</a>
                       
                    </div>
                    <!-- Let’s Start Button End -->
                </div>
                <!-- Main Menu End -->

                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>

</body>
</html>