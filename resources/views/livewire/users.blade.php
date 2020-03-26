<div>
    <h2>List of users</h2>
    <input type="text" wire:model="search" />
    <p>{{ $search }}</p>
    <div id="users">
        <ol>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }}
                </li>
            @endforeach
        </ol>
    </div>
</div>
