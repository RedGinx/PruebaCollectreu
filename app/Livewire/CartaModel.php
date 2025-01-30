<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Carta;

class CartaModel extends Component
{

    public $cartas; // Las cartas que mostrarás
    public $carta; // Para almacenar la carta seleccionada
    public $showModal = false; // Para mostrar u ocultar el modal

    public function mount()
    {
        // Cargar las cartas desde la base de datos
        $this->cartas = Carta::all();
    }

    // Método para abrir el modal y pasar los datos de la carta seleccionada
    public function showModal($key, $expansion, $number)
    {
        $this->carta = [
            'key' => $key,
            'expansion' => $expansion,
            'number' => $number,
        ];
        $this->showModal = true;
    }

    // Método para cerrar el modal
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.carta-model');
    }
}
