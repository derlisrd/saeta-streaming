<div class="my-4">

    <div class="search-box">
        <div class="form-floating">
            <input class="form-control" autofocus name="search" autocomplete="off" wire:model="search" wire:keyup="SearchResult" placeholder="Buscar cliente..."/>
            <label>Buscar cliente</label>
        </div>
    </div>
        @if($showdiv)
        <ul class="list-group" >
            @if(!empty($clientes))
                @foreach($clientes as $c)
                <li class="list-group-item" role="button" wire:click="SelectCliente({{ $c->id }})">{{ $c->nombre_completo }} {{ $c->doc}} </li>
                @endforeach
            @endif
        </ul>
        @endif
        @empty(!$selected)
        <div class="alert alert-warning my-2">
            {{ $nombre_completo }}  {{ $doc }}
        </div>
        <input type="hidden" name="cliente_id" value="{{ $cliente_id }}" />
        @endempty
</div>

