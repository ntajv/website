<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

// Navbar includes the translation file based on session language, so $lang is already available.
?>

<!-- Page Header -->
<div class="pt-32 pb-16 bg-brand-teal text-white">
    <div class="container mx-auto px-6 max-w-5xl text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">
            <?php echo $lang['infusion_title']; ?>
        </h1>
        <p class="text-lg text-white/90 max-w-2xl mx-auto leading-relaxed">
            <?php echo $lang['infusion_subtitle']; ?>
        </p>
    </div>
</div>

<!-- Infusion Services List Section -->
<section class="py-20 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($lang['infusion_list'] as $item): ?>
                <div
                    class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-transparent hover:border-brand-teal flex flex-col items-center text-center">
                    <div
                        class="w-20 h-20 bg-teal-50 rounded-full flex items-center justify-center mb-6 text-brand-teal group-hover:bg-brand-teal transition">
                        <i class="fa-solid <?php echo htmlspecialchars($item['icon']); ?> text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-dark mb-4">
                        <?php echo htmlspecialchars($item['name']); ?>
                    </h3>
                    <p class="text-slate-600 leading-relaxed">
                        <?php echo htmlspecialchars($item['desc']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-16 text-center">
            <a href="index.php<?php echo $qs; ?>#contact"
                class="inline-block px-8 py-4 bg-brand-teal text-white font-bold rounded-lg shadow-md hover:bg-teal-700 transition transform hover:-translate-y-1">
                <?php echo $lang['book_appointment']; ?>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>