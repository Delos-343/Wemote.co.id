<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <!-- Watch body -->
    <circle cx="100" cy="100" r="90" fill="#f0f0f0" stroke="#333" stroke-width="2" />

    <!-- Watch face -->
    <circle cx="100" cy="100" r="80" fill="#fff" stroke="#333" stroke-width="2" />

    <!-- Hour hand at 10:10 -->
    <line x1="100" y1="100" x2="100" y2="60" stroke="#333" stroke-width="4" transform="rotate(300 100 100)" />

    <!-- Minute hand at 10:10 -->
    <line x1="100" y1="100" x2="100" y2="40" stroke="#333" stroke-width="2" transform="rotate(60 100 100)" />

    <!-- Second hand at 10:10 -->
    <line x1="100" y1="100" x2="100" y2="30" stroke="red" stroke-width="1" transform="rotate(180 100 100)" />

    <!-- Center dot -->
    <circle cx="100" cy="100" r="3" fill="#333" />
</svg>

