<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <h1>Admin Dashboard</h1>
    <a href="{{ route('profile') }}">profile</a>
</body>
</html>