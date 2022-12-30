<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CREATE POST</title>

        <link rel="stylesheet" href="<?php echo e(asset('assets/css/dash.css')); ?>">

    </head>

    <body>

        <div class="relative justify-end min-h-fit md:flex lg:flex sm:flex">
            <div>
                <div class="p-5 bg-gray-700 rounded-lg shadow-sm my-8 mr-8">
                    <div class="flex items-center space-x-4">
                        <div class="bg-cyan-200 p-2 rounded-3xl">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M4 22a8 8 0 1 1 16 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"
                                    fill="rgba(0,181,38,1)" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-white">Total Users</div>
                            <div class="text-2xl font-bold text-white">10</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="p-5 bg-gray-700 rounded-lg shadow-sm my-8 mr-8">
                    <div class="flex items-center space-x-4">
                        <div class="bg-cyan-200 p-2 rounded-3xl">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M11 14.062V20h2v-5.938c3.946.492 7 3.858 7 7.938H4a8.001 8.001 0 0 1 7-7.938zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6z"
                                    fill="rgba(0,87,203,1)" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-white">Totak Personnels</div>
                            <div class="text-2xl font-bold text-white">$7520.50</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="p-5 bg-gray-700 rounded-lg shadow-sm my-8 mr-8">
                    <div class="flex items-center space-x-4">
                        <div class="bg-cyan-200 p-2 rounded-3xl">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M12.414 5H21a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2zM11 9v8h2V9h-2zm4 3v5h2v-5h-2zm-8 2v3h2v-3H7z"
                                    fill="rgba(255,0,0,1)" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-white">Crime Reports</div>
                            <div class="text-2xl font-bold text-white">$7520.50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="grid grid-cols-2">
                <form method="POST" action="/posts"
                    class="bg-gray-700 w-full shadow-md rounded-xl ml-8 px-8 pt-6 pb-8 mb-4">
                    <?php echo csrf_field(); ?>

                    <div class="mb-4">
                        <label class="block text-white text-xl font-bold mb-2" for="title">
                            Title:
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="title" type="text" name="title">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white text-xl font-bold mb-2" for="date">Date:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="date" type="date" name="date">
                    </div>

                    <div class="mb-6">
                        <label class="block text-white text-xl font-bold mb-2" for="time">Time:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="time" type="time" name="time">
                    </div>

                    <div class="mb-6">
                        <label class="block text-white text-xl font-bold mb-2" for="body">
                            Body:
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="body" name="body"></textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Create Post
                        </button>
                    </div>
                </form>

                <body class="flex justify-center">
                    <div class="bg-gray-700 mx-12 rounded-xl h-fit">
                        <header class="text-2xl font-bold m-4 text-white">Post Data Result</header>
                        <div class="py-2">
                            <ul class="list-none text-white">
                                <li class="py-2 font-semibold lg:pl-2">Data title </li>
                                <li class="py-2 font-semibold lg:pl-2">Data Content</li>
                                <li class="py-2 font-semibold lg:pl-2">Data Point 3</li>

                            </ul>
                            <div class="flex justify-end p-4">
                                <button
                                    class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md">Edit</button>
                                <div class="mx-4">
                                    <button
                                        class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-md">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>


    </body>

    </html>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\epolice\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>