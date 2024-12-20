<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
	use HasFactory;
	
	// Tentukan nama tabel
	protected $table = 'qr_codes';
	
	// Tentukan kolom yang dapat diisi
	protected $fillable = [
		'qr_code_type', 'workshop_id', 'qr_code'
	];
	
	// Relasi: QR Code terkait dengan satu workshop
	public function workshop()
	{
		return $this->belongsTo(Workshop::class, 'workshop_id');
	}
}
