<!DOCTYPE html>
<html lang="en">
<head>
      <style>
  .fade-in {
    animation: fadeIn 0.3s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-4px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
  <meta charset="UTF-8" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

<?php if(isset($_SESSION['mode']) and $_SESSION['mode'] == 'password') { ?>
<!-- Error Alert -->
<div
  id="emailError"
  class="hidden fixed top-5 left-1/2 -translate-x-1/2
         bg-red-100 text-red-700
         px-6 py-2 rounded-md shadow-md
         text-sm"
>
  Password is incorrect
</div>
<?php unset($_SESSION['mode']) ?>
<?php } ?>
<?php if(isset($_SESSION['mode']) and $_SESSION['mode'] == 'errorEmail') { ?>
<!-- Error Alert -->
<div
  id="emailError"
  class="hidden fixed top-5 left-1/2 -translate-x-1/2
         bg-red-100 text-red-700
         px-6 py-2 rounded-md shadow-md
         text-sm"
>
  Email not found
</div>
<?php unset($_SESSION['mode']) ?>
<?php } ?>
  <form action="/?path=auth/connect" method="POST" class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl space-y-6">
    
    <h2 class="text-2xl font-bold text-center text-gray-800">
      Login
    </h2>

    <!-- Email -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Email
      </label>
      <input
        type="email"
        name="email"
        placeholder="example@email.com"
        class="w-full border border-gray-300 rounded-lg px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               focus:border-indigo-500 transition"
      />
    </div>

    <!-- Password -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Password
      </label>
      <input
        type="password"
        name="password"
        placeholder="••••••••"
        class="w-full border border-gray-300 rounded-lg px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               focus:border-indigo-500 transition"
      />
    </div>

    <!-- Submit -->
    <button
      type="submit"
      class="w-full bg-indigo-600 hover:bg-indigo-700
             text-white font-semibold py-2 rounded-lg
             focus:outline-none focus:ring-2 focus:ring-indigo-500
             transition"
    >
      Login
    </button>

    <!-- Links -->
    <div class="flex justify-between text-sm text-gray-600">
      <a href="#" class="hover:underline text-indigo-600">
        Forgot password?
      </a>
      <a href="/?path=auth/register" class="hover:underline text-indigo-600">
        Create account
      </a>
    </div>

  </form>
<script>
          tailwind.config = {
    theme: {
      extend: {
        keyframes: {
          slideDown: {
            '0%': { opacity: 0, transform: 'translateY(-10px)' },
            '100%': { opacity: 1, transform: 'translateY(0)' },
          },
        },
        animation: {
          slideDown: 'slideDown 0.4s ease-out',
        },
      },
    },
  }


  
  
    const alert = document.getElementById("emailError");
    alert.classList.remove("hidden");
    alert.classList.add("fade-in");
  
     setTimeout(() => {
      alert.classList.add("hidden");
    }, 3000);


</script>
</body>
</html>
