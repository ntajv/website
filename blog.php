<?php
require_once 'config/database.php';
include 'includes/header.php';
include 'includes/navbar.php';

// Fetch all blog posts
$stmt = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="pt-32 pb-20 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-brand-dark mb-4">Blog & Artikel Kesehatan</h1>
            <p class="text-slate-600">Informasi terbaru seputar kesehatan dan layanan homecare.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 group">
                    <div class="overflow-hidden h-56">
                        <img src="<?php echo htmlspecialchars($post['image']); ?>"
                            alt="<?php echo htmlspecialchars($post['title']); ?>"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-brand-teal font-semibold mb-2">
                            <?php echo date('d M Y', strtotime($post['created_at'])); ?>
                        </div>
                        <h3 class="text-xl font-bold text-brand-dark mb-3 line-clamp-2">
                            <a href="post?id=<?php echo $post['id']; ?>" class="hover:text-brand-teal transition">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </h3>
                        <p class="text-slate-500 text-sm mb-4 line-clamp-3">
                            <?php echo strip_tags(htmlspecialchars_decode($post['content'])); ?>
                        </p>
                        <a href="post?id=<?php echo $post['id']; ?>"
                            class="text-brand-dark font-semibold text-sm hover:text-brand-teal transition flex items-center gap-2">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>