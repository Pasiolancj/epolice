<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <?php if(session('status')): ?>
        <div class="alert text-green-600 font-bold text-2xl flex justify-center" data-duration="3000">
            <?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <script src="<?php echo e(asset('assets/js/user.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/show.js')); ?>"></script>

    <div class="py-2">
        <div class="h-full md:h-50 lg:h-50 m-4">
            <div class="bg-white overflow-auto md:overflow-scroll shadow-md sm:rounded-lg">
                <div class="p-6 flex-1 bg-gray-200 border-b">
                    <caption
                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        <h1 class="font-bold" style="font-size: 20px"> Manage Users </h1>
                    </caption>
                    <div class="flex justify-end m-2">
                        <button id="defaultModalButton" data-modal-toggle="defaultModal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                            focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Create User
                        </button>
                    </div>
                    <div class="table-responsive text-lg">
                        <table class="table h-full w-full bg-gray-200">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\epolice\resources\views/admin/report.blade.php ENDPATH**/ ?>