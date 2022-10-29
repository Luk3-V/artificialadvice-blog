
<!doctype html>

<title>Artificial Advice</title>
<link rel="icon" type="image/x-icon" href="{{URL::to('images/favicon.ico')}}"/>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>

<style>
    html {
        scroll-behavior: smooth
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    {{-- <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16"> --}}
                    <span class="font-bold text-2xl">Artificial Advice</span>
                </a>
            </div>

            <div class="mt-4 md:mt-0 space-y-3">
                @guest
                    <a href="/register" class="text-xs mr-6 font-bold uppercase hover:underline">
                        Register Account
                    </a>
                    <a href="/signin" class="text-xs mr-6 font-bold uppercase hover:underline">
                        Sign In
                    </a>
                @else
                    @admin
                        <a href="/admin/posts" class="text-xs mr-6 font-bold uppercase hover:underline">
                            Admin
                        </a>
                    @endadmin
        
                    <form class="inline-flex" method="POST" action="/signout">
                        @csrf

                        <button type="submit" class="text-xs mr-6 font-bold uppercase hover:underline">
                            Sign Out
                        </button>
                    </form>   
                @endguest
                

                <a href="#newsletter" class="inline-block bg-blue-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-blue-600">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            {{-- <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;"> --}}
            <span class="text-3xl">🤖💬</span>
            <h5 class="text-3xl">Get updates on the latest posts!</h5>
            {{-- <p class="text-sm mt-3">Promise to keep the inbox clean. No spam.</p> --}}

            <div class="mt-10">
                <div class="relative inline-block mx-auto md:bg-gray-200 rounded-full">
                    <form method="POST" action="/newsletter" class="md:flex text-sm mb-0">
                        @csrf
                        
                        <div class="md:py-3 md:px-5 flex items-center">
                            <label for="email" class="hidden md:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input name="email" id="email" type="text" placeholder="Your email address"
                                   class="md:bg-transparent py-2 md:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 md:mt-0 md:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </footer>
    </section>

    <x-flash />
</body>
