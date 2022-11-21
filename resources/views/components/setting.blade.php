@props(['heading'])
 <section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>
    
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Dashboard</h4>
            <ul>
                <li>
                    <a href="/dashboard/posts" class="{{ request()->is('dashboard/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>
        
                <li>
                    <a href="/dashboard/posts/create" class="{{ request()->is('dashboard/posts/create') ? 'text-blue-500' : "" }}">New Post</a>
                </li>
                <li>
                    <a href="/dashboard/create-category" class="{{ request()->is('dashboard/create-category') ? 'text-blue-500' : "" }}">New Category</a> 
                </li>
                
            </ul>
        </aside>

<main class="flex-1">
    <x-panel>
        {{ $slot }}
    </x-panel>
</main>

</section>


