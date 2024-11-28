<form class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante">

    <div>
        <x-input-label for="titulo" :value="__('Titulo de competencia')" />
        <x-text-input
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            :value="old('titulo')" 
            placeholder="Titulo competencia"
         />

        @error("titulo")
            <livewire:mostrar-alerta :message="$message"/>
        @enderror

    </div>

    <div>
        <x-input-label for="costo" :value="__('Costo de inscripción')" />
        <select
            
                id="costo"
                wire:model="costo"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            >
                <option>-- Seleccione --</option>
                @foreach ($costos as $costo)
                <option value="{{ $costo->id}}">{{$costo -> costo}}</option>
                @endforeach
        </select>

        @error("costo")
            <livewire:mostrar-alerta :message="$message"/>
        @enderror

    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select
            
                id="categoria"
                wire:model="categoria"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            >
                <option>-- Seleccione --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id}}">{{$categoria -> categoria}}</option>
                @endforeach
                
        </select>

        @error("categoria")
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="tema" :value="__('Tema')" />
        <x-text-input
            id="tema" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="tema" 
            :value="old('tema')" 
            placeholder="Tema: ej. Php, Laravel"
         />

         @error("tema")
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para inscribirse')" />
        <x-text-input
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
         />

         @error("ultimo_dia")
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción competencia')" />
        <textarea
            id="descripcion" 
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72" 
            wire:model="descripcion" 
            placeholder="Descripción general de la competencia"
         ></textarea>

         @error("descripcion")
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Subir ejercicio')" />
        <x-text-input
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen" 
            accept="image/*" 
         />

        <div class="my-5 w-96">
            @if ($imagen)
                <p class="text-sm">Imagen previa:</p>
                <img src="{{ $imagen->temporaryUrl() }}">
            
            @endif
        </div>
         @error("imagen")
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <x-primary-button class="w-full justify-center">
                {{ __('Crear competencia') }}
        </x-primary-button>
    

</form>
