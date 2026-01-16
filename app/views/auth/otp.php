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

    input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>
  <meta charset="UTF-8" />
  <title>OTP Verification</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
 

<?php if(isset($_SESSION['mode']) and $_SESSION['mode'] == 'otp') { ?>
<!-- Error Alert -->
<div
  id="emailError"
  class="hidden fixed top-5 left-1/2 -translate-x-1/2
         bg-red-100 text-red-700
         px-6 py-2 rounded-md shadow-md
         text-sm"
>
  Invalid OTP Error
</div>
<?php unset($_SESSION['mode']) ?>
<?php } ?>

  <form
    method="post"
    action="/?path=auth/verify"
    class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl"
  >

    <!-- Title -->
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
      Verify OTP
    </h2>

    <p class="text-center text-sm text-gray-600 mb-6">
      Enter the 6-digit code sent to your email
    </p>

    <!-- 🔒 Hidden input (final OTP) -->
    <input type="hidden" name="otp_code" id="otp_code">

    <!-- OTP Inputs -->
    <div class="flex justify-center gap-3 mb-6">
      <input required type="number"  class="otp">
      <input required type="number"  class="otp">
      <input required type="number"  class="otp">
      <input required type="number"  class="otp">
      <input required type="number"  class="otp">
      <input required type="number"  class="otp">
    </div>

    <!-- Button -->
    <button
      type="submit"
      class="w-full bg-indigo-600 hover:bg-indigo-700
             text-white font-semibold py-2 rounded-lg transition"
    >
      Verify
    </button>

    <!-- Resend -->
    <p class="text-center text-sm text-gray-600 mt-4">
      Didn’t receive the code?
      <a href="#" class="text-indigo-600 hover:underline">
        Resend
      </a>
    </p>

  </form>

  <!-- Styles -->
  <style>
    .otp {
      width: 45px;
      height: 50px;
      text-align: center;
      font-size: 18px;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      outline: none;
    }

    .otp:focus {
      border-color: #6366f1;
      box-shadow: 0 0 0 2px rgba(99,102,241,0.3);
    }
  </style>

  <!-- JS -->
  <script>
    const inputs = document.querySelectorAll(".otp");
    const hiddenInput = document.getElementById("otp_code");


      document.querySelectorAll(".otp").forEach(input => {
    input.addEventListener("input", () => {
      input.value = input.value.replace(/[^0-9]/g, "").slice(0, 1);
    });
  });

    function updateOtpValue() {
      let code = "";
      inputs.forEach(input => {
        code += input.value;
      });
      hiddenInput.value = code;
    }

    inputs.forEach((input, index) => {

      input.addEventListener("input", () => {
        updateOtpValue();

        if (input.value && index < inputs.length - 1) {
          inputs[index + 1].focus();
        }
      });

      input.addEventListener("keydown", (e) => {
        if (e.key === "Backspace" && !input.value && index > 0) {
          inputs[index - 1].focus();
        }
      });

    });



//   alert deign
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
