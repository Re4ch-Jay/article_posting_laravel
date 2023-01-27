<x-mail::message>
# Your post was liked

{{$liker->name}} liked your post.

<x-mail::button :url="'{{route(posts.show)}}'">
View Post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
