<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Social;

class Socials extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_usuario, $info_datos;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.socials.view', [
            'socials' => Social::latest()
						->orWhere('id_usuario', 'LIKE', $keyWord)
						->orWhere('info_datos', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_usuario = null;
		$this->info_datos = null;
    }

    public function store()
    {
        $this->validate([
		'id_usuario' => 'required',
		'info_datos' => 'required',
        ]);

        Social::create([ 
			'id_usuario' => $this-> id_usuario,
			'info_datos' => $this-> info_datos
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Social Successfully created.');
    }

    public function edit($id)
    {
        $record = Social::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_usuario = $record-> id_usuario;
		$this->info_datos = $record-> info_datos;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_usuario' => 'required',
		'info_datos' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Social::find($this->selected_id);
            $record->update([ 
			'id_usuario' => $this-> id_usuario,
			'info_datos' => $this-> info_datos
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Social Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Social::where('id', $id);
            $record->delete();
        }
    }
}
