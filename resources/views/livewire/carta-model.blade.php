<div> <!-- Contenedor raíz -->
    @if($showModal && $carta) 
        <div class="modal fade show" id="modalCardsAdd" tabindex="-1" aria-labelledby="modalCardsAddLabel" style="display: block;" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCardsAddLabel">Información de la Carta</h5>
                        <button type="button" class="btn-close" wire:click="closeModal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <p>Nombre: {{ $carta['key'] }}</p>
                        <p>Expansión: {{ $carta['expansion'] }}</p>
                        <p>Número de colección: {{ $carta['number'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div> <!-- Cierra el contenedor raíz -->
