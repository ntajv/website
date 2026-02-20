<!-- Footer -->
<footer class="bg-brand-dark text-white pt-16 pb-8">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- Brand -->
            <div class="md:col-span-1">
                <div class="mb-4">
                    <img src="assets/img/logo-white.png" alt="Vananta Care Logo" class="h-12 w-auto object-contain">
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    <?php echo $lang['footer_desc']; ?>
                </p>
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/vanantacare?igsh=MTBjZmN1OWV4dHprZw==" target="_blank"
                        class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-brand-teal transition"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="https://wa.me/628111955112" target="_blank"
                        class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-brand-teal transition"><i
                            class="fa-brands fa-whatsapp"></i></a>
                    <a href="mailto:info@vanantacare.com"
                        class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-brand-teal transition"><i
                            class="fa-regular fa-envelope"></i></a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h4 class="font-bold mb-6 text-lg">
                    <?php echo $lang['footer_menu']; ?>
                </h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="<?php echo $section_link; ?>#home" class="hover:text-brand-teal transition">
                            <?php echo $lang['home']; ?>
                        </a></li>
                    <li><a href="<?php echo $section_link; ?>#about" class="hover:text-brand-teal transition">
                            <?php echo $lang['about']; ?>
                        </a></li>
                    <li><a href="<?php echo $section_link; ?>#services" class="hover:text-brand-teal transition">
                            <?php echo $lang['services']; ?>
                        </a></li>
                    <li><a href="<?php echo $section_link; ?>#blog" class="hover:text-brand-teal transition">
                            <?php echo $lang['blog']; ?>
                        </a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="md:col-span-2">
                <h4 class="font-bold mb-6 text-lg">
                    <?php echo $lang['footer_contact']; ?>
                </h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot mt-1 text-brand-teal"></i>
                        <span>
                            <?php echo $lang['footer_office']; ?>
                        </span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-brand-teal"></i>
                        <span>628111955112 (Hotline 24/7)</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-brand-teal"></i>
                        <span>info@vanantacare.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 pt-8 text-center text-gray-500 text-sm">
            &copy; 2026 PT. Jiva Ananta Care. All rights reserved.
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/628111955112?text=Halo,%20saya%20mau%20order%20Homecare" target="_blank"
    class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-16 h-16 bg-[#25D366] text-white rounded-full shadow-2xl hover:bg-green-600 transition-all duration-300 hover:scale-110 group"
    aria-label="<?php echo $lang['chat_whatsapp']; ?>">
    <!-- Ping Animation Effect -->
    <span
        class="absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75 animate-ping group-hover:hidden"></span>
    <!-- Icon -->
    <i class="fa-brands fa-whatsapp text-4xl relative"></i>
    <!-- Tooltip Text -->
    <span
        class="absolute right-full mr-4 bg-white text-gray-800 px-3 py-1 rounded-lg shadow-md text-sm font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
        <?php echo $lang['footer_contact']; ?>
    </span>
</a>

<!-- JavaScript for Interactions -->
<script>
    // Toggle Mobile Menu
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }

    // Toggle FAQ Accordion
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');

        // Toggle height
        if (content.style.height && content.style.height !== '0px') {
            content.style.height = '0px';
            content.style.paddingTop = '0px';
            content.style.paddingBottom = '0px';
            icon.style.transform = 'rotate(0deg)';
        } else {
            content.style.height = content.scrollHeight + 32 + 'px'; // Add padding to calculation
            content.style.paddingTop = '1rem';
            content.style.paddingBottom = '1rem';
            icon.style.transform = 'rotate(180deg)';
        }
    }

    // Navbar Scroll Effect
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('shadow-md');
            navbar.classList.remove('py-4');
            navbar.classList.add('py-2');
        } else {
            navbar.classList.remove('shadow-md');
            navbar.classList.remove('py-2');
            navbar.classList.add('py-4');
        }
    });
</script>
</body>

</html>