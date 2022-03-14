<div>

    <div class="w-full my-3">
        <form wire:submit.prevent="sendComment" >
            <div class="w-full p-2 bg-blue-500 text-white rounded-t">Comment</div>
            {{-- <textarea wire:model.debounce.365ms="comment" cols="30" rows="5"  class="w-full border-2 border-blue-400 rounded-b p-2 focus:ring-red-500">
            </textarea> --}}
            <div wire:ignore class="p-2 border-2 border-blue-500 rounded-b mb-2">
                <trix-editor
                wire:model.debounce.365ms="comment" class="editor-content"></trix-editor>
            </div>
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
                        <img src="/img/user.png" alt="" class="w-[40px] h-[40px] rounded-full">
                        @else
                        <img src="/storage/{{ $c->user->profile }}" alt="" class=" w-[40px] h-[40px] object-cover rounded-full">
                        @endif
                    </div>
                    <div class="content-text w-full">
                        <p class="text-lg font-medium">{{ '@'.$c->user->username }}
                            @if ($c->user->id == auth()->user()->id)
                            <button type="button" class="text-base text-blue-500" wire:click.prevent="isEdit({{ $c->id }})">
                                @if ($isEditComment)
                                    @if ($idComment == $c->id)
                                    Batal edit
                                    @else
                                    Edit
                                    @endif
                                @else
                                    Edit
                                @endif
                            </button>
                            |
                            <button class="text-base text-red-500" type="button" wire:click.prevent="sendDeleteComment({{ $c->id }})">
                                Delete
                            </button>
                            @endif
                        </p>
                        @if ($idComment == $c->id)
                            @if ($isEditComment)
                            <form wire:submit.prevent="sendEditComment({{ $c->id }})" class="w-full my-2">
                                <div class="w-full p-2 bg-blue-500 text-white rounded-t">Edit comment</div>
                                <div wire:ignore class="p-2 mb-2 border-2 border-blue-500 rounded-b">
                                    <trix-editor
                                    wire:model.debounce.365ms="editComment" class="editor-content"></trix-editor>
                                </div>
                                @error('editComment')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                                <button class="w-max text-white bg-blue-400 p-2 font-medium rounded shadow hover:bg-blue-500" type="submit">Edit</button>
                            </form>
                            @endif
                        @else
                            <p class="ml-1">{!! $c->comment !!}
                            </p>
                                @if (\Carbon\Carbon::parse($c->created_at) == \Carbon\Carbon::parse($c->updated_at))
                                <p class="ml-1 text-sm text-gray-400">datetime : {{ \Carbon\Carbon::parse($c->created_at)->diffForHumans() }}</p>
                                @else
                                <p class="ml-1 text-sm text-gray-400">datetime : {{ \Carbon\Carbon::parse($c->created_at)->diffForHumans() }} | edit : {{ \Carbon\Carbon::parse($c->updated_at)->diffForHumans() }}</p>
                                @endif
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
