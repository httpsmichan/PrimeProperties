<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet"> <!-- Alice Font -->

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        rowdies: ["Rowdies", "cursive"],
                        alice: ["Alice", "serif"],  <!-- Added Alice Font -->
                    }
                }
            }
        };
    </script>
</head>
<body class="h-screen overflow-y-scroll bg-white mt-5 px-5 py-0 m-0">
    <nav class="w-full bg-[#eff1ed] bg-opacity-80 py-2 px-10 rounded-t-[30px] shadow-md">
        <div class="container mx-auto flex justify-between items-center text-sm">
            <div class="text-md font-bold flex items-center font-rowdies font-light text-black">
                <img src="/images/khouse.png" alt="Logo" class="h-6 mr-2">
                Prime Properties
            </div>
            <div class="bg-gray-600 bg-opacity-30 p-1 rounded-[30px] border border-white flex space-x-3">
                <a href="#about" class="px-10 py-2 rounded-[20px] bg-grey-50 text-black hover:bg-[#85A98F]">About</a>
                <a href="#services" class="px-10 py-2 rounded-[20px] bg-transparent text-black hover:bg-[#85A98F]">Services</a>
                <a href="#support" class="px-10 py-2 rounded-[20px] bg-transparent text-black hover:bg-[#85A98F]">Support</a>
                <a href="#contact" class="px-10 py-2 rounded-[20px] bg-transparent text-black hover:bg-[#85A98F]">Contact</a>
            </div>
            <div>
                <a href="{{ route('login') }}" class="px-7 py-3 rounded-[30px] bg-[#183D3D] text-white hover:bg-[#5C8374] text-sm">Find a Home</a>
            </div>
        </div>
    </nav>

    <section id="about" class="h-[80vh] bg-[#eff1ed] flex items-start text-white text-2xl px-10 p-0 relative">
    <!-- Left Side Content -->
    <div class="flex flex-col items-left text-left max-w-md z-10">
        <h2 class="px-5 mt-[160px] text-5xl font-alice text-black">Find Your Home</h2>
        <p class="mt-2 text-5xl px-5 text-black font-rowdies whitespace-nowrap">
            Buy a Home, Rent a Home, Sell a Home.
        </p>

<!-- Search Bar -->
<div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 w-full max-w-3xl bg-white shadow-md rounded-lg flex justify-between items-center p-4 border border-gray-300">
    <input type="text" placeholder="Search properties..." class="flex-1 p-2 border border-gray-300 rounded-md text-gray-700">
    <button class="bg-[#183D3D] text-white px-4 py-2 ml-2 rounded-[30px] hover:bg-[#5C8374]">
        <img src="/icons/serg.png" alt="Search Icon" class="w-5 h-5">
    </button>
</div>

</div>

    </div>

    <div class="flex justify-end w-full absolute top-0 right-0 z-0">
        <div class="relative">
            <img src="/images/GreenHouse.png" alt="About Us Image" class="w-[800px] mt-[100px] h-auto">
        </div>
    </div>
</section>

    <section id="services" class="h-[50vh] bg-blue-300 flex flex-col items-center justify-center text-white text-2xl px-10 p-0">
        <h2 class="bg-black bg-opacity-50 px-3 py-1 rounded-md text-lg">Services</h2>
        <p class="mt-2 text-sm text-center max-w-md">We offer real estate buying, selling, and property management services.</p>
    </section>

    <section id="support" class="h-[50vh] bg-yellow-300 flex flex-col items-center justify-center text-white text-2xl px-10 p-0">
        <h2 class="bg-black bg-opacity-50 px-3 py-1 rounded-md text-lg">Support</h2>
        <p class="mt-2 text-sm text-center max-w-md">Our support team is here to assist you 24/7 with all your needs.</p>
    </section>

    <section id="contact" class="h-[50vh] bg-green-300 flex flex-col items-center justify-center text-white text-2xl px-10 p-0 rounded-b-[30px]">
        <h2 class="bg-black bg-opacity-50 px-3 py-1 rounded-md text-lg">Contact</h2>
        <p class="mt-2 text-sm text-center max-w-md">Get in touch with us via email or phone to start your journey today.</p>
        <a href="{{ route('login') }}" class="mt-4 px-3 py-1 rounded-[15px] bg-[#5A6C57] text-black hover:bg-[#85A98F] text-sm">Find a Home</a>
    </section>
</body>
</html>
