<div class="modal fade show" id="modalCardsAdd" tabindex="-1" aria-labelledby="modalCardsAddLabel" style="display: block;" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCardsAddLabel">Información de la Carta</h5>
                <button type="button" class="btn-close" wire:click="$set('showModal', false)" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p>Nombre: {{ $selectedCarta['key'] }}</p>
                <p>Expansión: {{ $selectedCarta['expansion'] }}</p>
                <p>Número de colección: {{ $selectedCarta['number'] }}</p>
            </div>
        </div>
    </div>
</div>
