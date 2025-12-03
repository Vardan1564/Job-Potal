<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta
            name="description"
            content="Profile page of Artist on CareerLink platform."
        />
        <title>Profile Page | CareerLink</title>

        <!-- External CSS -->
        <link rel="stylesheet" href="../style/style.css" />

        <!-- Google Icons -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0"
        />
    </head>
    <body>

         <!-- SweetAlert2 for flash messages -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Success',
                    text: @json(session('success')),
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
        @endif

        <!-- Header -->
        <header class="profileHeader" role="banner">
            <a href="{{ route('user') }}" class="logoImg">
                <img src="../Images/Logo/logo_2.png" alt="CareerLink logo" />
            </a>
            <nav
                class="signOutLink"
                role="navigation"
                aria-label="User  account actions"
            >
                <a href="{{ route('signin') }}" title="Sign out of your account">
                    Sign Out
                    <span class="material-symbols-outlined" aria-hidden="true"
                        >logout</span
                    >
                </a>
            </nav>
        </header>

        <!-- Main Content -->
        <main
            class="profilemain"
            role="main"
            aria-label="User  profile information"
        >
            <!-- Left Sidebar -->
            <aside
                class="profile-details"
                aria-labelledby="profile-overview-title"
            >
                <h1 id="profile-overview-title" class="visually-hidden">
                    Profile Overview
                </h1>

                <div class="userImg">
                    <img
                        src="/ProfilePhotos/{{ $user->profile_photo }}"
                        alt="Profile picture of Artist"
                    />
                </div>

                <h2 class="userName">{{$user->name}}</h2>

                <div class="userContact p-center">
                    <p>
                        <span
                            class="material-symbols-outlined"
                            aria-hidden="true"
                            >location_on</span
                        >
                        {{ $user->location }}
                    </p>
                    <p>
                        <span
                            class="material-symbols-outlined"
                            aria-hidden="true"
                            >phone</span
                        >
                        {{$user->number}}
                    </p>
                    <p>
                        <span
                            class="material-symbols-outlined"
                            aria-hidden="true"
                            >email</span
                        >
                        {{ $user->email }}
                    </p>
                </div>

                <div class="p-center">
                    <a href="{{ route('seekerEditProfile') }}" class="edit-profile-btn" title="Edit your profile" style="display: flex;flex-direction: row;align-items: center;justify-content: center;margin: 20px 0">
                        Edit Profile
                        <span class="material-symbols-outlined" aria-hidden="true">edit</span>
                    </a>
                    <a href="{{ route('userApplicationsList') }}" class="edit-profile-btn btn-secondary" title="Browse and apply to jobs" style="display: flex;flex-direction: row;align-items: center;justify-content: center;margin: 20px 0">
                        Applied Jobs
                        <span class="material-symbols-outlined" aria-hidden="true">list_alt</span>
                    </a>
                </div>
            </aside>

            <!-- Right Content -->
            <section
                class="other-details"
                aria-label="Detailed profile information"
            >
                <!-- Resume Section -->
                <section class="resume-section" aria-labelledby="resume-title">
                    <h2 id="resume-title" class="section-title">Resume</h2>
                    <p>Uploaded Resume:</p>
                    <a
                        href="/Resumes/{{ $user->resume }}"
                        download="{{ $user->resume }}"
                        class="resume-download-link"
                        title="Download Resume"
                    >
                        {{ $user->name }}.pdf
                        <span
                            class="material-symbols-outlined"
                            aria-hidden="true"
                            >download</span
                        >
                    </a>
                </section>

                <!-- Education Section -->
                <section
                    class="education-section"
                    aria-labelledby="education-title"
                >
                    <h2 id="education-title" class="section-title">
                        Education
                    </h2>

                     <article class="education-card">
                            {{-- Display education with line breaks --}}
                        {!! nl2br(e($user->education)) !!}
                    </article>


                <!-- Work Experience Section -->
                <section
                    class="work-experience-section"
                    aria-labelledby="work-experience-title"
                >
                    <h2 id="work-experience-title" class="section-title">
                        Work Experience
                    </h2>
                
                    <article class="education-card">
                            {{-- Display education with line breaks --}}
                        {!! nl2br(e($user->work_experience)) !!}
                    </article>
                    
                </section>

                <!-- Skills Section -->
                <section class="skills-section" aria-labelledby="skills-title">
                    <h2 id="skills-title" class="section-title">Skills</h2>
                    <ul class="skills">
                        @if($user->skill)
                            @foreach(explode("\n", $user->skill) as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        @endif
                    </ul>
                </section>

                <!-- Job History Section -->
                <!-- Job History Section -->
                
            </section>
        </main>
    </body>
</html>
