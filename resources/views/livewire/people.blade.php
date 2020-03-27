<div>
    <label for="search">Search</label>
    <input id="search" type="text" wire:model="search" placeholder="Search directory by name, email, or phone number." class="border px-2 py-1" />

    <div id="directory">
        <div class="mb-3">
            Per Page &nbsp;
            <select wire:model="count" name="" id="count" class="border">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="25">25</option>
            </select>
        </div>
        <table class="table-auto w-full table-striped">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="border px-4 py-2">
                        <a wire:click.prevent="sortBy('firstname')" role="button" href="#" class="text-white">
                            Name
                            @include('partials.sort-icon', ['field' => 'firstname'])
                        </a>
                    </th>
                    <th class="border px-4 py-2">
                        <a wire:click.prevent="sortBy('email')" role="button" href="#" class="text-white">
                            Email
                            @include('partials.sort-icon', ['field' => 'email'])
                        </a>
                    </th>
                    <th class="border px-4 py-2">Phone Number(s)</th>
                    <th class="border px-4 py-2">Birthday</th>
                    <th class="border px-4 py-2">
                        <a wire:click.prevent="sortBy('gender')" role="button" href="#" class="text-white">
                            Gender
                            @include('partials.sort-icon', ['field' => 'gender'])
                        </a>
                    </th>
                    <th class="border px-4 py-2">
                        <a wire:click.prevent="sortBy('is_member')" role="button" href="#" class="text-white">
                            Member
                            @include('partials.sort-icon', ['field' => ''])
                        </a>
                    </th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($people as $person)
                    <tr>
                        <td class="border px-4 py-2">{{ $person->firstname }} {{ $person->lastname ? $person->lastname : $person->family['lastname'] }}</td>
                        <td class="border px-4 py-2"><a href="mailto:{{ $person->email }}">{{ $person->email }}</a></td>
                        <td class="border px-4 py-2">
                            Home: <a href="tel:{{ $person->phoneHome }}">{{ $person->phoneHome }}</a><br>
                            Cell: <a href="tel:{{ $person->phoneCell }}">{{ $person->phoneCell }}</a><br>
                            Work: <a href="tel:{{ $person->phoneWork }}">{{ $person->phoneWork }}</a>
                        </td>
                        <td class="border px-4 py-2">{{ $person->birthdate->format('F jS') }}</td>
                        <td class="border px-4 py-2">{{ $person->gender }}</td>
                        <td class="border px-4 py-2">
                            @if($person->is_member)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td class="border px-4 py-2"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <div>
                {{ $people->links() }}
            </div>
            <div>
            <p>Showing {{ $people->firstItem() }} to {{ $people->lastItem() }} out of {{ $people->total() }} results</p>
            </div>
        </div>
    
    </div>
</div>
