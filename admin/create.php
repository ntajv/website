<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_path = '';

    // Handle Image Upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $filename = $_FILES['image']['name'];
        $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($file_ext, $allowed)) {
            $upload_dir = '../assets/img/blog/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $new_filename = uniqid() . '.' . $file_ext;
            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_path = 'assets/img/blog/' . $new_filename;
            } else {
                echo "<script>alert('Gagal mengupload gambar. Periksa folder permission.');</script>";
            }
        } else {
            echo "<script>alert('Format file tidak didukung. Harap upload JPG, JPEG, PNG, GIF, atau WEBP.');</script>";
        }
    } elseif (isset($_FILES['image']) && $_FILES['image']['error'] !== 4) {
        // Error handling for other upload errors (excluding "no file selected" which is error 4)
        echo "<script>alert('Terjadi kesalahan saat upload gambar. Error code: " . $_FILES['image']['error'] . "');</script>";
    } else {
        // Default image
        $image_path = 'https://images.unsplash.com/photo-1576091160550-2187d80aeff2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80';
    }

    $stmt = $conn->prepare("INSERT INTO blog_posts (title, content, image) VALUES (?, ?, ?)");
    $stmt->execute([$title, $content, $image_path]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Post - Vananta Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Simple WYSIWYG or just Textarea -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-teal-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Vananta Admin</h1>
            <a href="index.php" class="text-sm hover:underline">Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Postingan Baru</h2>

            <form method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Judul</label>
                    <input type="text" name="title"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-teal-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Gambar Utama</label>
                    <input type="file" name="image"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-teal-500"
                        accept="image/*">
                    <p class="text-xs text-gray-500 mt-1">Biarkan kosong untuk menggunakan gambar default.</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Konten</label>
                    <textarea name="content" id="content" required></textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="index.php"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">Batal</a>
                    <button type="submit"
                        class="bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600 transition">Simpan
                        Postingan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.config.versionCheck = false;
        CKEDITOR.replace('content', {
            // Include basic tailwind typography styles
            contentsCss: [
                'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
                'data:text/css;charset=utf-8,' + encodeURIComponent(`
                    body {
                        font-family: 'Poppins', sans-serif;
                        color: #475569; /* prose-slate */
                        font-size: 1.125rem; /* prose-lg */
                        line-height: 1.75;
                        padding: 20px;
                    }
                    p { margin-top: 0.5em; margin-bottom: 0.5em; }
                    h1, h2, h3, h4, h5, h6 {
                        color: #1e293b;
                        font-weight: 700;
                        margin-top: 1.5em;
                        margin-bottom: 0.5em;
                        line-height: 1.3;
                    }
                    h2 { font-size: 1.5em; }
                    h3 { font-size: 1.25em; }
                    ul { list-style-type: disc; padding-left: 1.5em; margin-top: 1em; margin-bottom: 1em; }
                    ol { list-style-type: decimal; padding-left: 1.5em; margin-top: 1em; margin-bottom: 1em; }
                    li { margin-top: 0.25em; margin-bottom: 0.25em; }
                    blockquote {
                        border-left: 4px solid #e2e8f0;
                        padding-left: 1em;
                        color: #64748b;
                        font-style: italic;
                    }
                `)
            ],
            height: 400
        });
    </script>
</body>

</html>