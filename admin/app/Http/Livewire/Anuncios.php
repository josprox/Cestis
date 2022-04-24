<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Anuncio;

class Anuncios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $imagen, $contenido;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.anuncios.view', [
            'anuncios' => Anuncio::latest()
						->orWhere('imagen', 'LIKE', $keyWord)
						->orWhere('contenido', 'LIKE', $keyWord)
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
		$this->imagen = null;
		$this->contenido = null;
    }

    public function store()
    {
        $this->validate([
		'imagen' => 'required',
		'contenido' => 'required',
        ]);

        Anuncio::create([ 
			'imagen' => $this-> imagen,
			'contenido' => $this-> contenido
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Anuncio Successfully created.');
    }

    public function edit($id)
    {
        $record = Anuncio::findOrFail($id);

        $this->selected_id = $id; 
		$this->imagen = $record-> imagen;
		$this->contenido = $record-> contenido;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'imagen' => 'required',
		'contenido' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Anuncio::find($this->selected_id);
            $record->update([ 
			'imagen' => $this-> imagen,
			'contenido' => $this-> contenido
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Anuncio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Anuncio::where('id', $id);
            $record->delete();
        }
    }
}
