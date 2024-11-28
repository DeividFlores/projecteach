<div>
    <form>
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" wire:model="vacante.titulo">
        
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" wire:model="vacante.descripcion"></textarea>

        <button type="button" wire:click="actualizar">Actualizar</button>
    </form>
</div>

