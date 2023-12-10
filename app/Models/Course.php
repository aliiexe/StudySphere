<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'sub_description', 'description', 'school',
        'domaine_id', 'duree_du_cours', 'pdf_file', 'rating', 'avg_rating',
    ];

    public function fieldOfStudy()
    {
        return $this->belongsTo(DomaineEtudes::class, 'domaine_id');
    }

    

}


