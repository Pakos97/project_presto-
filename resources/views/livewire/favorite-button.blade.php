<div>
    <button wire:click="toggleFavorite" class="btn shadow-none position-absolute top-0 end-0" style="outline: none;">
        @if ($favorited)
            <i class="fa-solid fa-heart fa-2x" style="color: #e60505;"></i>
        @else
            <i class="fa-regular fa-heart fa-2x" style="color: #e60505;"></i>
        @endif
    </button>
</div>