<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UserSearchCreator extends Component
{
    use WithPagination;
    public $search;
    protected $queryString = ['search'];
    public function emptySearch(){
        $this->search = null;
    }
    public function render()
    {
        $creators = null;
        if(!is_null($this->search)){
            // cari user creator berdasarkan username dan name
            $creators = User::search($this->search, function($user){
                return $user->role('creator');
            })->paginate(5);
        } else {
            // jika null maka kembalikan sebagai null
            $creators = null;
        }
        return view('livewire.user-search-creator',[
            'creators'=>$creators
        ]);
    }
}
