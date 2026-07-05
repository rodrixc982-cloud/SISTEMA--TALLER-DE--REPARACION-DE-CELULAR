<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_venta', 'cliente_id', 'user_id', 'fecha_venta',
        'subtotal', 'descuento', 'impuesto', 'total',
        'metodo_pago', 'estado', 'notas',
    ];

    protected $casts = [
        'fecha_venta' => 'datetime',
        'subtotal'    => 'decimal:2',
        'descuento'   => 'decimal:2',
        'impuesto'    => 'decimal:2',
        'total'       => 'decimal:2',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    /**
     * Generar el siguiente número de venta automáticamente
     * Previene duplicados usando transacción y bloqueo
     */
    public static function generarNumero(): string
    {
        return DB::transaction(function () {
            // ✅ Usar lockForUpdate para evitar duplicados por concurrencia
            $ultimo = self::lockForUpdate()
                ->orderBy('numero_venta', 'desc')
                ->first();
            
            if ($ultimo) {
                // Extraer el número después de 'VTA-'
                $numero = (int) substr($ultimo->numero_venta, 4) + 1;
            } else {
                $numero = 1;
            }
            
            return 'VTA-' . str_pad($numero, 6, '0', STR_PAD_LEFT);
        });
    }
}