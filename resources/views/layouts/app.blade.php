<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--icons-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!--Flowbite-->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen md:flex" x-data="{ open: true }">
        <!--sidebar-->
        <aside :class="{ '-translate-x-full': !open }"
            class="z-10 bg-gray-800 text-blue-100 w-60 px-2 py-4 absolute inset-y-0 left-0 md:relative transform md:translate-x-0 overflow-y-auto
             transition ease-in-out duration-200 shadow-lg">
            <!--logo-->
            <div class="flex items-center justify-center px-2">
                <div class="flex items-center space-x-0">
                    <img src="https://img.freepik.com/free-icon/police_318-198063.jpg?auto=format&h=200"
                        style="height: 50px; align-items:center; display:inline-block" />
                    <div class="items-center inline-flex justify-center px-2">
                        <span class="text-2xl text-stone-100 font-normal" style="font-size: 15px;">Officer</span>
                    </div>
                    <button type="button" @click="open = !open"
                        class="md:hidden inline-flex p-2 items-center justify-center rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
                                fill="rgba(17,119,181,1)" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mt-4 bg-gray-600 h-[1px] flex"></div>

            <nav class="pt-2 text-[14px] tracking-wider">
                <x-sidenav-link class="rounded-xl" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <i class="ri-dashboard-line"></i>
                    <span class="font-normal text-stone-100"> Dashboard</span>
                </x-sidenav-link>
                <x-sidenav-link class="rounded-xl mt-2" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <i class="ri-user-3-fill"></i><span class="font-normal text-stone-100"> Users</span>
                </x-sidenav-link>
                <x-sidenav-link class="rounded-xl ">
                    <i class="ri-folder-chart-line"></i> <span class="font-normal text-stone-100"> Reports </span>
                </x-sidenav-link>
                <x-sidenav-link class="rounded-xl ">
                    <i class="ri-folder-chart-line"></i> <span class="font-normal text-stone-100">
                        Complaint</span>
                </x-sidenav-link>
                <div class="my-4 bg-gray-600 h-[1px]"></div>
                <div
                    class="p-2.5 mt-2 flex items-center rounded-xl px-4 duration-300 cursor-pointer hover:bg-indigo-500">
                    <i class="bi bi-chat-left-text-fill"></i>
                    <div class="flex justify-between w-full items-center" onclick="drop()">
                        <span class="text-[14px]] font-normal  hover:text-stone-100 text-stone-100"><i
                                class="ri-folder-chart-line"></i>
                            Records</span>
                        <span class="text-sm rotate-180" id="up">
                            <i class="ri-arrow-down-s-line"></i>
                        </span>
                    </div>
                </div>
                <div class="text-left text-md font-thin mt-2 mx-auto text-[14px]" id="sub">
                    <x-sidenav-link class="rounded-xl ">
                        <i class="ri-folder-chart-line"></i> <span class="font-normal text-stone-100"> Police</span>
                    </x-sidenav-link>
                    <x-sidenav-link class="rounded-xl ">
                        <i class="ri-folder-chart-line"></i> <span class="font-normal text-stone-100"> Criminal</span>
                    </x-sidenav-link>
                    <x-sidenav-link class="rounded-xl ">
                        <i class="ri-folder-chart-line"></i> <span class="font-normal text-stone-100">
                            Prisoner</span>
                    </x-sidenav-link>
                </div>
                <x-sidenav-link class="rounded-xl mt-2">
                    <i class="ri-contacts-fill"></i> <span class="font-normal text-stone-100"> Contacts</span>
                </x-sidenav-link>
                <script>
                    function drop() {
                        document.querySelector('#sub').classList.toggle('hidden')
                        document.querySelector('#up').classList.toggle('rotate-90')
                    }
                    drop()

                    function Openbar() {
                        document.querySelector('.sidebar').classList.toggle('left-[-300px]')
                    }
                </script>
            </nav>
        </aside>
        <!--Main content--->
        <main class="flex-1 bg-gray-100 h-screen">
            <nav class="bg-gray-800 shadow-lg">
                <div class="mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between md:justify-end h-16">
                        <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                            <button type="button" @click="open = !open" @click.away="open = false"
                                class="inline-flex items-center justify-center 
                            p-2 rounded-md text-blue-300 hover:bg-blue-700 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center  text-sm leading-4 font-medium  text-stone-100 hover:text-blue-700
                                       p-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                                        <img src="https://img.freepik.com/free-icon/police_318-198063.jpg?auto=format&h=200"
                                            style="height: 30px;" />
                                        <div class="pl-2" style="font-size: 12px">{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
    </div>
</body>

</html>
