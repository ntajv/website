<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

// Determine columns based on language (from navbar include or session)
// Navbar is included above, which sets $lang_code and $lang.
$title_col = (isset($lang_code) && $lang_code == 'en') ? 'title_en' : 'title';
$desc_col = (isset($lang_code) && $lang_code == 'en') ? 'description_en' : 'description';

// Fetch services from database
$services_data = [];
try {
    if (isset($conn)) {
        // Alias columns to generic 'title' and 'description' for easier usage
        $stmt = $conn->query("SELECT id, $title_col as title, $desc_col as description, icon_class FROM services");
        $services_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
}
?>

<!-- Hero Section with Full Background Image -->
<header id="home" class="relative pt-40 pb-32 md:pb-48 overflow-hidden min-h-[85vh] flex items-center">

    <!-- Background Image & Overlay -->
    <div class="absolute inset-0 z-0">
        <!-- Image Source: Updated to a brighter, cleaner medical care image -->
        <img src="assets/img/image-bg.jpeg" alt="Bright Medical Care" class="w-full h-full object-cover">
        <!-- Overlay: Updated to lighter teal gradient for brighter feel while maintaining text readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-teal-700/90 via-teal-800/50 to-transparent"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl fade-in">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                <?php echo $lang['hero_title']; ?>
            </h1>
            <p class="text-lg text-white/90 mb-8 leading-relaxed max-w-xl font-medium">
                <?php echo $lang['hero_subtitle']; ?>
            </p>

            <!-- Features Badges -->
            <div class="flex flex-wrap gap-4 mb-10">
                <div
                    class="flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-full border border-white/30 text-sm font-medium text-white shadow-lg">
                    <i class="fa-solid fa-circle-check text-white"></i> <?php echo $lang['certified_medics']; ?>
                </div>
                <div
                    class="flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-full border border-white/30 text-sm font-medium text-white shadow-lg">
                    <i class="fa-solid fa-circle-check text-white"></i> <?php echo $lang['24_7_service']; ?>
                </div>
                <div
                    class="flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-full border border-white/30 text-sm font-medium text-white shadow-lg">
                    <i class="fa-solid fa-circle-check text-white"></i> <?php echo $lang['fast_response']; ?>
                </div>
                <div
                    class="flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-full border border-white/30 text-sm font-medium text-white shadow-lg">
                    <i class="fa-solid fa-circle-check text-white"></i> <?php echo $lang['medical_tools']; ?>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#contact"
                    class="px-8 py-4 bg-white text-brand-teal font-bold rounded-lg shadow-lg hover:bg-gray-100 transition flex items-center justify-center gap-2 transform hover:-translate-y-1">
                    <i class="fa-solid fa-calendar-check"></i> <?php echo $lang['book_appointment']; ?>
                </a>
                <a href="https://wa.me/628111955112?text=Halo,%20saya%20mau%20order%20Homecare"
                    class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-lg shadow-sm hover:bg-white hover:text-brand-teal transition flex items-center justify-center gap-2 group">
                    <i class="fa-brands fa-whatsapp text-xl group-hover:text-green-600 transition"></i>
                    <?php echo $lang['chat_whatsapp']; ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Wave Separator -->
    <!-- <div class="wave-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                class="shape-fill"></path>
        </svg>
    </div> -->
</header>



<!-- About Us Section -->
<section id="about" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-stretch gap-12">
            <!-- Image Side -->
            <div class="lg:w-1/2 relative">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-brand-teal/10 rounded-full z-0"></div>
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-brand-gold/10 rounded-full z-0"></div>
                <img src="assets/img/image-thumb-1.jpeg" alt="Professional Care"
                    class="rounded-2xl shadow-xl w-full object-cover h-full relative z-10">
                <!-- Experience Badge -->
                <!-- <div
                    class="absolute bottom-8 right-8 bg-white p-4 rounded-lg shadow-lg z-20 animate-fade-in-up border-l-4 border-brand-teal">
                    <p class="text-brand-dark font-bold text-lg">Professional</p>
                    <p class="text-sm text-slate-500">Home Care Service</p>
                </div> -->
            </div>

            <!-- Content Side -->
            <div class="lg:w-1/2">
                <span
                    class="text-brand-teal font-semibold uppercase tracking-wider text-sm"><?php echo $lang['about_us_label']; ?></span>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mt-2 mb-6">
                    <?php echo $lang['welcome_title']; ?>
                </h2>
                <p class="text-slate-600 mb-4 leading-relaxed">
                    <?php echo $lang['about_desc_1']; ?>
                </p>
                <p class="text-slate-600 mb-8 leading-relaxed">
                    <?php echo $lang['about_desc_2']; ?>
                </p>

                <h3 class="font-bold text-brand-dark mb-3 text-lg"><?php echo $lang['vision_title']; ?></h3>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-brand-teal text-lg"></i>
                        <span class="text-slate-700 font-medium"><?php echo $lang['vision_desc']; ?></span>
                    </li>
                </ul>

                <h3 class="font-bold text-brand-dark mb-3 text-lg"><?php echo $lang['mission_title']; ?></h3>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-brand-teal text-lg"></i>
                        <span class="text-slate-700 font-medium"><?php echo $lang['mission_1']; ?></span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-brand-teal text-lg"></i>
                        <span class="text-slate-700 font-medium"><?php echo $lang['mission_2']; ?></span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-brand-teal text-lg"></i>
                        <span class="text-slate-700 font-medium"><?php echo $lang['mission_3']; ?></span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-brand-teal text-lg"></i>
                        <span class="text-slate-700 font-medium"><?php echo $lang['mission_4']; ?></span>
                    </li>
                </ul>

                <div class="mt-10">
                    <a href="#contact"
                        class="inline-block px-8 py-3 bg-brand-teal text-white font-bold rounded-lg shadow-md hover:bg-teal-700 transition transform hover:-translate-y-1">
                        <?php echo $lang['book_appointment']; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mb-4"><?php echo $lang['our_services_title']; ?>
            </h2>
            <p class="text-slate-600"><?php echo $lang['our_services_desc']; ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (!empty($services_data)): ?>
                <?php foreach ($services_data as $service): ?>
                    <!-- Service Item -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-transparent hover:border-brand-teal group text-center">
                        <div
                            class="w-20 h-20 mx-auto bg-blue-50 rounded-full flex items-center justify-center mb-6 group-hover:bg-brand-teal transition">
                            <i
                                class="fa-solid <?php echo htmlspecialchars($service['icon_class']); ?> text-4xl text-brand-teal group-hover:text-white transition"></i>
                        </div>
                        <h3 class="text-xl font-bold text-brand-dark mb-3">
                            <?php echo htmlspecialchars($service['title']); ?>
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            <?php echo htmlspecialchars($service['description']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 text-center text-slate-500">
                    <p>No services found in database. Please import the database.sql file.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- <div class="text-center mt-12">
            <a href="#contact"
                class="inline-block px-8 py-3 bg-brand-dark text-white font-medium rounded-full hover:bg-slate-800 transition">
                Lihat Semua Layanan
            </a>
        </div> -->
    </div>
</section>

<!-- Why Choose Us & CTA Section -->
<section class="py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">

            <!-- Text Content -->
            <div class="lg:w-1/2 order-2 lg:order-1">
                <span
                    class="text-brand-teal font-semibold uppercase tracking-wider text-sm"><?php echo $lang['why_choose_us_label']; ?></span>
                <h2 class="text-3xl md:text-4xl font-bold text-brand-dark mt-2 mb-6">
                    <?php echo $lang['why_choose_us_title']; ?>
                </h2>
                <p class="text-slate-600 mb-8">
                    <?php echo $lang['why_choose_us_desc']; ?>
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Feature 1 -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-brand-teal">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                        <h4 class="font-bold text-brand-dark"><?php echo $lang['certified_team']; ?></h4>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-brand-teal">
                            <i class="fa-solid fa-hospital"></i>
                        </div>
                        <h4 class="font-bold text-brand-dark"><?php echo $lang['hospital_standard']; ?></h4>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-brand-teal">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h4 class="font-bold text-brand-dark"><?php echo $lang['fast_response']; ?></h4>
                    </div>

                    <!-- Feature 4 -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-brand-teal">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <h4 class="font-bold text-brand-dark"><?php echo $lang['flexible_practical']; ?></h4>
                    </div>

                    <!-- Feature 5 -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-brand-teal">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <h4 class="font-bold text-brand-dark"><?php echo $lang['transparent_price']; ?></h4>
                    </div>

                    <!-- Feature 6 -->
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center text-brand-teal">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <h4 class="font-bold text-brand-dark"><?php echo $lang['humanist_approach']; ?></h4>
                    </div>
                </div>
            </div>

            <!-- Image Side with Overlay -->
            <div class="lg:w-1/2 order-1 lg:order-2 relative">
                <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                    alt="Happy Elderly Patient" class="rounded-2xl shadow-2xl w-full object-cover h-[500px]">

                <!-- Floating Testimonial Card (Like in design) -->
                <!-- <div
                    class="absolute bottom-6 right-6 md:right-[-20px] bg-white p-6 rounded-lg shadow-xl max-w-xs border-l-4 border-brand-teal animate-fade-in-up">
                    <div class="flex text-yellow-400 text-sm mb-2">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="text-slate-700 italic text-sm mb-3">
                        "The Vananta Care team was a blessing during our recovery. Their attention and empathy made the
                        difference."
                    </p>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                        <div class="w-2 h-2 rounded-full bg-brand-teal"></div>
                        <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    </div>
                </div> -->
            </div>

        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-brand-light">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-brand-dark mb-12"><?php echo $lang['testimonials_title']; ?></h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Testi 1 -->
            <div class="bg-white p-8 rounded-xl shadow-md text-left">
                <div class="flex text-yellow-400 mb-4">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 mb-6"><?php echo $lang['testi_1_text']; ?></p>
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        IR</div>
                    <div>
                        <h5 class="font-bold text-brand-dark text-sm"><?php echo $lang['testi_1_author']; ?></h5>
                        <p class="text-xs text-slate-400"><?php echo $lang['testi_1_location']; ?></p>
                    </div>
                </div>
            </div>

            <!-- Testi 2 -->
            <div class="bg-white p-8 rounded-xl shadow-md text-left">
                <div class="flex text-yellow-400 mb-4">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 mb-6"><?php echo $lang['testi_2_text']; ?></p>
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        BA</div>
                    <div>
                        <h5 class="font-bold text-brand-dark text-sm"><?php echo $lang['testi_2_author']; ?></h5>
                        <p class="text-xs text-slate-400"><?php echo $lang['testi_2_location']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="bg-brand-dark rounded-3xl p-8 md:p-16 text-white shadow-2xl relative overflow-hidden">
            <!-- Decorative Circles -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white opacity-5 rounded-full"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 bg-brand-teal opacity-10 rounded-full"></div>

            <div class="flex flex-col lg:flex-row gap-12 relative z-10">
                <!-- Text Info -->
                <div class="lg:w-5/12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php echo $lang['booking_title']; ?></h2>
                    <p class="text-blue-100 mb-8 text-lg">
                        <?php echo $lang['booking_subtitle']; ?>
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center text-brand-teal">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <p class="text-sm text-blue-200"><?php echo $lang['hotline']; ?></p>
                                <p class="font-bold">628111955112</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center text-brand-teal">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-sm text-blue-200"><?php echo $lang['email']; ?></p>
                                <p class="font-bold">info@vanantacare.com</p>
                            </div>
                        </div>
                        <div class="mt-8 p-4 bg-white/5 rounded-lg border border-white/10">
                            <p class="text-sm text-blue-100">
                                <i class="fa-solid fa-circle-info mr-2"></i> <?php echo $lang['service_area']; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="lg:w-7/12 bg-white rounded-2xl p-6 md:p-8 text-brand-dark">
                    <form onsubmit="sendToWhatsapp(event)">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-bold mb-2"><?php echo $lang['form_name']; ?></label>
                                <input type="text" id="name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-brand-teal bg-gray-50"
                                    placeholder="<?php echo $lang['form_name_placeholder']; ?>">
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-bold mb-2"><?php echo $lang['form_whatsapp']; ?></label>
                                <input type="tel" id="whatsapp" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-brand-teal bg-gray-50"
                                    placeholder="<?php echo $lang['form_whatsapp_placeholder']; ?>">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-bold mb-2"><?php echo $lang['form_address']; ?></label>
                            <textarea id="address" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-brand-teal bg-gray-50"
                                rows="3" placeholder="<?php echo $lang['form_address_placeholder']; ?>"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label
                                    class="block text-sm font-bold mb-2"><?php echo $lang['form_service_label']; ?></label>
                                <select id="service"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-brand-teal bg-gray-50">
                                    <?php if (!empty($services_data)): ?>
                                        <?php foreach ($services_data as $service): ?>
                                            <option value="<?php echo htmlspecialchars($service['title']); ?>">
                                                <?php echo htmlspecialchars($service['title']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">Tidak ada layanan</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-sm font-bold mb-2"><?php echo $lang['form_date_label']; ?></label>
                                <input type="date" id="date" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-brand-teal bg-gray-50">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-brand-teal hover:bg-teal-600 text-white font-bold rounded-lg shadow-lg transition transform active:scale-95">
                            <?php echo $lang['form_submit_btn']; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-20 bg-slate-50">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-brand-dark">
                <?php echo $lang['faq_title']; ?>
            </h2>
            <p class="text-slate-500 mt-2">
                <?php echo $lang['faq_subtitle']; ?>
            </p>
        </div>

        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <button
                    class="w-full px-6 py-4 text-left font-bold text-brand-dark flex justify-between items-center focus:outline-none"
                    onclick="toggleFaq(this)">
                    <span>
                        <?php echo $lang['faq_1_q']; ?>
                    </span>
                    <i class="fa-solid fa-chevron-down text-brand-teal transition-transform duration-300"></i>
                </button>
                <div class="px-6 py-0 h-0 overflow-hidden transition-all duration-300 bg-gray-50">
                    <p class="py-4 text-slate-600 text-sm">
                        <?php echo $lang['faq_1_a']; ?>
                    </p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <button
                    class="w-full px-6 py-4 text-left font-bold text-brand-dark flex justify-between items-center focus:outline-none"
                    onclick="toggleFaq(this)">
                    <span>
                        <?php echo $lang['faq_2_q']; ?>
                    </span>
                    <i class="fa-solid fa-chevron-down text-brand-teal transition-transform duration-300"></i>
                </button>
                <div class="px-6 py-0 h-0 overflow-hidden transition-all duration-300 bg-gray-50">
                    <p class="py-4 text-slate-600 text-sm">
                        <?php echo $lang['faq_2_a']; ?>
                    </p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <button
                    class="w-full px-6 py-4 text-left font-bold text-brand-dark flex justify-between items-center focus:outline-none"
                    onclick="toggleFaq(this)">
                    <span>
                        <?php echo $lang['faq_3_q']; ?>
                    </span>
                    <i class="fa-solid fa-chevron-down text-brand-teal transition-transform duration-300"></i>
                </button>
                <div class="px-6 py-0 h-0 overflow-hidden transition-all duration-300 bg-gray-50">
                    <p class="py-4 text-slate-600 text-sm">
                        <?php echo $lang['faq_3_a']; ?>
                    </p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <button
                    class="w-full px-6 py-4 text-left font-bold text-brand-dark flex justify-between items-center focus:outline-none"
                    onclick="toggleFaq(this)">
                    <span>
                        <?php echo $lang['faq_4_q']; ?>
                    </span>
                    <i class="fa-solid fa-chevron-down text-brand-teal transition-transform duration-300"></i>
                </button>
                <div class="px-6 py-0 h-0 overflow-hidden transition-all duration-300 bg-gray-50">
                    <p class="py-4 text-slate-600 text-sm">
                        <?php echo $lang['faq_4_a']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-3xl font-bold text-brand-dark"><?php echo $lang['blog_title']; ?></h2>
                <p class="text-slate-500 mt-2"><?php echo $lang['blog_subtitle']; ?></p>
            </div>
            <a href="blog"
                class="hidden md:block text-brand-teal font-semibold hover:underline"><?php echo $lang['view_all_articles']; ?></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            // Fetch latest 3 blog posts
            $blog_stmt = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 3");
            $latest_posts = $blog_stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($latest_posts) > 0):
                foreach ($latest_posts as $post):
                    ?>
                    <div class="group cursor-pointer">
                        <a href="post?id=<?php echo $post['id']; ?>">
                            <div class="overflow-hidden rounded-xl mb-4 h-48">
                                <img src="<?php echo htmlspecialchars($post['image']); ?>"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            </div>
                            <h4 class="font-bold text-brand-dark text-lg group-hover:text-brand-teal transition line-clamp-2">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </h4>
                            <p class="text-slate-500 text-sm mt-2 line-clamp-2">
                                <?php echo strip_tags(htmlspecialchars_decode($post['content'])); ?>
                            </p>
                        </a>
                    </div>
                    <?php
                endforeach;
            else:
                ?>
                <div class="col-span-3 text-center text-slate-500">
                    <p><?php echo $lang['no_articles']; ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-8 text-center md:hidden">
            <a href="blog"
                class="text-brand-teal font-semibold hover:underline"><?php echo $lang['view_all_articles']; ?></a>
        </div>
    </div>
</section>

<!-- CTA Bar (Sticky/Fixed possibility or bottom bar) -->
<div class="bg-brand-teal text-white py-4 text-center">
    <p class="font-medium inline-block mr-4"><?php echo $lang['sticky_text']; ?></p>
    <a href="#contact"
        class="inline-block bg-white text-brand-teal px-4 py-1 rounded-full font-bold text-sm hover:bg-gray-100 transition"><?php echo $lang['book_now']; ?></a>
</div>

<script>
    function sendToWhatsapp(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const whatsapp = document.getElementById('whatsapp').value;
        const address = document.getElementById('address').value;
        const service = document.getElementById('service').value;
        const date = document.getElementById('date').value;

        // Ganti nomor ini dengan nomor Admin Vananta Care
        const adminPhone = '628111955112';

        const message = `Halo Vananta Care, saya ingin melakukan appointment.%0A%0A` +
            `*Nama*: ${name}%0A` +
            `*No WA*: ${whatsapp}%0A` +
            `*Alamat*: ${address}%0A` +
            `*Layanan*: ${service}%0A` +
            `*Jadwal*: ${date}%0A%0A` +
            `Mohon konfirmasinya. Terima kasih.`;

        const url = `https://wa.me/${adminPhone}?text=${message}`;
        window.open(url, '_blank');
    }
</script>

<?php include 'includes/footer.php'; ?>