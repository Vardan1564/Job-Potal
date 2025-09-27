<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <meta name="description" content="Edit User profile on CareerLink platform." />
  <title>User Edit Page | CareerLink</title>
  <link rel="stylesheet" href="../style/editProfile.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
</head>

<body>
  <!-- Header -->
  <header class="header-main">
    <a href="#" class="logo-small">
      <img src="../Images/Logo/logo_2.png" alt="CareerLink logo" />
    </a>
    <nav class="nav-link">
      <a href="{{ route('signin') }}" title="Sign out of your account">
        Sign Out
        <span class="material-symbols-outlined">logout</span>
      </a>
    </nav>
  </header>

  <!-- Main Layout -->
  <main class="profile-layout edit-page">
    <!-- Sidebar -->
    <aside class="profile-sidebar">
      <div class="profile-avatar avatar-upload">
        <img id="userImgPreview" class="avatar-preview" src="/ProfilePhotos/{{ $info->profile_photo }}"
          alt="User profile preview" />
      </div>
    </aside>

    <!-- Profile Content -->
    <section class="profile-content">
      <section class="section">
        <h2 class="section-title">Edit Profile</h2>
        <div class="form-wrapper">

        
          <form method="post" action="{{ route('seekerUpdate') }}" enctype="multipart/form-data"
            class="form" id="userEditForm" novalidate>
            <!-- Basic Info -->

            @csrf

            <div class="form-group">
              <label for="userNameForm">Full Name<span class="required">*</span></label>
              <input type="text" id="userNameForm" name="userNameForm" placeholder="Enter full name" value="{{ $info->name }}" required />
            </div>

            <div class="form-group">
              <label for="emailForm">Email<span class="required">*</span></label>
              <input type="email" id="emailForm" name="emailForm" placeholder="Enter email" value="{{ $info->email }}" required />
            </div>
            
            <div class="form-group">
              <label for="phoneForm">Phone<span class="required">*</span></label>
              <input type="tel" id="phoneForm" name="phoneForm" placeholder="Enter phone" value="{{ $info->number }}" required />
            </div>

            <div class="form-group">
              <label for="userProfileImg">Profile Image<span class="required"></span></label>
              <input type="file" name="userProfileImg" id="userProfileImg" accept="image/*"
                aria-label="Upload profile photo"  />
            </div>

            <div class="form-group">
              <label for="userResume">Resume<span class="required">*</span></label>
              <input type="file" name="userResume" id="userResume" accept=".pdf,.doc,.docx"
                aria-label="Upload resume" required />
            </div>
            
            <!-- <div class="form-group">
              <label for="stateForm">State<span class="required">*</span></label>
              <input type="text" id="stateForm" name="stateForm" placeholder="State" required />
            </div> -->

            <!-- Education Section -->

          <div class="form-group">
                <label for="about">Education<span class="required" aria-hidden="true">*</span></label>
                <textarea id="about" name="education" placeholder="Enter Education like &#10;Bachelor of Science in Computer Science&#10;CGPA 7.3&#10;Sep 2024 - Apr 2026" required>{{ old('Education', $info->education) }}</textarea>
            </div>


            <!-- <div class="form-group" id="educationSection">
              <div class="labelField">
                <label for="education">Education<span class="required">*</span></label>
                <button type="button" class="add" data-section="education" title="Add education">
                  <span class="material-symbols-outlined">add</span>
                </button>
              </div>
              <div class="inputField" id="educationList"></div>
            </div> -->


            <!-- Work Experience Section -->
            <div class="form-group">
                <label for="about">Experience<span class="required" aria-hidden="true">*</span></label>
                <textarea id="about" name="Experience" placeholder="Enter Experience like &#10;Company Name : ABC&#10;Role : Xyz&#10;Staring Date : 10/01/2004 Ending Date : 30/10/2006" required>{{ old('about', $info->work_experience) }}</textarea>
            </div>

            <!-- <div class="form-group" id="workSection">
              <div class="labelField">
                <label for="work">Work Experience<span class="required">*</span></label>
                <button type="button" class="add" data-section="work" title="Add work experience">
                  <span class="material-symbols-outlined">add</span>
                </button>
              </div>
              <div class="inputField" id="workList"></div>
            </div> -->

            <!-- Skills Section -->
           <div class="form-group">
                <label for="about">Skill<span class="required" aria-hidden="true">*</span></label>
                <textarea id="about" name="Skill" placeholder="Enter Skill like &#10;Java &#10;C &#10;Laravel" required>{{ old('about', $info->skill) }}</textarea>
            </div>

            <div class="form-group">
              <label for="cityForm">Address<span class="required"></span></label>
              <input type="text" id="cityForm" name="Address" placeholder="Enter Address" value="{{ $info->location }}" />
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </section>
    </section>
  </main>

  <!-- Script -->
  <script>
    (function () {
      // Profile image preview
      const imgInput = document.getElementById('userProfileImg');
      const imgPreview = document.getElementById('userImgPreview');
      if (imgInput && imgPreview) {
        imgInput.addEventListener('change', function (e) {
          const file = e.target.files?.[0];
          if (!file) return;
          const reader = new FileReader();
          reader.onload = ev => { imgPreview.src = ev.target.result; };
          reader.readAsDataURL(file);
        });
      }
    
      // // Templates
      // function createEducationRow() {
      //   const row = document.createElement('div');
      //   row.className = 'entry-row';
      //   row.innerHTML = `
      //     <div class="flex-row">
      //       <input type="text" name="educationUniversity[]" placeholder="Enter Board/University" required />
      //       <input type="text" name="educationDegree[]" placeholder="Enter Degree" required />
      //     </div>
      //     <div class="flex-row">
      //       <input type="month" name="educationStart[]" required />
      //       <input type="month" name="educationEnd[]" required />
      //     </div>
      //     <button type="button" class="remove" title="Remove education">
      //       <span class="material-symbols-outlined">close</span>
      //     </button>
      //   `;
      //   return row;
      // }
    
      // function createWorkRow() {
      //   const row = document.createElement('div');
      //   row.className = 'entry-row';
      //   row.innerHTML = `
      //     <div class="flex-row">
      //       <input type="text" name="workCompany[]" placeholder="Company / Organization" required />
      //       <input type="text" name="workRole[]" placeholder="Role / Position" required />
      //     </div>
      //     <div class="flex-row">
      //       <input type="month" name="workStart[]" required />
      //       <input type="month" name="workEnd[]" required />
      //     </div>
      //     <textarea name="workAbout[]" placeholder="Short description about job experience" required></textarea>
      //     <button type="button" class="remove" title="Remove work">
      //       <span class="material-symbols-outlined">close</span>
      //     </button>
      //   `;
      //   return row;
      // }
    
      // function createSkillChip(value) {
      //   const chip = document.createElement('span');
      //   chip.className = 'skill-chip';
      //   chip.innerHTML = `
      //     ${value}
      //     <button type="button" class="remove-skill" aria-label="Remove skill">&times;</button>
      //     <input type="hidden" name="skills[]" value="${value}" />
      //   `;
      //   return chip;
      // }
    
      // Event delegation for add/remove
      document.addEventListener('click', function (e) {
        const btn = e.target.closest('button');
        if (!btn) return;
    
        // Add new row/skill
        if (btn.classList.contains('add')) {
          const section = btn.dataset.section;
    
          if (section === 'education') {
            const list = document.getElementById('educationList');
            list.prepend(createEducationRow()); // New entry always on top
          }
          else if (section === 'work') {
            const list = document.getElementById('workList');
            list.prepend(createWorkRow()); // New entry always on top
          }
          else if (section === 'skill') {
            const input = document.getElementById('skillInput');
            const value = input.value.trim();
            if (value) {
              const skillsList = document.getElementById('skillsList');
              skillsList.prepend(createSkillChip(value)); // New skill on top
              input.value = '';
            }
          }
        }
    
        // Remove row
        if (btn.classList.contains('remove')) {
          const row = btn.closest('.entry-row');
          if (row) row.remove();
        }
    
        // Remove skill chip
        if (btn.classList.contains('remove-skill')) {
          const chip = btn.closest('.skill-chip');
          if (chip) chip.remove();
        }
      });
    })();
    </script>
    
    
</body>
</html>
