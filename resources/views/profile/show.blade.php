<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl">{{ $user->name }}</h1>

                        <div class="mt-8 text-gray-900">
                            <div class="p-4">
                                @forelse ($posts as $p)
                                    <x-post-item :post="$p" />
                                @empty
                                    <div class="text-center py-16 text-gray-400">No posts yet.</div>
                                @endforelse
                            </div>

                            {{ $posts->onEachSide(1)->links() }}
                        </div>
                    </div>
                    <x-follow-ctr :user="$user">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500"><span x-text="followerCount"></span> followers</p>
                        <p>
                            {{ $user->bio }}
                        </p>
                        @if(auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button @click="follow()" class="rounded-full px-4 py-2 text-white"
                                x-text="following ? 'Unfollow' : 'Follow'"
                                :class="following ? 'bg-red-500' : 'bg-emerald-500'">
                                    
                                </button>
                            </div>
                        @endif
                    </x-follow-ctr>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>