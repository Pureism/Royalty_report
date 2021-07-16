<?php

namespace App\Models;

use CodeIgniter\Model;

class RoyaltyModel extends Model
{
    protected $table = 'royalty';
    protected $primaryKey = 'id_royalty';
    protected $useTimestamps = true;
    protected $createdField = 'dibuat';
    protected $updatedField = 'diubah';
    protected $allowedFields = ['deskripsi', 'total', 'lampiran'];
}
