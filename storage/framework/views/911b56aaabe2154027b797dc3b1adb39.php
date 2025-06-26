<?php
$alerts = [
    'info' => 'bg-cyan-100 text-cyan-800',
    'success' => 'bg-green-100 text-green-800',
    'warning' => 'bg-yellow-100 text-yellow-800',
    'danger' => 'bg-red-100 text-red-800',
    'dark' => 'bg-gray-800 text-white',
    'light' => 'bg-gray-100 text-gray-800',
];
?>

<?php $__currentLoopData = $alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(Session::has($type)): ?>
        <div class="flex w-full mb-2 alert-box">
            <div class="<?php echo e($class); ?> py-3 px-5 rounded-xl shadow flex justify-between w-full">
                <span class="text-xs font-medium self-center"><?php echo Session::get($type); ?></span>
                <button class="self-start cursor-pointer p-1" type="button"
                    onclick="this.closest('.alert-box').classList.add('hidden')">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-x-mark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 text-gray-600']); ?>
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
            </div>
        </div>
        <?php echo e(Session::forget($type)); ?>

    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\aleme\Desktop\cafeteriaEsencia Paypal1\cafeteria_Esencia paypal1\resources\views/partials/alert.blade.php ENDPATH**/ ?>