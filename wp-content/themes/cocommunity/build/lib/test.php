<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Horizontal Drop Down Menu</title>
    <link rel="stylesheet" href="../main.min.css" />
    <style>
        .top-bar-section ul li {
            background:#fff;
        }
        .top-bar .toggle-topbar.menu-icon a {
            color:#000;
        }
        .top-bar .toggle-topbar.menu-icon a span::after {
            box-shadow: 0px 0px 0px 1px #000, 0px 7px 0px 1px #000, 0px 14px 0px 1px #000;
        }
        .top-bar-section{
            background:#f0f;
        }

        .top-bar-section .dropdown li a{
            background:#f00;
            padding: 12px 0 12px 0;
            margin:0;
            line-height:1em;
        }

    </style>
</head>
<body>
<div class="row">
    <div class="large-12 columns">

        <nav class="top-bar" data-topbar>

            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">Site Name</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"></a></li>
            </ul>

            <!--
                <section class="top-bar-section">
                <ul class="right">
                    <li class="has-dropdown"><a href="#">FirstMenu</a>
                        <ul class="dropdown">
                            <li><a href="#">YouTube</a></li>
                            <li><a href="#">Vimeo</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Podcasts</a></li>
                    <li class="has-dropdown"><a href="#">Videos</a>
                        <ul class="dropdown">
                            <li><a href="#">Vimeo</a></li>
                            <li><a href="#">YouTube</a></li>
                            <li><a href="#">Vimeo</a></li>
                            <li><a href="#">YouTube</a></li>
                            <li><a href="#">Vimeo</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Podcasts</a></li>
                    <li class="has-dropdown"><a href="#">Videos</a>
                        <ul class="dropdown">
                            <li><a href="#">YouTube</a></li>
                            <li><a href="#">Vimeo</a></li>
                            <li><a href="#">YouTube</a></li>
                            <li><a href="#">Vimeo</a></li>
                            <li><a href="#">YouTube</a></li>
                            <li><a href="#">Vimeo</a></li>
                            <li><a href="#">YouTube</a></li>
                            <li><a href="#">Vimeo</a></li>
                        </ul>
                    </li>

                </ul>
            </section>
            -->


            <section class="top-bar-section">
                <ul id="menu-main-menu" class="menu">
                    <li class="active active"><a href="http://wtgtheme.wpengine.com"><span class="dojodigital_toggle_title">Home</span></a></li>
                    <li class="has-dropdown"><a href="http://wtgtheme.wpengine.com/about-us/">About us</a>
                        <ul class="dropdown">
                            <li><a href="http://wtgtheme.wpengine.com/about-us/the-registrar/">The Registrar</a></li>
                            <li><a href="http://wtgtheme.wpengine.com/about-us/governance/">Governance</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="http://wtgtheme.wpengine.com/guidance/">Guidance</a>
                        <ul class="dropdown">
                            <li><a href="http://wtgtheme.wpengine.com/guidance/guidance-on-joining/">Guidance on joining</a></li>
                            <li><a href="http://wtgtheme.wpengine.com/guidance/faqs/">FAQs</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown"><a href="http://wtgtheme.wpengine.com/news-and-publications/">News and publications</a>
                        <ul class="dropdown">
                            <li><a href="http://wtgtheme.wpengine.com/news/">All news</a></li>
                        </ul>
                    </li>
                    <li><a href="http://wtgtheme.wpengine.com/contact-us/">Contact us</a></li>
                </ul>
            </section>


        </nav>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lorem magna, aliquam ut sem eget, fringilla lacinia felis. Proin pulvinar libero a diam venenatis sodales. Vestibulum elit sapien, placerat eu vulputate ut, rutrum sit amet dui.
        </p>
    </div>
</div>

<script src="jquery.min.js"></script>
<script src="foundation.min.js"></script>
<script src="../main.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
