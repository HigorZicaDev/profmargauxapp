<div x-data="{open:false}">
    <div @click="open = !open">
        {{ $toggle }}
    </div>
    <div x-show="open">
        {{ $conteudo }}
    </div>
</div>