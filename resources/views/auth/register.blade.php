{{-- <!-- resources/views/register.blade.php -->
@if (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif

<form id="addUserForm" action="{{ url('/add-user') }}" method="POST">
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="{{ old('username') }}" required>
    @error('username')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    @error('name')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    @error('email')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    @error('password')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="preference">Trip Preference:</label>
    <select id="preference" name="preference" required>
        <option value="indoor" {{ old('preference') == 'indoor' ? 'selected' : '' }}>Indoor</option>
        <option value="outdoor" {{ old('preference') == 'outdoor' ? 'selected' : '' }}>Outdoor</option>
    </select>
    @error('preference')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="keywords">Choose Keywords that define you:</label><br>
    <div id="keywords-container">
        <!-- Keywords will load dynamically -->
    </div>
    @error('keywords')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <label for="types">Select Places to Explore:</label><br>
    <div id="types-container">
        <!-- Types will load dynamically -->
    </div>
    @error('types')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <button type="submit">Submit</button>

    <div>
        <p>Already have an account? <a href="{{ route('login.user') }}">Login here</a></p>
    </div>
</form>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const keywordsContainer = document.getElementById('keywords-container');
        const typesContainer = document.getElementById('types-container');

        // Fetch keywords dynamically
        fetch('/get-keywords')
            .then(response => response.json())
            .then(keywords => {
                keywords.forEach(keyword => {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'keywords[]';
                    checkbox.value = keyword;
                    checkbox.id = keyword;

                    const label = document.createElement('label');
                    label.htmlFor = keyword;
                    label.textContent = keyword.charAt(0).toUpperCase() + keyword.slice(1);

                    keywordsContainer.appendChild(checkbox);
                    keywordsContainer.appendChild(label);
                    keywordsContainer.appendChild(document.createElement('br'));
                });
            });

        // Fetch types dynamically
        fetch('/get-types')
            .then(response => response.json())
            .then(types => {
                types.forEach(type => {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'types[]';
                    checkbox.value = type;
                    checkbox.id = type;

                    const label = document.createElement('label');
                    label.htmlFor = type;
                    label.textContent = type.charAt(0).toUpperCase() + type.slice(1);

                    typesContainer.appendChild(checkbox);
                    typesContainer.appendChild(label);
                    typesContainer.appendChild(document.createElement('br'));
                });
            });
    });
</script> --}}

<!doctype html>
<html lang="en">
  <head>
  <title>Bali Smart Trip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/login/css/style.css">

    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

	</head>
	<body>

    <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Bali Smart Trip</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/about">About us</a></li>
          <li><a href="/generate">Generate Trip Plan</a></li>
          <li><a href="/login">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

  

    </div>
  </header>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign Up</h3>
                  <form id="addUserForm" action="{{ url('/add-user') }}" method="POST">
                    @csrf
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                    @error('username')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    <br><br>
                
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    <br><br>
                
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    <br><br>
                
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    <br><br>
                
                    <label for="preference">Trip Preference:</label>
                    <select id="preference" name="preference" required>
                        <option value="indoor" {{ old('preference') == 'indoor' ? 'selected' : '' }}>Indoor</option>
                        <option value="outdoor" {{ old('preference') == 'outdoor' ? 'selected' : '' }}>Outdoor</option>
                    </select>
                    @error('preference')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    <br><br>
                
                    <label for="keywords">Choose Keywords that define you:</label><br>
                    <div id="keywords-container">
                        <!-- Keywords will load dynamically -->
                    </div>
                    @error('keywords')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    <br><br>
                
                    <label for="types">Select Places to Explore:</label><br>
                    <div id="types-container">
                        <!-- Types will load dynamically -->
                    </div>
                    @error('types')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                    <br><br>
                
                    <button type="submit">Submit</button>
                
                    <div>
                        <p>Already have an account? <a href="{{ route('login.user') }}">Login here</a></p>
                    </div>
                </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer" class="footer dark-background">

   

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Bali Smart Trip</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

	<script src="assets/login/js/jquery.min.js"></script>
  <script src="assets/login/js/popper.js"></script>
  <script src="assets/login/js/bootstrap.min.js"></script>
  <script src="assets/login/js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const keywordsContainer = document.getElementById('keywords-container');
        const typesContainer = document.getElementById('types-container');

        // Fetch keywords dynamically
        fetch('/get-keywords')
            .then(response => response.json())
            .then(keywords => {
                keywords.forEach(keyword => {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'keywords[]';
                    checkbox.value = keyword;
                    checkbox.id = keyword;

                    const label = document.createElement('label');
                    label.htmlFor = keyword;
                    label.textContent = keyword.charAt(0).toUpperCase() + keyword.slice(1);

                    keywordsContainer.appendChild(checkbox);
                    keywordsContainer.appendChild(label);
                    keywordsContainer.appendChild(document.createElement('br'));
                });
            });

        // Fetch types dynamically
        fetch('/get-types')
            .then(response => response.json())
            .then(types => {
                types.forEach(type => {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'types[]';
                    checkbox.value = type;
                    checkbox.id = type;

                    const label = document.createElement('label');
                    label.htmlFor = type;
                    label.textContent = type.charAt(0).toUpperCase() + type.slice(1);

                    typesContainer.appendChild(checkbox);
                    typesContainer.appendChild(label);
                    typesContainer.appendChild(document.createElement('br'));
                });
            });
    });
</script>

	</body>
</html>

