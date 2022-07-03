<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class Tempat extends Model
{

    use HasFactory;
    protected $table = "tb_tempat";
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'alamat',
    //     'user_id',
    //     'alamat',
    //     'status',
    //     'deskripsi',
    //     'user_id',
    //     'image',
    //     'galeri',
    //     'kategori',
    //     'telp',
    //     'htm',
    //     'image2'

    // ];

    public function tempatAvatar($request)
    {
        $image = $request->file('image');
        $name = $image->hashName();
        $destination = public_path('/images');
        $image->move($destination, $name);
        return $name;
    }
    public function tempatAvatar2($request)
    {
        $image = $request->file('image2');
        $name = $image->hashName();
        $destination = public_path('/images');

        $image->move($destination, $name);
        return $name;
    }
    public function tempatAvatar3($request)
    {
        $video = $request->file('video');
        $name = $video->hashName();
        $destination = public_path('/videos');

        $video->move($destination, $name);

        return $name;
    }
    public function galeri($request)
    {
        $files = $request->file('galeri[]');
        $name = $files->hashName();
        $jumlahFile = count($files['galeri']['name']);

        for ($i = 0; $i < $jumlahFile; $i++) {
            $name = $files->hashName();
            $destination = public_path('/images');
            $files->move($destination, $name);
            return $name;
            // $name = $image->hashName();
            // $destination = public_path('/images');
            // $image->move($destination, $name);
            // return $name;
        }
    }
    public function petugas()
    {
        return $this->hasOne(User::class, 'petugas_id', 'user_id');
    }

    public function userAvatar($request)
    {
        $image = $request->file('image');
        $name = $image->hashName();
        $destination = public_path('/images');
        $image->move($destination, $name);
        return $name;
    }
    public function userAvatar2($request)
    {
        $image = $request->file('image2');
        $name = $image->hashName();
        $destination = public_path('/images');
        $image->move($destination, $name);
        return $name;
    }
    // public function Pesanan($request)
    // {
    //     return $this->HasMany(Detail_transaksi::class, 'tempat_id');
    // }
}
