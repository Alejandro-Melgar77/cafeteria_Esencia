<?php $__env->startSection('content'); ?>
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8 border border-gray-200">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Inventario</h4>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aqui podras gestionar los productos e ingredientes del inventario, recuerda que los productos son
                    aquellos que se venden y los ingredientes son aquellos que se utilizan para preparar los productos.
                </span>
            </div>
        </div>
        <div class="flex w-full flex-col lg:flex-row lg:items-start">

            <div class="flex flex-col w-full lg:w-1/2 lg:pr-2 py-2">
                <div class="flex items-center justify-between py-2">
                    <h4 class="font-semibold text-xl">Productos</h4>
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="<?php echo e(route('productos.create')); ?>">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    </a>
                </div>
                <div
                    class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        ID
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        NOMBRE
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        FECHA (VCO)
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        PRECIO VENTA
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        STOCK
                                    </p>
                                </th>
                                <th class="p-3 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500"></p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($producto->inventarios->id); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($producto->inventarios->nombre); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($producto->inventarios->fecha_vco ? $producto->inventarios->fecha_vco : 'N/A'); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($producto->Precio_venta); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($producto->inventarios->stock); ?>

                                        </p>
                                    </td>
                                    <td class="p-1 border-b border-gray-200 w-48">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="<?php echo e(route('productos.show', [$producto->id])); ?>"
                                                class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                
                                            </a>
                                            <a href="<?php echo e(route('productos.edit', [$producto->id])); ?>"
                                                class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-pencil'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                
                                            </a>
                                            <form action="<?php echo e(route('productos.destroy', [$producto->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button
                                                    class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                    type="submit"
                                                    onclick="return confirm('Estas seguro de eliminar el ID: <?php echo e($producto->id); ?>?')">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                    
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex flex-col w-full lg:w-1/2 lg:pl-2 py-2">
                <div class="flex justify-between items-center py-2">
                    <h4 class="font-semibold text-xl">Ingredientes</h4>
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="<?php echo e(route('ingredientes.create')); ?>">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    </a>
                </div>
                <div
                    class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        ID
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        NOMBRE
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        FECHA (VCO)
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        COSTO UNITARIO
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        STOCK
                                    </p>
                                </th>
                                <th class="p-3 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500"></p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ingredientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingrediente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($ingrediente->inventarios->id); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($ingrediente->inventarios->nombre); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($ingrediente->inventarios->fecha_vco ? $ingrediente->inventarios->fecha_vco : 'N/A'); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($ingrediente->Costo_Unitario); ?>

                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            <?php echo e($ingrediente->inventarios->stock); ?>

                                        </p>
                                    </td>
                                    <td class="p-1 border-b border-gray-200 w-48">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="<?php echo e(route('ingredientes.show', [$ingrediente->id])); ?>"
                                                class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                            </a>
                                            <a href="<?php echo e(route('ingredientes.edit', [$ingrediente->id])); ?>"
                                                class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-pencil'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                            </a>
                                            <form action="<?php echo e(route('ingredientes.destroy', [$ingrediente->id])); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button
                                                    class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                    type="submit"
                                                    onclick="return confirm('Estas seguro de eliminar el ID: <?php echo e($ingrediente->id); ?>?')">
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.general', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\aleme\Desktop\actualizacion de contraseña cafeteriaEsencia\La-Escencia-master act contra\resources\views/inventarios/index.blade.php ENDPATH**/ ?>