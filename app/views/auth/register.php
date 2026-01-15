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
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

<?php if(isset($_SESSION['mode']) and $_SESSION['mode'] == 'email') { ?>
<!-- Error Alert -->
<div
  id="emailError"
  class="hidden fixed top-5 left-1/2 -translate-x-1/2
         bg-red-100 text-red-700
         px-6 py-2 rounded-md shadow-md
         text-sm"
>
  Email already exists
</div>
<?php unset($_SESSION['mode']) ?>
<?php } ?>






  <form method="POST" action="/?path=auth/store" class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl space-y-5">
    
    <h2 class="text-2xl font-bold text-center text-gray-800">
      Create Account
    </h2>

    <!-- First Name -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        First Name
      </label>
      <input
        type="text"
     required
        id="first_name"
        name="first_name"
        placeholder="John"
        class="w-full border border-gray-300 rounded-lg px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               focus:border-indigo-500 transition"
      />
         <div class="first__var">
      </div>
    </div>

    <!-- Last Name -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Last Name
      </label>
      <input
        type="text"
        id="last_name"
        name="last_name"
     required

        placeholder="Doe"
        class="w-full border border-gray-300 rounded-lg px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               focus:border-indigo-500 transition"
      />
         <div class="last__var">
      </div>
    </div>

    <!-- Birthday -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Age
      </label>
      <input
        type="number"
        name="age"
        id="age"
     required

        placeholder="Enter your age..."
        class="w-full border border-gray-300 rounded-lg px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               focus:border-indigo-500 transition"
      />
         <div class="age__var">
      </div>
    </div>

    <!-- Email -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Email
      </label>
      <input
        type="email"
        name="email"
        id="email"
     required

        placeholder="example@email.com"
        class="w-full border border-gray-300 rounded-lg px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               focus:border-indigo-500 transition"
      />
      <div class="email__var">
      </div>
    </div>

    <!-- Password -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Password
      </label>
      <input
        type="password"
        name="password"
     required

        id="password"
        placeholder="••••••••"
        class="w-full border border-gray-300 rounded-lg px-4 py-2
               focus:outline-none focus:ring-2 focus:ring-indigo-500
               focus:border-indigo-500 transition"
      />
         <div class="password__var">
      </div>
    </div>

    <!-- Submit -->
    <button
      type="submit"
      class="w-full bg-indigo-600 hover:bg-indigo-700
             text-white font-semibold py-2 rounded-lg
             focus:outline-none focus:ring-2 focus:ring-indigo-500
             transition"
    >
      Register
    </button>

    <!-- Login link -->
    <p class="text-center text-sm text-gray-600">
      Already have an account?
      <a
        href="/?path=auth/login"
        class="text-indigo-600 font-medium hover:underline cursor-pointer"
      >
        Login
      </a>
    </p>

  </form>
<script>
    
    const email = document.getElementById("email");
    const email_var = document.querySelector(".email__var");
    const password = document.getElementById("password");
    const password_var = document.querySelector(".password__var");
    const age = document.getElementById("age");
    const age_var = document.querySelector(".age__var");
    const first_name = document.getElementById("first_name");
    const first_var = document.querySelector(".first__var");
    const last_name = document.getElementById("last_name");
    const last_var = document.querySelector(".last__var");
    const emailRegex =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ ;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/ ;
    const nameRegex = /^[a-zA-Z]{3,}$/ ;
    const ageVar = 16 ;
    let validation = true;
    // const input = document.querySelectorAll("input");

      email.addEventListener('input' , ()=>{
        validationEmail();
      })
      password.addEventListener('input' , ()=>{
        validationPassword();
      })
      age.addEventListener('input' , ()=>{
        validationAge();
      })
      first_name.addEventListener('input' , ()=>{
        validationFirstName();
      })
      last_name.addEventListener('input' , ()=>{
        validationlastName();
      })

    function validationEmail(){
      email_var.innerHTML = "";
        validation = true;
      
       if(!emailRegex.test(email.value)){


        email_var.innerHTML += `
        <p class="text-[12px] text-red-500 pl-2">Please enter a valid email address (e.g., user@example.com).</p>
        `
        validation = false;
        
      }
      validationData(validation);


    }

    
    function validationPassword(){
      password_var.innerHTML = "";
        validation = true;
      
      if(!passwordRegex.test(password.value)){
        password_var.innerHTML += `
        <p class="text-[12px] text-red-500 pl-2">Passwords do not match. Please re-enter.</p>
        `
        validation = false;
      }
      validationData(validation);

    }
    
     function validationAge(){
      age_var.innerHTML = "";
        validation = true;
     
      if(age.value <= ageVar){
        age_var.innerHTML += `
        <p class="text-[12px] text-red-500 pl-2">Date of birth is required.</p>
        `;
        validation = false;
        
        
      }

      validationData(validation);

    }


     function validationFirstName(){
       first_var.innerHTML = "";
        validation = true;
      

      if(!nameRegex.test(first_name.value)){
        first_var.innerHTML += `
        <p class="text-[12px] text-red-500 pl-2">Date of birth is required.</p>
        `;
        validation = false;
      }
      validationData(validation);


    }


     function validationlastName(){
      last_var.innerHTML = "";
        validation = true;
    
  
      if(!nameRegex.test(last_name.value)){
        last_var.innerHTML += `
        <p class="text-[12px] text-red-500 pl-2">Date of birth is required.</p>
        `
        validation = false;
        
      }

      validationData(validation);

    }

     function validationData (status){
      console.log(status);
      
    return status;
    }
     

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
