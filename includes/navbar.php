<?php
// Session & Language Logic
// Session started in index.php

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang_code = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';
if (!in_array($lang_code, ['id', 'en'])) {
    $lang_code = 'id';
}

require_once __DIR__ . '/../languages/' . $lang_code . '.php';

$current_page = basename($_SERVER['PHP_SELF'], '.php');
$is_home = ($current_page == 'index');
$link_prefix = $is_home ? '' : './'; // Point to root for cleanliness
$qs = ($lang_code == 'en') ? '?lang=en' : '';
$section_link = $is_home ? '' : './' . $qs; // Empty on home page for pure hash scrolling
?>
<nav class="bg-white/95 backdrop-blur-md fixed w-full z-50 shadow-sm transition-all duration-300" id="navbar">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <!-- Logo -->
            <a href="<?php echo $section_link; ?>#home" class="flex items-center gap-2">
                <img src="assets/img/logo.png" alt="Vananta Care Logo" class="h-12 w-auto object-contain">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="<?php echo $section_link; ?>#home"
                    class="text-brand-dark hover:text-brand-teal font-medium transition"><?php echo $lang['home']; ?></a>
                <a href="<?php echo $section_link; ?>#about"
                    class="text-brand-dark hover:text-brand-teal font-medium transition"><?php echo $lang['about']; ?></a>
                <a href="<?php echo $section_link; ?>#services"
                    class="text-brand-dark hover:text-brand-teal font-medium transition"><?php echo $lang['services']; ?></a>
                <a href="<?php echo $section_link; ?>#faq"
                    class="text-brand-dark hover:text-brand-teal font-medium transition"><?php echo $lang['faq']; ?></a>
                <a href="<?php echo $section_link; ?>#blog"
                    class="text-brand-dark hover:text-brand-teal font-medium transition"><?php echo $lang['blog']; ?></a>

                <!-- Language Switcher -->
                <div class="flex items-center space-x-2 border-l pl-4 border-gray-300">
                    <a href="?lang=id"
                        class="text-sm font-bold <?php echo $lang_code == 'id' ? 'text-brand-teal' : 'text-gray-400 hover:text-brand-dark'; ?>">ID</a>
                    <span class="text-gray-300">|</span>
                    <a href="?lang=en"
                        class="text-sm font-bold <?php echo $lang_code == 'en' ? 'text-brand-teal' : 'text-gray-400 hover:text-brand-dark'; ?>">EN</a>
                </div>

                <a href="<?php echo $link_prefix; ?>#contact"
                    class="px-5 py-2.5 bg-brand-teal text-white font-semibold rounded-md shadow-md hover:bg-teal-600 transition transform hover:-translate-y-0.5">
                    <?php echo $lang['book_appointment']; ?>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-brand-dark focus:outline-none" onclick="toggleMenu()">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t p-4 space-y-4 shadow-lg">
        <a href="<?php echo $section_link; ?>#home" class="block text-brand-dark font-medium"
            onclick="toggleMenu()"><?php echo $lang['home']; ?></a>
        <a href="<?php echo $section_link; ?>#about" class="block text-brand-dark font-medium"
            onclick="toggleMenu()"><?php echo $lang['about']; ?></a>
        <a href="<?php echo $section_link; ?>#services" class="block text-brand-dark font-medium"
            onclick="toggleMenu()"><?php echo $lang['services']; ?></a>
        <a href="<?php echo $section_link; ?>#faq" class="block text-brand-dark font-medium"
            onclick="toggleMenu()"><?php echo $lang['faq']; ?></a>
        <a href="<?php echo $section_link; ?>#blog" class="block text-brand-dark font-medium"
            onclick="toggleMenu()"><?php echo $lang['blog']; ?></a>

        <div class="flex gap-4 pt-2 border-t border-gray-100 justify-center">
            <a href="?lang=id"
                class="px-2 py-1 text-sm font-bold <?php echo $lang_code == 'id' ? 'bg-brand-teal text-white rounded' : 'text-gray-500'; ?>"
                onclick="toggleMenu()">Indonesia</a>
            <a href="?lang=en"
                class="px-2 py-1 text-sm font-bold <?php echo $lang_code == 'en' ? 'bg-brand-teal text-white rounded' : 'text-gray-500'; ?>"
                onclick="toggleMenu()">English</a>
        </div>

        <a href="<?php echo $link_prefix; ?>#contact"
            class="block w-full text-center px-5 py-3 bg-brand-teal text-white font-bold rounded-md"
            onclick="toggleMenu()">
            <?php echo $lang['book_appointment']; ?>
        </a>
    </div>
</nav>