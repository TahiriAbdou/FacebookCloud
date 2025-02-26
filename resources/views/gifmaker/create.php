<!doctype html>

<!--[if lte IE 8]><html class="no-js oldie shitty shit" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"  lang="en"><!--<![endif]-->
<head>

<!--
    OMG thanks for viewing the source.
    You're awesome.

                 Tech we used to build this:

             __   HTML5 drag n drop, FileReader,
            / _)  a[download], GIF encoding on the client, BlobBuilder,
     .-^^^-/ /    postMessage, <input type=range> (with Firefox polyfill),
 __/       /      appcache, transforms, transitions,
 <__.|_|-|_|      * { box-sizing : border-box; }

    See the header and footer for github links and the people involved! ♥
-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Mothereffing animated gif</title>

    <meta name="description" content="Drag and drop images from your desktop into the app. You can rotate and drag them. And generate your animated GIF! May even work while you're disconnected!">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
    <link rel="stylesheet" href="/giffy/assets/css/styles.css">

    <!-- cache & network update notification -->
    <!-- http://blog.grayghostvisuals.com/wordpress/cache-manifest-for-wordpress -->
    <!-- <script src="/giffy/assets/js/cache.update.js"></script> -->
    <!-- uncommment for pretty cache manifest update alerts -->
    <!-- <script src="/giffy/assets/js/network.status.js"></script> -->
</head>
<body>
    <div id="container">

        <header id="header" role="header" class="clearfix">
          <span class="image">
                <img src="/giffy/assets/img/logo.gif" alt="">
          </span>
            <p>Drag + Drop, Client-side, Animated GIF Creator</p>

        </header>

        <div id="main" role="main">
            <div class="top">
                <div class="files">
                    <div id="inimglist" class="clearfix"></div>
                </div>
                <div class="controls">
                    <span class="size">
                        <label>Width:</label>
                        <input type=range max=100 min=1 value=100><output></output>
                    </span>
                    <span class="rate">
                        <label>Frame Delay:</label>
                        <input type=range max=600 min=1 value=300><output></output>
                    </span>
                    <!--
                    <span class="quality">
                        <label>Quality:</label>
                        <input type=range max=10 min=1 value=3><output></output>
                    </span>
                    -->
                    <a href="#" class="clear">Clear</a>
                </div>
            </div>
        </div>

        <div id="dropArea">
            <h2 class='support'><span>Drag and <em>Drop</em> images here</span></h2>
            <h2 class='nosupport'>Your browser doesn't support FileReader, Drag and Drop, or some other modern required features. :(</h2>
        </div>

        <div id='results'>
            <h2 class='onlyfiles'>

            <button class='play'>Animate</button>
            <button class='clear'>Reset</button>

            <a id="downloadlink" href="">Download GIF</a>
            <a id="sharelink" href="">Save Project</a>

          </h2>

          <img id="animresult"/>
        </div>

        <footer id="footer" role="contentinfo">
        </footer>
    </div>

    <script>
        var _errs=["4fc160e76fe93d1c35001ac4"];(function(a,b){a.onerror=function(){_errs.push(arguments)};
        var d=function(){var a=b.createElement("script"),c=b.getElementsByTagName("script")[0];
        a.src="//d15qhc0lu1ghnk.cloudfront.net/beacon.js";a.async=!0;
        c.parentNode.insertBefore(a,c)};a.addEventListener?a.addEventListener("load",d,!1):
        a.attachEvent("onload",d)})(window,document);
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="/giffy/assets/js/libraries/jquery.base64.min.js"></script>
    <script src="/giffy/assets/js/libraries/jQueryRotateCompressed.js"></script>
    <script src="/giffy/assets/js/libraries/filereader.js"></script>
    <script src="/giffy/assets/js/libraries/modernizr.js"></script>
    <script src="/giffy/assets/js/libraries/html5slider.js"></script>
    <script src="/giffy/assets/js/libraries/underscore-min.js"></script>
    <script src="/giffy/assets/js/libraries/backbone-min.js"></script>
    <script src="/giffy/assets/js/libraries/backbone.nopersistence.js"></script>
    <script src="/giffy/assets/js/share.js"></script>
    <script src="/giffy/assets/js/mfanimated.js"></script>
    <script src="/giffy/assets/js/models.js"></script>
    <script src="/giffy/assets/js/ui.js"></script>
    <script src="/giffy/assets/js/startup.js"></script>

    <script>
        var _gaq=[['_setAccount','UA-18857974-3'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>

</body>
</html>
