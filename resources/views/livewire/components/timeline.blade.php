<div>
    @forelse ($tweets as $tweet )
    <livewire:components.tweets.tweet :tweet="$tweet" :wire:key="$tweet->id" />
    @empty
    <div>
        <p class="text-center text-lg text-gray-400">No tweets yet</p>
    </div>
    @endforelse
</div>