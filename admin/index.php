<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$stmt = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Vananta Care</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-teal-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Vananta Admin</h1>
            <div class="flex items-center gap-4">
                <span>Welcome, Admin</span>
                <a href="logout.php" class="bg-teal-700 px-3 py-1 rounded hover:bg-teal-800 transition">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Blog</h2>
            <a href="create.php" class="bg-teal-500 text-white px-4 py-2 rounded shadow hover:bg-teal-600 transition">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Postingan
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6">Judul</th>
                        <th class="py-3 px-6">Tanggal</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php foreach ($posts as $post): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <span class="font-medium">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <?php echo date('d M Y', strtotime($post['created_at'])); ?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center gap-2">
                                    <a href="../post.php?id=<?php echo $post['id']; ?>" target="_blank"
                                        class="w-8 h-8 rounded-full bg-blue-100 text-blue-500 flex items-center justify-center hover:bg-blue-200"
                                        title="View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?php echo $post['id']; ?>"
                                        class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-500 flex items-center justify-center hover:bg-yellow-200"
                                        title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $post['id']; ?>"
                                        class="w-8 h-8 rounded-full bg-red-100 text-red-500 flex items-center justify-center hover:bg-red-200"
                                        title="Delete"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>