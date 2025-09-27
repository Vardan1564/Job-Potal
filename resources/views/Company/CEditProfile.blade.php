<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Edit Company profile on CareerLink platform." />
    <title>Company Edit Page | CareerLink</title>
    <link rel="stylesheet" href="../style/editProfile.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
</head>

<body>
    <header class="header-main">
        <a href="{{ route('company') }}" class="logo-small">
            <img src="../Images/Logo/logo_2.png" alt="CareerLink logo" />
        </a>
        <nav class="nav-link">
            <a href="{{ route('signin') }}" title="Sign out of your account">
                Sign Out
                <span class="material-symbols-outlined" aria-hidden="true">logout</span>
            </a>
        </nav>
    </header>

    <main class="profile-layout edit-page">
        <aside class="profile-sidebar">
            <div class="profile-avatar avatar-upload">
                <img id="comapanyImgPreview" class="avatar-preview" src="/ProfilePhotos/{{ $info->profile_photo }}" alt="comapany profile preview" />
            </div>
        </aside>

        <section class="profile-content">
            <section class="section">
                <h2 class="section-title">Edit Profile</h2>
                <div class="form-wrapper">
                
                <!-- From start -->
                <form class="form" id="comapanyEditForm" novalidate 
                action="{{ route('CprofileSave') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="comapanyProfileImg">Profile Image<span class="required" aria-hidden="true"></span></label>
                                <input type="file" name="comapanyProfileImg" id="comapanyProfileImg" accept="image/*" aria-label="Upload profile photo" />
                            </div>

                            <div class="form-group">
                                <label for="comapanyNameForm">Company Name<span class="required" aria-hidden="true">*</span></label>
                                <input type="text" id="comapanyNameForm" name="comapanyNameForm" placeholder="Enter full name"  value="{{ $info->name }}"  required />
                            </div>

                            <div class="form-group">
                                <label for="emailForm">Email<span class="required" aria-hidden="true">*</span></label>
                                <input type="email" id="emailForm" name="email" placeholder="Enter email" value="{{ $info->email }}" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="phoneForm">Phone<span class="required" aria-hidden="true">*</span></label>
                                <input type="tel" id="phoneForm" name="phone" placeholder="Enter phone" value="{{ $info->number }}" required />
                            </div>


                            <div class="form-group">
                                <label for="about">About<span class="required" aria-hidden="true"></span></label>
                                <textarea id="about" name="about" placeholder="Short description" required>{{ old('about', $info->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="cityForm">Address<span class="required"></span></label>
                                <input type="text" id="cityForm" name="Address" placeholder="Enter Address" value="{{ $info->location }}" />
                              </div>

                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </section>

        </section>
    </main>
    <script>
        (function () {
            const imgInput = document.getElementById('comapanyProfileImg');
            const imgPreview = document.getElementById('comapanyImgPreview');

            if (imgInput && imgPreview) {
                imgInput.addEventListener('change', function (e) {
                    const file = e.target.files && e.target.files[0];
                    if (!file) return;
                    const reader = new FileReader();
                    reader.onload = function (ev) {
                        imgPreview.src = ev.target.result;
                    };
                    reader.readAsDataURL(file);
                });
            }
        })();
    </script>
</body>

</html>