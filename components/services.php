
<!-- Section: Services -->
<section class="bg-gray-100">
    <div class="targetDiv animate-duration-[3000ms] min-h-[900px] max-w-mdm m-auto py-20 xl:px-0 px-10">
        <div>
            <h1 class="text-3xl lg:text-4xl font-semibold text-blue-50">Unsere Dienstleistungen</h1>
        <div>
        <div>
            <p class="text-black-700 mt-4">
            Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.
            </p>
        </div>
        <div class="grid lg:grid-cols-3 gap-4 mt-6">
            <?php $data = get_field('services', 'option'); 
             

if ($data && is_array($data)) {
    foreach ($data as $service) {
        echo '<div class="p-4 shadow-xl bg-white flex hover:scale-105 duration-200 lg:flex-row flex-col">';
        echo '    <div class="grid">';
        echo '        <h1 class="text-xl text-blue-50 font-bold">' . $service["service_title"] . '</h1>';
        echo '        <p class="mt-2 text-black-700 text-md">' . $service["service_content"] . '</p>';
        echo '        <a href="/dienstleistungen" class="text-orange-500 cursor-pointer hover:underline self-end">Weiterlesen &#x21b7;</a>';
        echo '    </div>';
        if($service["service_image"]){
            echo '    <img src="' . $service["service_image"] . '" alt="Service Icon" class="object-contain p-3 w-20 h-20 self-center" />';
        }
        echo '</div>';
    }
} ?>
        </div>
    </div>
</section>