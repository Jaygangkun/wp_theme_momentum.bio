<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
</div>

<div class="footer" id="footer">
    <div class="container-lg">
        <div class="footer-wrap desktop-v">
            <div class="footer-wrap-left">
				<p><a href="<?= get_site_url_from_root('/privacy-policy') ?>">Privacy Policy</a></p>
                <p>All Content Copyright 2023</p>
            </div>
            <div class="footer-wrap-center">
                <p class="footer-contact">
                    3 Federal Street, Suite 300, Billerica, MA 01821 <br>
                    +1 (978) 461-4760 | info@momentum.bio
                </p>
            </div>
            <div class="footer-wrap-right">
                <div class="footer-social-icons">
                    <img class="footer-social-img" src="<?= get_template_directory_uri()?>/assets/images/ci4/icon-rg.png"></img>
                    <img class="footer-social-img" src="<?= get_template_directory_uri()?>/assets/images/ci4/icon-linkedin.png"></img>
                </div>
                <p><a href="<?= get_site_url_from_root('/media-kit')?>">Media Library</a></p>
            </div>
        </div>
        <div class="mobile-v">
            <div class="footer-top">
                <p class="footer-contact">
                    3 Federal Street, Suite 300, Billerica, MA 01821 <br>
                    +1 (978) 461-4760 | info@momentum.bio
                </p>
            </div>
            <div class="footer-bottom">
                <div>
                    <p><a href="<?= get_site_url_from_root('/privacy-policy')?>">Privacy Policy</a></p>
                    <p>All Content Copyright <?= date("Y")?></p>
                </div>
                <div class="footer-wrap-right">
                    <div class="footer-social-icons">
                        <img class="footer-social-img" src="<?= get_template_directory_uri()?>/assets/images/ci4/icon-rg.png"></img>
                        <img class="footer-social-img" src="<?= get_template_directory_uri()?>/assets/images/ci4/icon-linkedin.png"></img>
                    </div>
                    <p><a href="<?= get_site_url_from_root('/media-kit')?>">Media Library</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	function cbResize() {
		var content_height = window.innerHeight - jQuery('#header').outerHeight() - jQuery('#footer').outerHeight();
		console.log('window.innerHeight:', window.innerHeight);
		console.log('header_height:', jQuery('#header').outerHeight());
		console.log('footer_height:', jQuery('#footer').outerHeight());
		console.log('content_height:', content_height);
		jQuery('#page_content_wrap').css('min-height', content_height + 'px');
	}

	cbResize();
	jQuery(window).resize(cbResize);
	
</script>
<?php wp_footer(); ?>
</body>
</html>
