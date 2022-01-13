<?php

include 'header.php';

?>

<body>
    <div class="flex items-center justify-center h-screen bg-[url('./public/images/bg1.jpg')] bg-no-repeat bg-cover">
<!-- noir avec opacité moins forte en background -->
        <div class="bg-gray-800 flex flex-col w-2/6 border border-gray-900 rounded-lg px-8 py-10">
            <div class="text-white mt-10">
                <h1 class="font-bold text-4xl">Welcome</h1>
                <p class="font-semibold">Let's create your account!</p>
            </div>
            <form action='./connection.php' method='POST' class="flex flex-col space-y-8 mt-10">
                <input type="text" placeholder="First name" class="border rounded-lg py-4 px-4 bg-gray-700 border-gray-700 placeholder-gray-500 text-white font-mono text-xl font-bold">
                <input type="password" placeholder="Last name" class="border rounded-lg py-4 px-4 bg-gray-700 border-gray-700 placeholder-gray-500 text-white ">
                <button class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold">Submit</button>
            </form>
            <form action='./inscription.php' method='POST' class="flex flex-col space-y-8 mt-10">
                <button class="border border-orange-500 bg-orange-500 text-white rounded-lg py-3 font-semibold"> Inscription </button>
            </form>
        </div>
        
    </div>
</body>

</html>