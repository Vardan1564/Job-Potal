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
        <!-- Header -->
        <header class="profileHeader" role="banner">
            <a href="#" class="logoImg">
                <img src="../Images/Logo/logo_2.png" alt="CareerLink logo" />
            </a>
            <nav
                class="signOutLink"
                role="navigation"
                aria-label="User  account actions"
            >
                <a href="/signout" title="Sign out of your account">
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
                    Admin Profile Overview
                </h1>

                <div class="userImg">
                    <img
                        src="../Images/Img/Admin_image.jpg"
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
            </aside>

            <!-- Right Content -->
            <section
                class="other-details"
                aria-label="Detailed profile information"
            >
                
            <section class="profile-content">
            <section class="section">
                <h2 class="section-title">Description</h2>
                
                <p class="info-card">{{ $user->description }}</p>
            </section>
                
            </section>
        </main>
    </body>
</html>
