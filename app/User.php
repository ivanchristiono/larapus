<?php

namespace App;

use App\Book;
use App\BorrowLog;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Exceptions\BookException;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function borrow(book $book){

        //cek apakah buku masih tersedia u/ dipinjam
        if ($book->stock < 1){
            throw new BookException("Buku $book->title sedang tidak tersedia");
        }

        //cek apakah buku sedang dipinjam atau tidak oleh user
        if ($this->borrowLogs()
            ->where('book_id',$book->id)
            ->where('is_returned',0)->count() > 0)
        {
            throw new BookException("Buku $book->title sedang anda pinjam");     
        }

        $borrowLog = BorrowLog::create([
            'user_id' => $this->id, 
            'book_id' => $book->id, 
            'isReturned' => 1
            ]);
        return $borrowLog;
    }

    protected $casts = ['is_verified'=>'boolean'];

    public function borrowLogs(){
        return $this->hasMany('App\BorrowLog');
    }

    public function sendVerification(){
        $user = $this;
        $token = str_random(40);
        $user->verification_token = $token;
        $user->save();

        Mail::send('auth.emails.verification', compact('user','token'), function ($m) use ($user){
            $m->to($user->email, $user->name)->subject('Verifikasi Akun Larapus');
        });
    }
}