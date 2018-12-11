<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WpOpal
 * @subpackage Shu
 * @since Shu 1.0
 */
?>
		</section><!-- #main -->
		
		<?php do_action( 'shu_template_main_after' ); ?>
		<?php do_action( 'shu_template_footer_before' ); ?>
		<footer id="opal-footer" class="opal-footer" role="contentinfo">
		
			<div class="container">
       <div class="row fooheader"><p>СВЯЖИТЕСЬ С НАМИ</p></div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
            	<div id="opal-logo" class="logo">
		<a href="/" class="custom-logo-link" rel="home" itemprop="url"><img width="1316" height="445" src="/wp-content/uploads/2018/07/лого-сайт.jpg" class="custom-logo" alt="Алиро Гранд" itemprop="logo"></a>	</div>
            <p class="opal-slogan">Завод оконных инноваций в г. Краснодар</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="top-phone">
 <i class="iphone" aria-hidden="true"></i>
 <a href="tel:8(861)213-92-92" class="phone_alloka">8 (861) 213-92-92</a><br>
 <span class="textwork">с 9.00 до 18.00 без выходных</span>
 </div>
        <div class="top-phone">
        <div class="row">

        <div class="col-xs-6"><button id="foobtnzamer" class="btn-ilk eModal-2">&nbsp;&nbsp;Вызвать&nbsp;замерщика</button></div>
</div>
        <div class="row">
        <div class="col-xs-6"><span class="seven">Перезвоним за <b>7</b> секунд</span></div>
        <div class="col-xs-6"><span id="foobtnzamerspan" >и получить скидку <span>48%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> </div>
</div>
   
            
  &nbsp; 
          
 </div>
                   
        </div>                                 
    </div> 
    
    <div class="row">
        <div class="col-xs-12 footext">
        <p><strong>350004, Краснодарский край, г. Краснодар, ул. Калинина, 258, моб. 8 (988) 470-36-26</strong></p>
       <?php echo do_shortcode( '[envira-gallery id="815"]' ); ?> 
        <p>385130,Республика Адыгея, п. Яблоновский, Шапсугское шоссе, 3/15</p>
        <p>E-mail: okna@aliro.ru</p>
    </div> 
      
    </div> 
    <div class="row">
       <!-- <img src="/wp-content/themes/shu/images/map.jpg" alt="" class="img-responsive"> -->
      
   <div class="map-section" rel="mapsection">
<section class="map map-address">                    </section>


</div>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

 
<script>
(function () {
    var map = document.querySelector('.map'),
        open = document.querySelector('.map-mobile-open'),
        close = document.querySelector('.map-mobile-close'),
        address = document.querySelectorAll('.map-address');

    ymaps.ready(function init() {
        var ymap = new ymaps.Map(map, {
             center: [45,39],
            zoom: 12,
            controls: ['zoomControl','searchControl',],
            behaviors: ['drag', 'multiTouch', 'dblClickZoom']
        });

        var iconLayout = ymaps.templateLayoutFactory.createClass('<div class="point"></div><div class="arrow-top"></div>');

        Array.prototype.forEach.call(address, function (value) {
            ymap.geoObjects.add(new ymaps.Placemark([45.042209, 38.941161], {
                src: value.getAttribute('data-img')
            }, {
                iconLayout: iconLayout
            }));
            ymap.geoObjects.add(new ymaps.Placemark([44.982303, 38.889886], {
                src: value.getAttribute('data-img')
            }, {
                iconLayout: iconLayout
            }));
        });
    });

})();
</script>
   
      
       
    </div> 
        
              
                  
				<div class="inner">
          
<?php get_template_part( 'page-templates/parts/nav' ); ?>					
            
					<?php //shu_display_footer_content(); ?>
					<section class="social clearfix">
					Мы в соцсетях:
<a class="btn btn-social btn-instagram" href="https://www.instagram.com/okna_aliro/" target="_blank">
    <i class="fa fa-instagram"></i>
</a>
 <a class="btn btn-social btn-vk" href="https://vk.com/oknaaliro" target="_blank">
    <i class="fa fa-vk"></i>
</a>
<a class="btn btn-social btn-odnoklassniki" href="https://ok.ru/group/54273950285986" target="_blank">
    <i class="fa fa-odnoklassniki"></i>
</a>
<a class="btn btn-social btn-facebook" href="https://www.facebook.com/oknaaliro/" target="_blank">
    <i class="fa fa-facebook"></i>
</a>
					</section>
                   
					<section class="opal-copyright clearfix">
						<div class="row">
								<div class="copyright">
									ООО "АЛИРО ГРАНД", 2018. Все права защищены<br>
								
<a href="/wp-content/uploads/2018/08/personal.pdf" target="_blank" rel="noopener"  style="color:#000;text-decoration: underline;">Политика обработки персональных данных ООО "АЛИРО ГРАНД"</a>
			</div>
			</div>
		</footer><!-- #colophon -->
		

		<?php do_action( 'shu_template_footer_after' ); ?>
		<?php get_sidebar( 'offcanvas' );  ?>
	</div>
</div>
	<!-- #page -->

<?php wp_footer(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter50253774 = new Ya.Metrika2({
                    id:50253774,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50253774" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125901681-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-125901681-1');
</script>
<!-- BEGIN JIVOSITE CODE -->
<script type='text/javascript'>
(function(){ var widget_id = 'zmKPxq9yYf';var d=document;var w=window;function l(){ var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- END JIVOSITE CODE -->
</body>
</html>