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
<li class="nav-item submenu">
    <a class="nav-link" href="#">Tools</a>
    <ul class="dropdown toolsItem">
        <!-- Free Tools Section -->
        <li class="dropdown-section">
            <h6 class="section-title">Free Tools</h6>
            <div class="scrollable-section">
                <a href="{{url('ebay-calculator')}}" class="dropdown-item">Ebay Calculator</a>
                <a href="{{url('title-builder')}}" class="dropdown-item">Title Builder</a>
            </div>
        </li>

        <!-- Paid Tools Section -->
        <li class="dropdown-section">
            <h6 class="section-title">Paid Tools</h6>
            <div class="scrollable-section">
                <!-- eBay Section -->
                <div class="dropdown-group">
                    <a href="#" class="dropdown-toggle" onclick="toggleVisibility(event, 'ebay-pages')">
                        <img src="{{ asset('images/Registration/ebay.svg') }}" alt="eBay Logo" class="icon">
                        eBay Tools
                        <span class="tools-arrow">&#9660;</span>
                    </a>
                    <div class="submenu-list" id="ebay-pages">
                        <a href="{{ route('tools-product.show', ['slug' => 'express-product-insight']) }}">Product Insight</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'topbay-picks']) }}">TopBay Picks</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'ebay-niche-finder-tool']) }}">NicheFinder</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'ebay-title-master']) }}">Title Master</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'ebay-rivalview-tool']) }}">RivalView</a>
                    </div>
                </div>

                <!-- Amazon Section -->
                <div class="dropdown-group">
                    <a href="#" class="dropdown-toggle" onclick="toggleVisibility(event, 'Amazon-pages')">
                        <img src="{{ asset('images/Registration/amazon.svg') }}" alt="Amazon Logo" class="icon">
                        Amazon Tools
                        <span class="tools-arrow">&#9660;</span>
                    </a>
                    <div class="submenu-list" id="Amazon-pages">
                        <a href="{{ route('tools-product.show', ['slug' => 'amazon-scanner']) }}">Amazon Scanner</a>
                    </div>
                </div>

                <!-- Walmart Section -->
                <div class="dropdown-group">
                    <a href="#" class="dropdown-toggle" onclick="toggleVisibility(event, 'Walmart-pages')">
                        <img src="{{ asset('images/Registration/walMart.svg') }}" alt="Walmart Logo" class="icon">
                        Walmart Tools
                        <span class="tools-arrow">&#9660;</span>
                    </a>
                    <div class="submenu-list" id="Walmart-pages">
                        <a href="{{ route('tools-product.show', ['slug' => 'walmart-watch-tool']) }}">Walmart Watch</a>
                    </div>
                </div>

                <!-- AliExpress Section -->
                <div class="dropdown-group">
                    <a href="#" class="dropdown-toggle" onclick="toggleVisibility(event, 'AliExpress-pages')">
                        <img src="{{ asset('images/Registration/aliExpress.svg') }}" alt="AliExpress Logo" class="icon">
                        AliExpress Tools
                        <span class="tools-arrow">&#9660;</span>
                    </a>
                    <div class="submenu-list" id="AliExpress-pages">
                        <a href="{{ route('tools-product.show', ['slug' => 'express-finder-tool']) }}">Express Finder</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'express-scan-tool']) }}">Express Scan</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'express-supplier-scout-tool']) }}">Supplier Scout</a>
                    </div>
                </div>

                <!-- TikTok Section -->
                <div class="dropdown-group">
                    <a href="#" class="dropdown-toggle" onclick="toggleVisibility(event, 'tiktook-pages')">
                        <img src="{{ asset('images/tiktok_shop.png') }}" alt="TikTok Logo" class="icon">
                        TikTok Tools
                        <span class="tools-arrow">&#9660;</span>
                    </a>
                    <div class="submenu-list" id="tiktook-pages">
                        <a href="{{ route('tools-product.show', ['slug' => 'tiktrend-scan-tool']) }}">TikTok Scanner</a>
                    </div>
                </div>

                <!-- Shopify Section -->
                <div class="dropdown-group">
                    <a href="#" class="dropdown-toggle" onclick="toggleVisibility(event, 'shopify-pages')">
                        <img src="{{ asset('images/Registration/shopify.svg') }}" alt="Shopify Logo" class="icon">
                        Shopify Tools
                        <span class="tools-arrow">&#9660;</span>
                    </a>
                    <div class="submenu-list" id="shopify-pages">
                        <a href="{{ route('tools-product.show', ['slug' => 'shopify-insight']) }}">Shopify Insight</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'shopify-spy-tool']) }}">Shopify Spy</a>
                        <a href="{{ route('tools-product.show', ['slug' => 'shopify-store-finder']) }}">Shopify Store Finder</a>
                    </div>
                </div>
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