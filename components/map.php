<?php
    $data = get_field('contact_details_group', 'option'); 
?>
<div class="grid lg:grid-cols-2 p-6 md:p-20 max-w-mdm m-auto">
    <div class="grid targetDiv animate-duration-[3000ms]">
        <h1 class="text-3xl lg:text-4xl font-semibold text-blue-50 underline">Standort <br> <span>&</span> <br>Öffnungszeiten</h1>
        <h2 class="md:mt-10 mt-5 text-2xl lg:text-3xl font-content">Öffnungszeiten</h2>
        <ul class="text-xl mt-5 font-light">
            <li>Montag - Samstag - 09:00 - 18:00 Uhr</li>
        </ul>
        <h2 class="md:mt-10 text-2xl lg:text-3xl font-content">Standort</h2>
        <ul class="text-xl mt-5 font-light">
            <li><?= $data['company_adress']; ?></li>
        </ul>
        <a href="https://goo.gl/maps/YU1dVNG62TW68wuX6"
        target="_blank" class="bg-red-500 text-white self-center shadow-2xl text-center cursor-pointer duration-500 hover:bg-orange-100 m-auto px-3 whitespace-nowrap py-2 mt-5 rounded-full hover:text-blue-50 hover:px-7 inline-block">Schicken Sie mich zu Spaci Bau</a>
        </div>
    <div class="mapouter mt-5 targetDiv animate-duration-[3000ms]"><div class="gmap_canvas"><iframe title="map" class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Unique Bauelemente GmbH Seilerstatte 22/6 1010 wien&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://embed-googlemap.com">embed google maps</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
</div>