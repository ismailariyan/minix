<div class="flex mt-5">
    <div class="w-full">
        <div class="flex items-center">
            <!-- Like/Dislike Button -->
            @if (auth()->user()->hasLiked($tweet))
                <div
                    wire:click="dislike"
                    class="flex-1 flex items-center text-gray-800 dark:text-white text-xs hover:text-red-600 dark:hover:text-red-600 transition duration-350 ease-in-out"
                >
                    <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14 20.408c-.492.308-.903.546-1.192.709-.153.086-.308.17-.463.252h-.002a.75.75 0 01-.686 0 16.709 16.709 0 01-.465-.252 31.147 31.147 0 01-4.803-3.34C3.8 15.572 1 12.331 1 8.513 1 5.052 3.829 2.5 6.736 2.5 9.03 2.5 10.881 3.726 12 5.605 13.12 3.726 14.97 2.5 17.264 2.5 20.17 2.5 23 5.052 23 8.514c0 3.818-2.801 7.06-5.389 9.262A31.146 31.146 0 0114 20.408z"/>
                    </svg>
                    {{ $this->getLikes() }}
                </div>
            @else
                <div
                    wire:click="like"
                    class="flex-1 flex items-center text-gray-800 dark:text-white text-xs hover:text-red-600 dark:hover:text-red-600 transition duration-350 ease-in-out"
                >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"/>
                    </svg>
                    {{ $this->getLikes() }}
                </div>
            @endif

            <!-- Retweet Button -->
            <livewire:components.tweets.retweet-action :tweet="$tweet" />
        </div>

        <!-- Comment Section -->
        <div class="mt-4">
            <livewire:components.tweets.comment-section :tweet="$tweet" />
        </div>
    </div>
</div>
