<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $title }} - Project 2</title>
    <meta name="description" content="Web Technologies Project 2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
      crossorigin="anonymous"
    >
    <style>
      /* Black and white theme */
      body {
        background-color: #000; /* Black background */
        color: #fff;           /* White text */
      }

      a, a:hover, a:focus, a:active {
        color: #ccc;           /* Light gray links */
        text-decoration: none; /* No underline on links */
      }

      nav.navbar {
        background-color: #222; /* Darker black for navbar */
      }

      nav.navbar a.nav-link {
        color: #fff; /* White text for navbar links */
      }

      nav.navbar a.nav-link:hover {
        color: #ccc; /* Gray on hover */
      }

      footer {
        background-color: #111; /* Slightly lighter black for footer */
        color: #fff;            /* White text */
      }

      table {
        background-color: #333; /* Dark background for tables */
        color: #fff;            /* White text */
      }

      button, input, select, textarea {
        background-color: #444; /* Darker input fields */
        color: #fff;            /* White text */
        border: 1px solid #555; /* Subtle border */
      }
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-primary mb-3" data-bs-theme="dark">
      <div class="container">
        <span class="navbar-brand mb-0 h1">Project 2</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            @if(Auth::check())
              <li class="nav-item">
                <a class="nav-link" href="/authors">Authors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Log out</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="/login">Authenticate</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="container flex-grow-1 my-4">
      <div class="row">
        <div class="col">
          @yield('content')
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-3">
      <div class="container">
        <p class="mb-0">&copy; Polats Didzis Ozdemirs, 2024. All rights reserved.</p>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-w76A6SnhOtqf27Y1eQIHknzhrb6IiwowfXjWr9lo0kQa9bBh8KnBBlxkVoF05W3G" 
      crossorigin="anonymous">
    </script>

    <!-- Custom Admin JS -->
    <script src="/js/admin.js"></script>
  </body>
</html>
