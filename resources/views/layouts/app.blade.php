<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", user-scalable=no, minimum-scale=1.0,
        maximum-scale=1.0>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('title')</title>

    <meta name="description" content="" />

    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin />
    <link
        href="{{ url('https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap') }}"
        rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    @vite('resources/css/app.css')
</head>

<body>
    <div x-data="setup()" :class="{ 'dark': isDark }">
        <div
            class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

            <!-- Navbar -->
            <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
                @include('partials.navbar')
            </div>
            <!-- / Navbar -->

            <!-- SideBar -->
            <div
                class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
                @include('partials.sidebar')
            </div>
            <!-- / SideBar -->

            <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
                @yield('content')
            </div>



            <!-- Content wrapper -->
            {{-- <div class="content-wrapper"> --}}
            <!-- Content -->
            {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
            {{-- @yield('content') --}}
            {{-- </div> --}}
            <!-- / Content -->

            <!-- Footer -->
            {{-- @include('partials.footer') --}}
            <!-- / Footer -->

            {{-- <div class="content-backdrop fade"></div> --}}
            {{-- </div> --}}
            {{-- </div>  --}}
            <!-- Content wrapper -->
            {{-- </div> --}}
            <!-- / Layout page -->
            {{-- </div> --}}
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
            }
        }
    </script>
</body>

</html>
