@props(['subject', 'subjectCode', 'course'])
<div
    x-data = " { show : false, modalSubject: '', modalSubjectCode: ''}"
    x-show = "show"
    x-on:open-modal.window="modalSubject = $event.detail.subject; modalSubjectCode = $event.detail.subjectCode; show = true"
    x-on: close-modal.window = " show = false "
    x-on: keydown.escape.window = "show = false "
    style=" display:none"
    x-transition>

    <div>
        <div>
            <h2>{{ $subject }}</h2>
            <p>Subject Code: {{ $subjectCode }}</p>
        </div>
        <div>
            <button wire:click='enroll'>Yes</button>
            <button x-on:click="show = false" class=" bg-gray-600 text-red-500">Close</button>
        </div>
    </div>
</div>