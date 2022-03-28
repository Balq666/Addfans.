<div>
    {{-- Be like water. --}}
    <h1 class="text-2xl w-full font-medium text-blue-500 shadow p-3">Semua Notifikasi</h1>
    <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 w-11/12 mx-auto">
        <div class="w-full h-screen">
            @if ($notification->count() > 0)
                @foreach ($notification as $n)
                <a href="/notifications/{{ $n->slug }}" class="block border shadow">
                    <div class="content-notification w-full block border-b border-b-2 @if($n->read == 1) bg-gray-50 @endif last:border-0 p-2">
                        <div class="content-profile-text  flex gap-x-4">
                            <div class="content-profile h-15 w-15 overflow-hidden items-center gap-x-4">
                                @if ($n->user->profile == null)
                                <img src="/img/user.png" alt="" class="w-[60px] h-[60px]">
                                @else
                                <img src="/storage/{{ $n->user->profile }}" alt="" class=" w-[60px] h-[60px] object-cover rounded-full">
                                @endif
                            </div>
                            <div class="content-text w-full">
                                <p class="text-lg font-medium">{{ '@'.$n->user->username }}</p>
                                <p class="ml-1">{{ $n->message }}</p>
                                <p class="text-right">{{$n->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            @else
            <div class="flex h-full w-full justify-center items-center">
                <div class="notif-blank">
                    <img src="/img/no-data.png" alt="" class="mx-auto xl:w-3/5 lg:w-3/5 md:w-3/5 sm:2/5 w-11/12">
                    <p class="text-center">Belom ada notifikasi!</p>
                </div>
            </div>
            @endif
            @if ($cantAdd)
            @else
            <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full mx-auto my-2">
                <button type="button" wire:click="addLimitNotif" class="block mx-auto text-4xl">
                    <div class="icon-content flex items-center justify-center hover:bg-blue-300 hover:text-white transition w-full p-2 bg-blue-50 rounded-full">
                        <img src="/img/plus.png" alt="" class="w-12">
                    </div>
                </button>
            </div>
            @endif
        </div>
    </div>

</div>
