<div>
    {{-- Stop trying to control. --}}
    <div class="w-full my-3">
        <form wire:submit.prevent="sendComment" >
            <div class="w-full p-2 bg-blue-500 text-white rounded-t">Comment</div>
            <textarea wire:model="comment" id="" cols="30" rows="5" class="w-full border-2 border-blue-400 rounded-b p-2 focus:ring-red-500">
            </textarea>
            @error('comment')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <button class="w-max text-white bg-blue-400 p-2 font-medium rounded shadow hover:bg-blue-500" type="submit">Comment</button>
        </form>

    </div>
    <hr>
    <div class="w-full">
        @if ($comments->count() != 0)
            @foreach ($comments as $c)
            <div class="content-notification w-full block border-b border-b-2 p-2">
                <div class="content-profile-text  flex gap-x-4">
                    <div class="content-profile h-15 w-15 overflow-hidden items-center gap-x-4">
                        @if ($c->user->profile == null)
                        <img src="/img/user.png" alt="" class="w-[40px] h-[40px]">
                        @else
                        <img src="/storage/{{ $c->user->profile }}" alt="" class=" w-[60px] h-[60px] object-cover rounded-full">
                        @endif
                    </div>
                    <div class="content-text">
                        <p class="text-lg font-medium">{{ '@'.$c->user->username }}</p>
                        <p class="ml-1">{!! $c->comment !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
