<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-6 col-lg-3"></div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a
                            class="social-facebook"
                            href="https://www.facebook.com/Packet39"
                            target="_blank" rel="noopener"
                    ><i class="fab fa-facebook-square"></i></a>
                    <a class="social-twitter" href="https://twitter.com/vice_packet39" target="_blank" rel="noopener"
                    ><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div
                        class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center"
                >
                    <a class="nav-link" href="<?php echo hostURL(); ?>/#tech">Technology</a>
                    <a class="nav-link" href="<?php echo hostURL(); ?>#projects">Projects</a>
                    <a class="nav-link" href="<?php echo hostURL(); ?>#team">Team</a>
                    <a class="nav-link" href="<?php echo hostURL(); ?>#contact">Contact</a>
                    <a class="nav-link" href="<?php echo hostURL(); ?>/blog">Blog</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /.footer -->

<script type="application/ld+json">
{
    "@context" : "http://schema.org",
    "@type" : "Organization",
    "name" : "Packet39",
    "legalName" : "Packet39",
    "url": "http://packet39.com/",
    "logo": "http://packet39.com/assets/images/packet39-social.jpg",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "39 Raebrook Place",
        "addressLocality": "London",
        "addressRegion": "ON",
        "postalCode": "N5X 2Z8",
        "addressCountry": "Canada"
    },
    "contactPoint": {
    "@type": "ContactPoint",
        "contactType": "sales",
        "telephone": "+1-519-902-6191",
        "email": "vice@packet39.com"
    },
    "sameAs": [
        "https://twitter.com/Vice_Packet39",
        "https://www.linkedin.com/company/packet39",
        "https://www.facebook.com/Packet39"
    ]
}
</script>
<!-- Scripts -->
<script src="<?php echo WP_HOME; ?>/../assets/js/page.min.js"></script>
<script src="<?php echo WP_HOME; ?>/../assets/js/script.js"></script>
<script>
    (function($){
        setInterval(function() {
            $.each($('iframe'), function (arr,x) {
                var src = $(x).attr('src');
                if (src && src.match(/(ads-iframe)|(disqusads)/gi)) {
                    $(x).remove();
                }
            });
        }, 300);
    })(jQuery);
</script>
<?php wp_footer(); ?>
</body>
</html>
