<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-4 text-center">URL Shortener</h1>
            <form action="shorten.php" method="POST" class="space-y-4">
                <input
                    type="url"
                    name="url"
                    placeholder="Enter URL to shorten"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                    required
                >
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white p-3 rounded hover:bg-blue-600"
                >
                    Shorten URL
                </button>
            </form>
            <?php
            if (isset($_GET['shortened'])) {
                echo '<div class="mt-4 p-4 bg-green-100 text-green-800 rounded">';
                echo 'Shortened URL: <a href="http://localhost/' . htmlspecialchars($_GET['shortened']) . '" class="text-blue-500 hover:underline">http://localhost/' . htmlspecialchars($_GET['shortened']) . '</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
