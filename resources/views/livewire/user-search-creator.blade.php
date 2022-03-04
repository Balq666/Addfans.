<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 w-11/12 mx-auto border">
        <div class="kotak p-2 w-full ">
                <div class="container w-full flex justify-center items-center ">
                    <div class="relative w-full">
                        <input type="text" class="h-14 w-full border pr-8 pl-5 rounded z-0 focus:shadow focus:outline-none" placeholder="Cari creator?" wire:model="search">
                        @if (empty($search))
                        <div class="absolute top-3 right-3 text-2xl">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        @else
                        <div class="absolute top-3 right-3 text-2xl">
                            <button wire:click.prevent="emptySearch" type="button">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
        </div>
        @if ($search)
        <div class="kotak p-2 w-full">
            <div class="title-kotak flex pl-3 rounded-t items-center text-white h-14 bg-blue-500">
                List Creator
            </div>
            <div class="content-kotak border-2 rounded-b border-blue-500">
                @if ($creators->count() != 0)
                    @foreach ($creators as $creator)
                    @if ($creator->hasRole('creator'))
                    <a href="/profile/{{ $creator->username }}" class="block border last:rounded-b shadow">
                        <div class="content-notification w-full block border-b border-b-2 last:border-0 p-2">
                            <div class="content-profile-text  flex gap-x-4">
                                <div class="content-profile h-15 w-15 overflow-hidden items-center gap-x-4">
                                    @if ($creator->profile == null)
                                    <img src="/img/user.png" alt="" class="w-[60px] h-[60px]">
                                    @else
                                    <img src="/storage/{{ $creator->profile }}" alt="" class=" w-[60px] h-[60px] object-cover rounded-full">
                                    @endif
                                </div>
                                <div class="content-text">
                                    <p class="text-lg font-medium">{{ '@'.$creator->username }}</p>
                                    <p class="text-base font-medium">{{ $creator->name }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                    <div class="p-2">
                        {{ $creators->links('vendor.livewire.tailwind') }}
                    </div>
                @else
                    <div class="emote flex items-center p-2">
                        <p>Wah, kreatornya udah pensiun!</p>
                        <p class="text-2xl">😔</p>
                    </div>
                @endif

            </div>
        </div>
        @endif
    </div>

</div>
