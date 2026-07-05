<?php $__env->startSection('title', 'Actualizar Reparación'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('reparaciones.index')); ?>" style="color: #a855f7;">Reparaciones</a>
    </li>
    <li class="breadcrumb-item">
        <!-- ⭐ CORREGIDO - Usando URL directa -->
        <a href="/reparaciones/<?php echo e($reparacion->id); ?>" style="color: #a855f7;">
            <?php echo e($reparacion->numero_orden); ?>

        </a>
    </li>
    <li class="breadcrumb-item active">Editar</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h5 class="fw-bold mb-1">Actualizar Orden: <?php echo e($reparacion->numero_orden); ?></h5>
                        <p class="text-muted mb-0" style="font-size:13px;">
                            <?php echo e($reparacion->dispositivo); ?> — <?php echo e($reparacion->cliente->nombre_completo ?? ''); ?>

                        </p>
                    </div>
                    <!-- ⭐ CORREGIDO - Usando URL directa -->
                    <a href="/reparaciones/<?php echo e($reparacion->id); ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-eye me-1"></i>Ver Detalle
                    </a>
                </div>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="font-size:13px;"><?php echo e($e); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- ⭐ CORREGIDO - Usando URL directa -->
                <form action="/reparaciones/<?php echo e($reparacion->id); ?>" method="POST">
                    <?php echo csrf_field(); ?> 
                    <?php echo method_field('PUT'); ?>

                    <div class="row g-4">
                        
                        <div class="col-12">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">
                                <i class="fas fa-tasks me-2" style="color:#a855f7;"></i>Estado de la Orden
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label class="form-label">Estado Actual <span class="text-danger">*</span></label>
                                    <select name="estado" class="form-select" required>
                                        <?php 
                                            $estados = [
                                                'recibido' => '📥 Recibido',
                                                'en_diagnostico' => '🔍 En Diagnóstico',
                                                'esperando_repuesto' => '⏳ Esperando Repuesto',
                                                'en_reparacion' => '🔧 En Reparación',
                                                'listo' => '✅ Listo para Entregar',
                                                'entregado' => '📦 Entregado',
                                                'no_reparable' => '❌ No Reparable'
                                            ]; 
                                        ?>
                                        <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val); ?>" <?php echo e(old('estado',$reparacion->estado)==$val?'selected':''); ?>>
                                                <?php echo e($lbl); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Prioridad</label>
                                    <select name="prioridad" class="form-select">
                                        <option value="baja" <?php echo e(old('prioridad',$reparacion->prioridad)=='baja'?'selected':''); ?>>🟢 Baja</option>
                                        <option value="media" <?php echo e(old('prioridad',$reparacion->prioridad)=='media'?'selected':''); ?>>🟡 Media</option>
                                        <option value="alta" <?php echo e(old('prioridad',$reparacion->prioridad)=='alta'?'selected':''); ?>>🟠 Alta</option>
                                        <option value="urgente" <?php echo e(old('prioridad',$reparacion->prioridad)=='urgente'?'selected':''); ?>>🔴 Urgente</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Técnico Asignado</label>
                                    <select name="tecnico_id" class="form-select">
                                        <option value="">Sin asignar</option>
                                        <?php $__currentLoopData = $tecnicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($t->id); ?>" <?php echo e(old('tecnico_id',$reparacion->tecnico_id)==$t->id?'selected':''); ?>>
                                                <?php echo e($t->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">
                                <i class="fas fa-mobile-alt me-2" style="color:#a855f7;"></i>Equipo
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Dispositivo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="dispositivo"
                                           value="<?php echo e(old('dispositivo',$reparacion->dispositivo)); ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Marca</label>
                                    <input type="text" class="form-control" name="marca"
                                           value="<?php echo e(old('marca',$reparacion->marca)); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" class="form-control" name="modelo"
                                           value="<?php echo e(old('modelo',$reparacion->modelo)); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">IMEI</label>
                                    <input type="text" class="form-control" name="imei"
                                           value="<?php echo e(old('imei',$reparacion->imei)); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Color</label>
                                    <input type="text" class="form-control" name="color"
                                           value="<?php echo e(old('color',$reparacion->color)); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Fecha Estimada</label>
                                    <input type="date" class="form-control" name="fecha_estimada"
                                           value="<?php echo e(old('fecha_estimada', optional($reparacion->fecha_estimada)->format('Y-m-d'))); ?>">
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">
                                <i class="fas fa-stethoscope me-2" style="color:#a855f7;"></i>Diagnóstico Técnico
                            </h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Falla Reportada <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="falla_reportada" rows="3" required><?php echo e(old('falla_reportada',$reparacion->falla_reportada)); ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Diagnóstico del Técnico</label>
                                    <textarea class="form-control" name="diagnostico" rows="4"
                                              placeholder="Describe el diagnóstico técnico del equipo..."><?php echo e(old('diagnostico',$reparacion->diagnostico)); ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Solución Aplicada</label>
                                    <textarea class="form-control" name="solucion" rows="4"
                                              placeholder="Describe qué se hizo para solucionar la falla..."><?php echo e(old('solucion',$reparacion->solucion)); ?></textarea>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">
                                <i class="fas fa-dollar-sign me-2" style="color:#a855f7;"></i>Costos y Garantía
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Presupuesto (S/)</label>
                                    <input type="number" class="form-control" name="presupuesto"
                                           value="<?php echo e(old('presupuesto',$reparacion->presupuesto)); ?>" min="0" step="0.01">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Costo Final (S/)</label>
                                    <input type="number" class="form-control" name="costo_final"
                                           value="<?php echo e(old('costo_final',$reparacion->costo_final)); ?>" min="0" step="0.01">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">¿Incluye Garantía?</label>
                                    <select name="garantia" class="form-select">
                                        <option value="0" <?php echo e(old('garantia',$reparacion->garantia) ? '' : 'selected'); ?>>No</option>
                                        <option value="1" <?php echo e(old('garantia',$reparacion->garantia) ? 'selected' : ''); ?>>Sí</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Días de Garantía</label>
                                    <input type="number" class="form-control" name="dias_garantia"
                                           value="<?php echo e(old('dias_garantia',$reparacion->dias_garantia)); ?>" min="0">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Notas adicionales</label>
                                    <textarea class="form-control" name="notas" rows="2"><?php echo e(old('notas',$reparacion->notas)); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-4">
                    <div class="d-flex gap-2 justify-content-end">
                        <!-- ⭐ CORREGIDO - Usando URL directa -->
                        <a href="/reparaciones/<?php echo e($reparacion->id); ?>" class="btn btn-outline-secondary px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i>Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm-gestion-tienda-celulares\resources\views/reparaciones/edit.blade.php ENDPATH**/ ?>