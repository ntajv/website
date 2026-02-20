<?php
require_once 'config/database.php';

if (!isset($_GET['id'])) {
    header('Location: blog.php');
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header('Location: blog.php');
    exit;
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="pt-32 pb-20 bg-white min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <!-- Breadcrumb -->
        <div class="mb-8 text-sm text-slate-500">
            <a href="./" class="hover:text-brand-teal">Home</a> <i class="fa-solid fa-chevron-right mx-2 text-xs"></i>
            <a href="blog" class="hover:text-brand-teal">Blog</a> <i class="fa-solid fa-chevron-right mx-2 text-xs"></i>
            <span class="text-brand-dark truncate">
                <?php echo htmlspecialchars($post['title']); ?>
            </span>
        </div>

        <h1 class="text-3xl md:text-5xl font-bold text-brand-dark mb-6 leading-tight">
            <?php echo htmlspecialchars($post['title']); ?>
        </h1>

        <div class="flex items-center gap-4 mb-10 text-slate-500 text-sm">
            <div class="flex items-center gap-2">
                <i class="fa-regular fa-calendar"></i>
                <?php echo date('d F Y', strtotime($post['created_at'])); ?>
            </div>
            <div class="flex items-center gap-2">
                <i class="fa-regular fa-user"></i>
                Admin
            </div>
        </div>

        <div class="rounded-3xl overflow-hidden mb-12 shadow-lg">
            <img src="<?php echo htmlspecialchars($post['image']); ?>"
                alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-auto object-cover max-h-[500px]">
        </div>

        <div class="prose prose-lg prose-slate max-w-none prose-p:my-2 prose-headings:my-4">
            <?php echo htmlspecialchars_decode($post['content']); ?>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-100">
            <a href="blog" class="inline-flex items-center gap-2 text-brand-teal font-bold hover:underline">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Blog
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>