<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="output.css" rel="stylesheet">
    <title>Data Encryption</title>
    <style>
        [x-cloak] {
            display: none
        }
    </style>

<script>
        const userDataString = sessionStorage.getItem('userData');
        

        if (!userDataString) {
            window.location.href = 'login.php';
        }
        
    </script>
</head>

<body style="font-family: 'Inter', sans-serif;">

    <section class="flex h-screen overflow-auto">




        <div class="w-1/5 border-r-2 h-full border-gray-200 p-6 flex flex-col justify-between sticky top-0 ">



            <div class="flex flex-col gap-6">
                <div>
                    <input type="text" style="background-image: url('img/search.svg'); background-position-x:4%;"
                        class="w-full pl-10 pr-4 py-3 border rounded-lg focus:outline-none focus:border-indigo-500 bg-no-repeat bg-center "
                        placeholder="Search">
                </div>


                <div>
                    <a href="encrypt.php">
                        <button style="background-image: url('img/home.svg'); background-position-x:4%;"
                            class="w-full bg-no-repeat bg-center  py-3 rounded-lg">
                            <p class="text-left pl-12  font-semibold">
                                Home
                            </p>
                        </button>
                    </a>
                    <a href="files.php">
                        <button style="background-image: url('img/3-layers.svg'); background-position-x:4%;"
                            class="w-full bg-no-repeat bg-center bg-blue-100 py-3 rounded-lg">
                            <p class="text-left pl-12 font-semibold text-blue-500">
                                Files
                            </p>
                        </button>
                    </a>
                </div>
            </div>




            <div>
                <a href="settings.php">
                    <button style="background-image: url('img/settings.svg'); background-position-x:4%;"
                        class="w-full bg-no-repeat bg-center py-3 rounded-lg my-3">
                        <p class="text-left pl-12 font-semibold">
                            Settings
                        </p>
                    </button>
                </a>
                <hr>
                <div class="flex pl-2 py-3">
                    <div class="bg-blue-100 rounded-full h-fit p-2">
                        <img src="img/user.svg" alt="">
                    </div>
                    <div class="pl-2 w-full">
                        <div class="flex justify-between items-center">
                            <p id="username" class="font-semibold username">Hans Opoku</p>
                            <style>
                                [x-cloak] {
                                    display: none
                                }
                            </style>
                            <div x-data="{ modelOpen: false }">
                                <button @click="modelOpen =!modelOpen"
                                    class="justify-center text-white text-md hover:bg-red-200  focus:ring-4 focus:outline-none  focus:ring-gray-100 font-medium rounded-lg px-2 py-2  ">

                                    <img src="img/log-out.svg" alt="">

                                </button>

                                <div x-show="modelOpen" class="fixed flex justify-center items-center inset-0 z-50 overflow-y-auto"
                                    aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div
                                        class="flex items-center justify-center px-4 text-center sm:block sm:p-0">
                                        <div x-cloak @click="modelOpen = true" x-show="modelOpen"
                                            x-transition:enter="transition ease-out duration-300 transform"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-200 transform"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="fixed inset-0 transition-opacity bg-gray-700 bg-opacity-60"
                                            aria-hidden="true"></div>

                                        <div x-cloak x-show="modelOpen"
                                            x-transition:enter="transition ease-out duration-300 transform"
                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="transition ease-in duration-200 transform"
                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            class="inline-block w-fit max-w-md p-6 my-10 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl xl:max-w-xl">
                                            <div class="flex items-center justify-between">
                                                <h1 class="text-xl w-full text-center font-bold text-gray-800 ">
                                                    Logout</h1>


                                            </div>

                                            <p class="mt-2 text-md text-gray-800 text-center w-fit ">
                                                Are you sure you want to logout of your account?
                                            </p>

                                            <x-text-input name="id" type="hidden" value="{{ $site->id }}" />

                                            <div class="flex justify-center mt-6">
                                                <button for="show" @click="modelOpen = false" type="button"
                                                    class="mr-2 w-1/2 py-2 text-sm tracking-wide capitalize transition-colors border border-gray-300 duration-200 transform bg-white hover:bg-gray-200 rounded-md">
                                                    Cancel
                                                </button>
                                                <button @click="logout"
                                                    class="justify-center text-white text-md bg-red-500 hover:bg-red-600 border border-gray-200 focus:ring-4 focus:outline-none shadow-md focus:ring-gray-100 font-medium rounded-lg text-sm w-1/2 py-2.5 text-center inline-flex items-center">
                                                    <span>Logout</span>
                                                </button>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p id="userEmail" class=" userEmail text-sm text-gray-500">hansoheneba.io@gmai.com</p>
                    </div>
                </div>
            </div>


        </div>


        <div class="p-10 w-full">
            <div class="flex flex-col gap-2">
                <h1 class="font-bold text-xl">Encrypt Your files</h1>
                <p class="font-semibold text-sm text-gray-500">Upload all your files to encrypt them.</p>
            </div>


            <div class=" py-10 flex items-center justify-center">
                <div class=" shadow border border-gray-200 w-full h-4/5">
                    <div class="flex justify-between items-center px-10 py-5 border-b">
                        <h1 class="font-semibold text-xl">
                            All FIles
                        </h1>
                        <div x-data="{ modelOpen: false }">
                            <button @click="modelOpen =!modelOpen"
                                class="bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring px-10 focus:border-blue-300 font-semibold flex gap-2">
                                <img src="img/upload-cloud.svg" alt="">
                                <p>Upload File</p>
    
                            </button>
    
                            <div x-show="modelOpen"
                                class="fixed flex justify-center items-center inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-center justify-center px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = true" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-700 bg-opacity-60"
                                        aria-hidden="true"></div>
    
                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-fit max-w-md p-6 my-10 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl xl:max-w-xl"
                                        style="z-index: 100;">
                                        <div class="flex items-center justify-between">
                                            <h1 class="text-xl w-full font-bold text-gray-800 ">
                                                Encrypt File</h1>
    
    
                                        </div>
    
                                        <p class="mt-2 text-md text-gray-800 w-fit ">
                                            complete the form to encrypt your data
                                        </p>
    
                                        <form action="" method="post" enctype="multipart/form-data">
    
                                            <div class="py-2">
                                                <label for="textFile" class=" text-gray-600 text-sm font-medium">Text
                                                    File</label><br>
                                                <input type="file" id="textFile" name="textFile"
                                                    class="p-2 w-full border rounded-lg bg-white cursor-pointer text-gray-400"
                                                    accept=".txt">
    
    
    
                                            </div>
                                            <div class="py-2">
                                                <label for="imageFile" class=" text-gray-600 text-sm font-medium">Image
                                                    File</label><br>
                                                <input type="file" id="imageFile" name="imageFile"
                                                    class="p-2 w-full border rounded-lg bg-white cursor-pointer text-gray-400"
                                                    accept="image/*">
    
                                            </div>
    
    
                                            <div class="mb-4 py-2">
                                                <label for="name" class="block text-gray-600 text-sm font-medium">Output
                                                    file name</label>
                                                <input type="name" id="name" name="name"
                                                    class=" p-2 w-full border rounded-md"
                                                    placeholder="provide a name for your encrypted file">
                                            </div>
    
    
    
    
    
                                        </form>
    
                                        <div class="flex justify-center mt-6">
                                            <button for="show" @click="modelOpen = false" type="button"
                                                class="mr-2 w-1/2 py-2 text-sm tracking-wide capitalize transition-colors border border-gray-300 duration-200 transform bg-white hover:bg-gray-200 rounded-md">
                                                Cancel
                                            </button>
                                            <button for="show" @click="modelOpen = false" type="button"
                                                class="justify-center bg-blue-500 text-white hover:bg-blue-600 focus:ring focus:outline-none shadow-md focus:ring-gray-100 font-medium rounded-lg text-sm w-1/2 py-2.5 text-center inline-flex items-center">
                                                <span><input type="submit" value="Encrypt File"></span>
                                            </button>
    
    
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <article class="content">
                                        <table class="min-w-full text-left text-sm font-light">
                                            <thead
                                                class="border-b font-extralight text-xs text-slate-500 bg-slate-100/50 h-full border-gray-200">
                                                <tr>
                                                    <th scope="col" class="px-6 py-2">Name</th>
                                                    <th scope="col" class="px-6 py-2">File Size</th>
                                                    <th scope="col" class="px-6 py-2">Date Uploaded</th>
                                                    <th scope="col" class="px-6 py-2">Encryption Key</th>
                                                    <th scope="col" class="py-2"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b border-gray-200">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        <div class="flex items-center gap-3"><img
                                                                class="rounded-full bg-blue-200 p-2 " src="img/file.svg"
                                                                alt=""> File Name</div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">300KB</td>
                                                    <td class="whitespace-nowrap px-6 py-4">12/11/23</td>
                                                    <td class="whitespace-nowrap px-6 py-4">encryption.hash</td>
                                                    <td>
                                                        <button class="px-3">
                                                            <img src="img/trash-2.svg" alt="delete button">
                                                        </button>
                                                        <button class="px-3">
                                                            <img src="img/download.svg" alt="Download button">
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="border-b border-gray-200">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        <div class="flex items-center gap-3"><img
                                                                class="rounded-full bg-blue-200 p-2 " src="img/file.svg"
                                                                alt=""> File Name</div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">300KB</td>
                                                    <td class="whitespace-nowrap px-6 py-4">12/11/23</td>
                                                    <td class="whitespace-nowrap px-6 py-4">encryption.hash</td>
                                                    <td>
                                                        <button class="px-3">
                                                            <img src="img/trash-2.svg" alt="delete button">
                                                        </button>
                                                        <button class="px-3">
                                                            <img src="img/download.svg" alt="Download button">
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="border-b border-gray-200">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        <div class="flex items-center gap-3"><img
                                                                class="rounded-full bg-blue-200 p-2 " src="img/file.svg"
                                                                alt=""> File Name</div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">300KB</td>
                                                    <td class="whitespace-nowrap px-6 py-4">12/11/23</td>
                                                    <td class="whitespace-nowrap px-6 py-4">encryption.hash</td>
                                                    <td>
                                                        <button class="px-3">
                                                            <img src="img/trash-2.svg" alt="delete button">
                                                        </button>
                                                        <button class="px-3">
                                                            <img src="img/download.svg" alt="Download button">
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="border-b border-gray-200">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        <div class="flex items-center gap-3"><img
                                                                class="rounded-full bg-blue-200 p-2 " src="img/file.svg"
                                                                alt=""> File Name</div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">300KB</td>
                                                    <td class="whitespace-nowrap px-6 py-4">12/11/23</td>
                                                    <td class="whitespace-nowrap px-6 py-4">encryption.hash</td>
                                                    <td>
                                                        <button class="px-3">
                                                            <img src="img/trash-2.svg" alt="delete button">
                                                        </button>
                                                        <button class="px-3">
                                                            <img src="img/download.svg" alt="Download button">
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="border-b border-gray-200">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        <div class="flex items-center gap-3"><img
                                                                class="rounded-full bg-blue-200 p-2 " src="img/file.svg"
                                                                alt=""> File Name</div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">300KB</td>
                                                    <td class="whitespace-nowrap px-6 py-4">12/11/23</td>
                                                    <td class="whitespace-nowrap px-6 py-4">encryption.hash</td>
                                                    <td>
                                                        <button class="px-3">
                                                            <img src="img/trash-2.svg" alt="delete button">
                                                        </button>
                                                        <button class="px-3">
                                                            <img src="img/download.svg" alt="Download button">
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="border-b border-gray-200">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        <div class="flex items-center gap-3"><img
                                                                class="rounded-full bg-blue-200 p-2 " src="img/file.svg"
                                                                alt=""> File Name</div>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">300KB</td>
                                                    <td class="whitespace-nowrap px-6 py-4">12/11/23</td>
                                                    <td class="whitespace-nowrap px-6 py-4">encryption.hash</td>
                                                    <td>
                                                        <button class="px-3">
                                                            <img src="img/trash-2.svg" alt="delete button">
                                                        </button>
                                                        <button class="px-3">
                                                            <img src="img/download.svg" alt="Download button">
                                                        </button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <script src="script.js"></script>

</body>

</html>