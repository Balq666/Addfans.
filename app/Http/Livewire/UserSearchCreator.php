<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserSearchCreator extends Component
{
    public $search;
    public $creators;
    public $tempCreators;
    protected $queryString = ['search'];
    public function render()
    {
        if(!is_null($this->search)){
            $this->tempCreators = DB::table('model_has_roles')->where('role_id',1)->get();
            // dd($this->tempCreators->pluck('model_id'));
            $this->creators = User::search($this->search)->whereIn('id',$this->tempCreators->pluck('model_id')->toArray())->get();
            dd($this->creators);
        }
        return view('livewire.user-search-creator');
    }
}
