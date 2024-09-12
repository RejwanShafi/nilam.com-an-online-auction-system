
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7ie2D44Nyh/a6xoXmj8lztF5dY3Nck1BQHs" crossorigin="anonymous">

    <!-- Custom CSS for Sidebar -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .wrapper {
            display: flex;
            width: 100%;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            padding: 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            width: 100%;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .btn-logout {
            background-color: red;
            color: white;
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 14px;
        }
        .form-control-search {
            height: 40px;
        }
        .btn-search {
            height: 25px;
            padding: 10 15px;
        }
        .box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        /* Table styling for Excel-like appearance */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Ensures columns have fixed width */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4 class="p-3">Nilam</h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link active">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Seller</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Auction</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Bidding</a>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link">Widgets</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Forms</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Charts</a> -->
            </li>
            <li class="nav-item mt-3">
                <a href="{{ route('profile.update') }}" class="btn btn-outline-secondary w-100">Update Profile</a>
            </li>
            <li class="nav-item mt-3">
                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                    @csrf
                    <button type="submit" class="btn btn-logout w-100">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation Bar -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex me-auto">
                    <input class="form-control me-2 form-control-search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary btn-search" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container mt-4">
            <h2>Welcome to Admin Dashboard</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p>{{ __("You're logged in!") }}</p>
                            <!-- You can add more content here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-10">
            <h1>Dashboard</h1>

            <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Users Table</h4>
                <div class="box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($normalUsers) && $normalUsers->isNotEmpty())
                                @foreach ($normalUsers as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><button class="btn btn-primary">View</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

<!-- Add Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kaHTS3waUS5r5kTE6rbZV0Dhl3ngsZdcS7HX/JvWbKndYP1pc2QBxjRrxRRyGdHQ" crossorigin="anonymous"></script>

</body>
</html>
