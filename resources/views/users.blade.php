<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Users</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    
</head>
<body class="font-sans antialiased bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="unique-red-bg text-black dark:text-white/50 min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <?php
                use Illuminate\Support\Facades\DB;

                // Retrieve users from the database
                $users = DB::table('users')->get();

                // Check if users are retrieved
                if ($users->isNotEmpty()) {
                    echo '<table class="min-w-full divide-y divide-gray-200">';
                    echo '<thead class="bg-gray-100 dark:bg-gray-700">';
                    echo '<tr>';
                    echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">User ID</th>';
                    echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Username</th>';
                    echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Email</th>';
                    echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">';
                    foreach ($users as $user) {
                        echo '<tr>';
                        echo '<td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">' . $user->user_id . '</td>';
                        echo '<td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">' . $user->username . '</td>';
                        echo '<td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">' . $user->email . '</td>';
                        echo '<td class="px-6 py-4 whitespace-nowrap">';
                        echo '<form action="' . route('user.destroy', $user->user_id) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this user?\');">';
                        echo csrf_field();
                        echo method_field('DELETE');
                        echo '<button type="submit" class="text-red-600 hover:text-red-900">Delete</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p class="text-gray-700 dark:text-gray-300">No users found.</p>';
                }
            ?>
        </div>
    </div>
</body>
</html>