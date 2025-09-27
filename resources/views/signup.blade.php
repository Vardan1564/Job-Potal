<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Job Portal | Sign Up</title>

  <!-- External CSS -->
  <link rel="stylesheet" href="../style/style.css">
</head>

<body class="LoginBody">

  <!-- Header Start -->
  <header class="loginHeader">
    <!-- Logo Section Start -->
    <a href="{{ route('index') }}">
      <img class="logo" src="../Images/Logo/logo_2.png" alt="CareerLink Logo" />
    </a>
    <!-- Logo Section End -->
  </header>
  <!-- Header End-->

  <!-- Main Start -->
  <main class="loginMain">
    <!-- Choice btn Start -->
    <section class="choiceBtn">
      <button id="btnJS" class="btnChoice active">Job Seeker</button>
      <button id="btnCompany" class="btnChoice">Company</button>
    </section>
    <!-- Choice btn End -->

    <!-- Job Seeker Form Start -->
    <section class="formWrapper">
      <div id="formJobSeeker" class="formSection">
        <h2 class="h2Title">Job Seeker Registration</h2>
        <form class="LoginForm" action="{{ route('signup_save') }}" method="post">

        @csrf

          <div class="formGroup">
            <label for="userFirstName">User Name<span class="forRequired">*</span></label>
            <input type="text" name="userName" id="userFirstName" placeholder="Enter First Name" required />
              @error('userName')
                <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>

          
          <div class="formGroup">
            <label for="userEmail">Email<span class="forRequired">*</span></label>
            <input type="email" name="userEmail" id="userEmail" placeholder="Enter EmailId" required />
             @error('userEmail')
                <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>

          <div class="formGroup">
            <label for="userContactNo">Contact No<span class="forRequired">*</span></label>
            <input type="tel" name="userContactNo" id="userContactNo" placeholder="Enter Contact No" required />
            @error('userContactNo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="formGroup">
            <label for="userPassword">Password<span class="forRequired">*</span></label>
            <input type="password" name="userPassword" id="userPassword" placeholder="Enter Password" required />
            @error('userPassword')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <input type="hidden" name="role" value="user">

          <div class="btnWrapper">
            <button type="submit" class="btnSubmit">Sign Up</button>
          </div>

        </form>
      </div>

      <!-- Job Seeker Form End -->

      <!-- Company Form Start -->

      <div id="formCompany" class="formSection hidden">
        <h2 class="h2Title">Company Registration</h2>
        <form class="LoginForm" action="{{ route('signup_save') }}" method="post">

                @csrf

          <div class="formGroup">
            <label for="companyName">Company Name<span class="forRequired">*</span></label>
            <input type="text" name="userName" id="companyName" placeholder="Enter Company Name" required />
            @error('userName')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="formGroup">
            <label for="companyEmail">Email<span class="forRequired">*</span></label>
            <input type="email" name="userEmail" id="companyEmail" placeholder="Enter Company EmailId" required />
            @error('userEmail')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>


          <div class="formGroup">
            <label for="companyContactNo">Contact No<span class="forRequired">*</span></label>
            <input type="tel" name="userContactNo" id="userContactNo" placeholder="Enter Contact No"
              required />
              @error('userContactNo')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>

          <div class="formGroup">
            <label for="companyPassword">Password<span class="forRequired">*</span></label>
            <input type="password" name="userPassword" id="companyPassword" placeholder="Enter Password" required />
            @error('userPassword')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <input type="hidden" name="role" value="company">

          <div class="btnWrapper">
            <button type="submit" class="btnSubmit">Sign Up</button>
          </div>

        </form>
      </div>

      <!-- Company Form End -->

      <div class="linkPrompt">
        <p>already have an account? <a href="{{ route('signin') }}">Sign In</a></p>
      </div>

    </section>
  </main>
  <!-- Main End -->

  <!-- External JS -->
  <script src="../script/script.js"></script>

</body>

</html>