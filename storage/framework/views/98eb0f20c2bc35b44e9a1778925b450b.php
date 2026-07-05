<?php $__env->startSection('title', 'Nuevo Producto'); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('productos.index')); ?>" style="color:#a855f7;">Inventario</a></li>
    <li class="breadcrumb-item active">Nuevo Producto</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1">Registrar Nuevo Producto</h5>
                <p class="text-muted mb-4" style="font-size:13px;">Completa los datos del producto</p>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li style="font-size:13px;"><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('productos.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="row g-4">
                        
                        <div class="col-lg-8">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">Información General</h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Código SKU <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['codigo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="codigo" value="<?php echo e(old('codigo')); ?>" placeholder="SAM-A54-128">
                                    <?php $__errorArgs = ['codigo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Nombre del Producto <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="nombre" value="<?php echo e(old('nombre')); ?>" placeholder="Samsung Galaxy A54 128GB">
                                    <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Categoría <span class="text-danger">*</span></label>
                                    <select name="categoria_id" class="form-select <?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="">— Seleccionar —</option>
                                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>" <?php echo e(old('categoria_id')==$cat->id?'selected':''); ?>>
                                                <?php echo e($cat->nombre); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Marca <span class="text-danger">*</span></label>
                                    <select name="marca_id" class="form-select <?php $__errorArgs = ['marca_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="">— Seleccionar —</option>
                                        <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($m->id); ?>" <?php echo e(old('marca_id')==$m->id?'selected':''); ?>>
                                                <?php echo e($m->nombre); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['marca_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" class="form-control" name="modelo"
                                           value="<?php echo e(old('modelo')); ?>" placeholder="A54, iPhone 15...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Color</label>
                                    <input type="text" class="form-control" name="color"
                                           value="<?php echo e(old('color')); ?>" placeholder="Negro, Blanco...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Condición <span class="text-danger">*</span></label>
                                    <select name="condicion" class="form-select" required>
                                        <option value="nuevo" <?php echo e(old('condicion','nuevo')=='nuevo'?'selected':''); ?>>Nuevo</option>
                                        <option value="reacondicionado" <?php echo e(old('condicion')=='reacondicionado'?'selected':''); ?>>Reacondicionado</option>
                                        <option value="usado" <?php echo e(old('condicion')=='usado'?'selected':''); ?>>Usado</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Almacenamiento</label>
                                    <select name="almacenamiento" class="form-select">
                                        <option value="">— Sin especificar —</option>
                                        <?php $__currentLoopData = ['32GB','64GB','128GB','256GB','512GB','1TB']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($alm); ?>" <?php echo e(old('almacenamiento')==$alm?'selected':''); ?>><?php echo e($alm); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">RAM</label>
                                    <select name="ram" class="form-select">
                                        <option value="">— Sin especificar —</option>
                                        <?php $__currentLoopData = ['2GB','3GB','4GB','6GB','8GB','12GB','16GB']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ram): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ram); ?>" <?php echo e(old('ram')==$ram?'selected':''); ?>><?php echo e($ram); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">IMEI</label>
                                    <input type="text" class="form-control" name="imei"
                                           value="<?php echo e(old('imei')); ?>" placeholder="123456789012345">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="3"
                                              placeholder="Características, detalles del producto..."><?php echo e(old('descripcion')); ?></textarea>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">Precios y Stock</h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Precio de Compra (S/) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control <?php $__errorArgs = ['precio_compra'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="precio_compra" value="<?php echo e(old('precio_compra',0)); ?>"
                                           min="0" step="0.01" oninput="calcularMargen()">
                                    <?php $__errorArgs = ['precio_compra'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Precio de Venta (S/) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control <?php $__errorArgs = ['precio_venta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="precio_venta" value="<?php echo e(old('precio_venta',0)); ?>"
                                           min="0" step="0.01" oninput="calcularMargen()">
                                    <?php $__errorArgs = ['precio_venta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Margen de Ganancia</label>
                                    <div class="form-control d-flex align-items-center" style="background:#f9fafb;">
                                        <span id="margenValor" style="font-weight:600; color:#10b981;">0.0%</span>
                                        <span id="margenMonto" class="ms-2 text-muted" style="font-size:12px;"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Stock Inicial <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="stock" value="<?php echo e(old('stock',0)); ?>" min="0">
                                    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Stock Mínimo <span class="text-danger">*</span>
                                        <i class="fas fa-info-circle text-muted fa-xs" title="Alerta cuando baje de este número"></i>
                                    </label>
                                    <input type="number" class="form-control" name="stock_minimo"
                                           value="<?php echo e(old('stock_minimo',5)); ?>" min="0">
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-lg-4">
                            <h6 class="fw-600 mb-3" style="font-weight:600; color:#1e1b4b;">Imagen del Producto</h6>
                            <div id="dropZone" onclick="document.getElementById('imagenInput').click()"
                                 style="border:2px dashed #d1d5db; border-radius:16px; padding:32px 20px;
                                        text-align:center; cursor:pointer; background:#fafafa; transition:.2s;"
                                 ondragover="event.preventDefault(); this.style.borderColor='#a855f7';"
                                 ondragleave="this.style.borderColor='#d1d5db';"
                                 ondrop="handleDrop(event)">
                                <div id="dropContent">
                                    <i class="fas fa-cloud-upload-alt fa-3x mb-3" style="color:#d1d5db;"></i>
                                    <p class="mb-1" style="font-size:13px; color:#6b7280;">Arrastra la imagen aquí</p>
                                    <p class="mb-0" style="font-size:12px; color:#9ca3af;">o haz clic para seleccionar</p>
                                    <p class="mb-0 mt-2" style="font-size:11px; color:#d1d5db;">JPG, PNG, WebP · Máx 2MB</p>
                                </div>
                                <img id="previewImg" src="" style="display:none; width:100%; border-radius:10px; max-height:200px; object-fit:cover;">
                            </div>
                            <input type="file" id="imagenInput" name="imagen" accept="image/*"
                                   style="display:none;" onchange="previewImage(this)">

                            <?php $__errorArgs = ['imagen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1" style="font-size:12px;"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            
                            <div class="mt-4 p-3 rounded-3" style="background:#f8f5ff;">
                                <h6 style="font-size:13px; font-weight:600; margin-bottom:12px;">Resumen de Precio</h6>
                                <div class="d-flex justify-content-between mb-2" style="font-size:13px;">
                                    <span class="text-muted">Precio compra</span>
                                    <span id="resCompra">S/ 0.00</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2" style="font-size:13px;">
                                    <span class="text-muted">Precio venta</span>
                                    <span id="resVenta" style="font-weight:600;">S/ 0.00</span>
                                </div>
                                <hr style="margin:8px 0;">
                                <div class="d-flex justify-content-between" style="font-size:13px;">
                                    <span class="text-muted">Ganancia unitaria</span>
                                    <span id="resGanancia" style="color:#10b981; font-weight:600;">S/ 0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-4">
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-outline-secondary px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i>Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('previewImg').style.display = 'block';
            document.getElementById('dropContent').style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function handleDrop(e) {
    e.preventDefault();
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const dt = new DataTransfer();
        dt.items.add(file);
        document.getElementById('imagenInput').files = dt.files;
        previewImage(document.getElementById('imagenInput'));
    }
}

function calcularMargen() {
    const compra = parseFloat(document.querySelector('[name=precio_compra]').value) || 0;
    const venta  = parseFloat(document.querySelector('[name=precio_venta]').value) || 0;
    const margen = compra > 0 ? ((venta - compra) / compra * 100) : 0;
    const ganancia = venta - compra;

    document.getElementById('margenValor').textContent = margen.toFixed(1) + '%';
    document.getElementById('margenValor').style.color = margen >= 0 ? '#10b981' : '#dc2626';
    document.getElementById('margenMonto').textContent = '(S/ ' + ganancia.toFixed(2) + ')';
    document.getElementById('resCompra').textContent  = 'S/ ' + compra.toFixed(2);
    document.getElementById('resVenta').textContent   = 'S/ ' + venta.toFixed(2);
    document.getElementById('resGanancia').textContent = 'S/ ' + ganancia.toFixed(2);
    document.getElementById('resGanancia').style.color = ganancia >= 0 ? '#10b981' : '#dc2626';
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crm-gestion-tienda-celulares\resources\views/productos/create.blade.php ENDPATH**/ ?>