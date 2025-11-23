@props(['user', 'size' => 'w-12  h-12'])

@if ($user->imageUrl())
    <img src="{{ $user->imageUrl('avatar') }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@else
    <img src="/dummy-avatar.jpg" class="{{ $size }} rounded-full">
@endif