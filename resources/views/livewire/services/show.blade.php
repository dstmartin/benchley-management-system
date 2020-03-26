<div>
    <h2>Attendance Check-in</h2>

    <div class="mb-3">
        <button class="btn btn-outline-primary @if($status === 'All') active @endif" wire:click.prevent="filterStatus('All')">View All</button>
        <button class="btn btn-outline-primary @if($status === 'Not Assigned') active @endif" wire:click.prevent="filterStatus('Not Assigned')">View Not Assigned</button>
        <button class="btn btn-outline-primary @if($status === 'Present') active @endif" wire:click.prevent="filterStatus('Present')">View Present</button>
        <button class="btn btn-outline-primary @if($status === 'Out of Town') active @endif" wire:click.prevent="filterStatus('Out of Town')">View Out of Town</button>
        <button class="btn btn-outline-primary @if($status === 'Sick') active @endif" wire:click.prevent="filterStatus('Sick')">View Sick</button>
        <button class="btn btn-outline-primary @if($status === 'Absent') active @endif" wire:click.prevent="filterStatus('Absent')">View Absent</button>
    </div>

    <ol>
        @foreach ($people as $person)
        <div class="flex border">
            <div class="w-1/2 border-r px-4 py-2">{{ $person->firstname }} {{ $person->lastname ? $person->lastname : $person->family['lastname'] }}</div>
            <div class="w-1/2 px-4 py-2">
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                  <button type="button" wire:click.prevent="changeStatus( {{ $person->id }}, 'Present')" class="btn btn-outline-success @if($person->pivot->status === 'Present') active @endif">Present</button>
                  <button type="button" wire:click.prevent="changeStatus( {{ $person->id }}, 'Out of Town')" class="btn btn-outline-info @if($person->pivot->status === 'Out of Town') active @endif">Out of Town</button>
                  <button type="button" wire:click.prevent="changeStatus( {{ $person->id }}, 'Sick')" class="btn btn-outline-danger @if($person->pivot->status === 'Sick') active @endif">Sick</button>
                  <button type="button" wire:click.prevent="changeStatus( {{ $person->id }}, 'Absent')" class="btn btn-outline-secondary @if($person->pivot->status === 'Absent') active @endif">Absent</button>
                </div>
            </div>
        </div>    
        
        <!-- <li>
                {{ $person->firstname }}
                 
            </li> -->
        @endforeach
    </ol>
</div>
