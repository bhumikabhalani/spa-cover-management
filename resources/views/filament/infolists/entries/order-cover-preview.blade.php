@php
    $state = $getState();
@endphp

<div class="spa-cover-preview">
    <div class="spa-cover-preview__canvas">
        {!! $state['svg'] ?? '' !!}
    </div>

    <dl class="spa-cover-preview__dimensions">
        <div>
            <dt>Width</dt>
            <dd>{{ $state['width'] ?? '—' }} in</dd>
        </div>
        <div>
            <dt>Height</dt>
            <dd>{{ $state['height'] ?? '—' }} in</dd>
        </div>
        <div>
            <dt>Radius</dt>
            <dd>{{ $state['corner_radius'] ?? '—' }} in</dd>
        </div>
    </dl>

    <p class="spa-cover-preview__color">
        <span class="spa-cover-preview__swatch" style="background-color: {{ $state['color'] ?? '#000' }};"></span>
        {{ $state['color'] ?? '' }}
    </p>
</div>

<style>
    .spa-cover-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-radius: 0.75rem;
        border: 1px solid rgb(229 231 235);
        background: rgb(249 250 251);
    }

    .dark .spa-cover-preview {
        border-color: rgb(55 65 81);
        background: rgb(17 24 39);
    }

    .spa-cover-preview__canvas {
        display: flex;
        width: 100%;
        max-width: 18rem;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        border-radius: 0.5rem;
        background: white;
        box-shadow: inset 0 2px 4px 0 rgb(0 0 0 / 0.05);
    }

    .dark .spa-cover-preview__canvas {
        background: rgb(31 41 55);
    }

    .spa-cover-preview .spa-cover-svg {
        display: block;
        width: 100%;
        height: auto;
        max-height: 12rem;
    }

    .spa-cover-preview__dimensions {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.75rem;
        text-align: center;
    }

    .spa-cover-preview__dimensions dt {
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: rgb(107 114 128);
    }

    .spa-cover-preview__dimensions dd {
        margin-top: 0.25rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: rgb(17 24 39);
    }

    .dark .spa-cover-preview__dimensions dd {
        color: rgb(243 244 246);
    }

    .spa-cover-preview__color {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: rgb(55 65 81);
    }

    .dark .spa-cover-preview__color {
        color: rgb(209 213 219);
    }

    .spa-cover-preview__swatch {
        display: inline-block;
        height: 1rem;
        width: 1rem;
        border-radius: 0.25rem;
        border: 1px solid rgb(209 213 219);
    }
</style>
