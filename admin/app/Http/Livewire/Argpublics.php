<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Argpublic;

class Argpublics extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_mst, $id_pbc, $id_gradgrup, $id_esp, $id_turno;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.argpublics.view', [
            'argpublics' => Argpublic::latest()
						->orWhere('id_mst', 'LIKE', $keyWord)
						->orWhere('id_pbc', 'LIKE', $keyWord)
						->orWhere('id_gradgrup', 'LIKE', $keyWord)
						->orWhere('id_esp', 'LIKE', $keyWord)
						->orWhere('id_turno', 'LIKE', $keyWord)
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
		$this->id_mst = null;
		$this->id_pbc = null;
		$this->id_gradgrup = null;
		$this->id_esp = null;
		$this->id_turno = null;
    }

    public function store()
    {
        $this->validate([
		'id_mst' => 'required',
		'id_pbc' => 'required',
		'id_gradgrup' => 'required',
		'id_esp' => 'required',
		'id_turno' => 'required',
        ]);

        Argpublic::create([ 
			'id_mst' => $this-> id_mst,
			'id_pbc' => $this-> id_pbc,
			'id_gradgrup' => $this-> id_gradgrup,
			'id_esp' => $this-> id_esp,
			'id_turno' => $this-> id_turno
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Argpublic Successfully created.');
    }

    public function edit($id)
    {
        $record = Argpublic::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_mst = $record-> id_mst;
		$this->id_pbc = $record-> id_pbc;
		$this->id_gradgrup = $record-> id_gradgrup;
		$this->id_esp = $record-> id_esp;
		$this->id_turno = $record-> id_turno;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_mst' => 'required',
		'id_pbc' => 'required',
		'id_gradgrup' => 'required',
		'id_esp' => 'required',
		'id_turno' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Argpublic::find($this->selected_id);
            $record->update([ 
			'id_mst' => $this-> id_mst,
			'id_pbc' => $this-> id_pbc,
			'id_gradgrup' => $this-> id_gradgrup,
			'id_esp' => $this-> id_esp,
			'id_turno' => $this-> id_turno
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Argpublic Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Argpublic::where('id', $id);
            $record->delete();
        }
    }
}
