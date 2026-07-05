<?php $__env->startSection('title', 'Nueva Reparación'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('reparaciones.index')); ?>" style="color:#a855f7;">Reparaciones</a></li>
    <li class="breadcrumb-item active">Nueva Orden</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1">Nueva Orden de Reparación</h5>
                <p class="text-muted mb-4" style="font-size:13px;">Registra un nuevo equipo para servicio técnico</p>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li style="font-size:13px;"><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('reparaciones.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row g-4">
                        
                        <div class="col-12">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">
                                <i class="fas fa-users me-2" style="color:#a855f7;"></i>Asignación
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Cliente <span class="text-danger">*</span></label>
                                    <select name="cliente_id" class="form-select <?php $__errorArgs = ['cliente_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="">— Seleccionar cliente —</option>
                                        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>"
                                                    <?php echo e((old('cliente_id', request('cliente')) == $c->id) ? 'selected' : ''); ?>>
                                                <?php echo e($c->nombre_completo); ?> — <?php echo e($c->telefono); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['cliente_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Técnico Asignado <span class="text-danger">*</span></label>
                                    <select name="tecnico_id" class="form-select <?php $__errorArgs = ['tecnico_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="">— Seleccionar técnico —</option>
                                        <?php $__currentLoopData = $tecnicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($t->id); ?>" <?php echo e(old('tecnico_id')==$t->id?'selected':''); ?>>
                                                <?php echo e($t->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['tecnico_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Prioridad <span class="text-danger">*</span></label>
                                    <select name="prioridad" class="form-select" required>
                                        <option value="baja" <?php echo e(old('prioridad')=='baja'?'selected':''); ?>>🟢 Baja</option>
                                        <option value="media" <?php echo e(old('prioridad','media')=='media'?'selected':''); ?>>🟡 Media</option>
                                        <option value="alta" <?php echo e(old('prioridad')=='alta'?'selected':''); ?>>🟠 Alta</option>
                                        <option value="urgente" <?php echo e(old('prioridad')=='urgente'?'selected':''); ?>>🔴 Urgente</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">
                                <i class="fas fa-mobile-alt me-2" style="color:#a855f7;"></i>Datos del Equipo
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Dispositivo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['dispositivo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="dispositivo" value="<?php echo e(old('dispositivo')); ?>"
                                           placeholder="Ej: Smartphone, Tablet...">
                                    <?php $__errorArgs = ['dispositivo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Marca</label>
                                    <input type="text" class="form-control" name="marca"
                                           value="<?php echo e(old('marca')); ?>" placeholder="Samsung, Apple, Xiaomi...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" class="form-control" name="modelo"
                                           value="<?php echo e(old('modelo')); ?>" placeholder="Galaxy A54, iPhone 15...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">IMEI / Serie</label>
                                    <input type="text" class="form-control" name="imei"
                                           value="<?php echo e(old('imei')); ?>" placeholder="123456789012345">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Color</label>
                                    <input type="text" class="form-control" name="color"
                                           value="<?php echo e(old('color')); ?>" placeholder="Negro, Blanco...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Fecha Estimada de Entrega</label>
                                    <input type="date" class="form-control" name="fecha_estimada"
                                           value="<?php echo e(old('fecha_estimada')); ?>" min="<?php echo e(date('Y-m-d')); ?>">
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">
                                <i class="fas fa-exclamation-triangle me-2" style="color:#a855f7;"></i>Falla y Presupuesto
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label">Falla Reportada por el Cliente <span class="text-danger">*</span></label>
                                    <textarea class="form-control <?php $__errorArgs = ['falla_reportada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                              name="falla_reportada" rows="4"
                                              placeholder="Describe exactamente qué problema reporta el cliente..."><?php echo e(old('falla_reportada')); ?></textarea>
                                    <?php $__errorArgs = ['falla_reportada'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Presupuesto Estimado (S/)</label>
                                    <input type="number" class="form-control" name="presupuesto"
                                           value="<?php echo e(old('presupuesto', 0)); ?>" min="0" step="0.01">
                                    <div style="font-size:12px; color:#9ca3af; margin-top:4px;">
                                        Dejar en 0 si aún no se determinó
                                    </div>

                                    <label class="form-label mt-3">Notas Adicionales</label>
                                    <textarea class="form-control" name="notas" rows="4"
                                              placeholder="Accesorios recibidos, observaciones al recibir el equipo..."><?php echo e(old('notas')); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-4">
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="<?php echo e(route('reparaciones.index')); ?>" class="btn btn-outline-secondary px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i>Registrar Orden
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm-gestion-tienda-celulares\resources\views/reparaciones/create.blade.php ENDPATH**/ ?>