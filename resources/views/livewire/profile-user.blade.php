<div>
    @if (!$userKe2->isFollowing($user))
    <button wire:click="followUser" class="bg-blue-500 p-2 rounded font-medium text-white">Follow</button>
    @else
    <button wire:click="unFollowUser" class="bg-blue-500 p-2 rounded font-medium text-white">unFollow</button>
    @endif
</div>
