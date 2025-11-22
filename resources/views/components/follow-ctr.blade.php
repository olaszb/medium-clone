@props(['user'])
<div {{ $attributes }} x-data="{
    followerCount: {{ $user->followers()->count() }},
    following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
    follow() {
        axios.post('/follow/{{ $user->id }}').then(
            res => {
                this.following = !this.following
                this.followerCount = res.data.followerCount
        }).catch(err => {
            console.log(err)
        })

    }
}" class="w-[320px] border-l px-8 ">
{{ $slot }}
</div>