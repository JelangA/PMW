<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workshop extends Model
{
	use HasFactory;
	
	// Tentukan nama tabel (jika tidak sesuai dengan konvensi)
	protected $table = 'workshops';

	protected $primaryKey = 'workshop_id';
	
	// Tentukan kolom yang dapat diisi
	protected $fillable = [
		'title', 'description', 'start_time', 'end_time', 'location'
	];
	
	// Relasi: Workshop memiliki banyak QR Code
	public function qrCodes()
	{
		return $this->hasMany(QrCode::class, 'workshop_id');
	}
	
	// Relasi: Workshop memiliki banyak absensi
	public function attendances() : HasMany
	{
		return $this->hasMany(Attendance::class, 'workshop_id', 'workshop_id');
	}
}
