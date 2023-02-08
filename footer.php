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

<div class="footer">
    <div class="container-lg">
        <div class="footer-wrap">
            <div class="footer-wrap-left">
                <p>Privacy Policy</p>
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
                <p>Media Library</p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
